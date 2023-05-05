<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->library('session');
        $this->load->model('InvoiceM');
    }	
	
	public function index()
	{
        if(isset($_POST['month'])){
            $data['month'] = $_POST['month'];
        }else{
            $data['month'] = date("Y-m");
        }
        $data['property'] = $this->InvoiceM->get_property();
        $i=0;
        foreach($data['property'] as $p){
            $check = $this->InvoiceM->get_invoice_status($p['property_id'],$data['month']);
            if(!empty($check)){
                $data['property'][$i]['timestamp'] = $check[0]['timestamp'];
            }else{
                $data['property'][$i]['timestamp']="";
            }
            $i++;
        }
		$this->load->view('Invoice/Property_list', $data);
	}

    public function generate_invoice($property_id,$month){
        
        $flats = $this->InvoiceM->get_flats($property_id);
        // echo "<pre>";
        // print_r($flats);
        // die();
        foreach($flats as $f){

            $flat_details = $this->InvoiceM->getFlatDetails($property_id,$f['flat_no'],$month);
            // echo "<pre>";
            // print_r($flat_details);
            // die();
            if(!empty($flat_details)){
                $invoice = $month."/".$f['flat_no'];
                $current_reading = $flat_details[0]['current_meter_reading'];
                // $previous_month = date("Y-m", strtotime ( '-1 month' , strtotime ( $month ) )); 
                // $previous_reading = $this->InvoiceM->getFlatDetails($property_id,$f['flat_no'],$previous_month);

                $previous_reading = $flat_details[0]['previous_meter_reading'];
                $units = $current_reading - $previous_reading; 

                $check = $this->InvoiceM->check_invoice($property_id, $f['flat_no'], $month);

                if(!empty($check)){
                    $this->InvoiceM->update_invoice($invoice, $property_id, $f['flat_no'], $month, $f['tenant_name'],$units);    
                }else{
                    $this->InvoiceM->insert_invoice($invoice, $property_id, $f['flat_no'], $month, $f['tenant_name'],$units);
                }
                
            }       
        }
        // die();
        $check_status = $this->InvoiceM->get_invoice_status($property_id,$month);
        $date = date("Y-m-d");
        if(!empty($check_status)){
            $this->InvoiceM->update_status($property_id,$month, $date);
        }else{
            $this->InvoiceM->insert_status($property_id,$month, $date);
        }
        $this->session->set_flashdata('invoice', 'Invoice Generated Successfully :)');
		redirect("Invoice");
    }

    public function view_invoice($property_id, $month){
        if(isset($_POST['month'])){
            $month = $_POST['month'];
        }
        $data['flats'] = $this->InvoiceM->get_flats($property_id);
        $i=0;
        foreach($data['flats'] as $f){
            $check = $this->InvoiceM->check_invoice($property_id, $f['flat_no'], $month);
            if(!empty($check)){
                $data['flats'][$i] = $check[0];
            }
            $i++;
        }
        
        $data['property_id']=$property_id;
        $data['month']=$month;
        $this->load->view('Invoice/ViewInvoice',$data);
    }

    public function view_flat_invoice($property_id, $flat_no, $month){
        
        $data = $this->InvoiceM->check_invoice($property_id, $flat_no, $month);
        $data['data'] = $data[0];
        $data['details'] = $this->InvoiceM->get_report_details_monthwise($property_id,$flat_no,$month);
        $data['outstanding_details'] = $this->InvoiceM->get_outstanding_details($property_id,$flat_no,$month);
        // echo "<pre>";
        // print_r($data);
        // die();
        // if(!empty($data)){
        //     $data['data'] = $data[0];
        // }
        $data['paid_amount'] = $this->InvoiceM->get_tenant_amount($flat_no, $property_id, $month);
        $previous_month =  date('Y-m', strtotime($month. ' -1 months')); 
        $data['previous_invoice'] = $this->InvoiceM->check_invoice($property_id, $flat_no, $previous_month);
        $data['previous_outstanding'] = $this->InvoiceM->get_previous_outstanding($property_id,$flat_no,$previous_month);

        if(!empty($data['paid_amount'])){
            $data['data']['amount_paid']=$data['paid_amount'][0]['amount'];
            $data['data']['payment_date']=$data['paid_amount'][0]['payment_date'];
        }else{
            $data['data']['amount_paid'] = 0;
            $data['data']['payment_date'] = "";
        }
        
        $data['property_id']=$property_id;
        $data['month']=$month;
        // echo "<pre>";
        // print_r($data);
        // die();
        $this->load->view('Invoice/ViewFlatInvoice',$data);
    }

    public function print_invoice($property_id, $month){

        $data['flats_count'] = $this->InvoiceM->get_flats_invoice($property_id, $month);
        
        $data['flats'] = array();
        $i=0;
        foreach($data['flats_count'] as $f){
            $check = $this->InvoiceM->check_invoice($property_id, $f['flat_no'], $month);
            
            if(!empty($check)){
                $data['flats'][$i] = $check[0];
                $entry_form_details = $this->InvoiceM->get_report_details_monthwise($property_id,$f['flat_no'],$month);

                $data['flats'][$i]['water_rate'] = $entry_form_details[0]['water_rate'];
                $data['flats'][$i]['no_of_members'] = $entry_form_details[0]['no_of_members'];
                $data['flats'][$i]['electricity_rate'] = $entry_form_details[0]['electricity_rate'];
                $data['flats'][$i]['waste'] = $entry_form_details[0]['waste'];
                $data['flats'][$i]['miscellaneous'] = $entry_form_details[0]['miscellaneous'];
                $data['flats'][$i]['rent'] = $entry_form_details[0]['rent'];
                $data['flats'][$i]['duedate'] = $entry_form_details[0]['duedate'];
                $outstanding_details = $this->InvoiceM->get_outstanding_details($property_id,$f['flat_no'],$month);
                $data['flats'][$i]['outstanding_amount'] = $outstanding_details[0]['outstanding_amount'];
                $paid_amount = $this->InvoiceM->get_tenant_amount($f['flat_no'], $property_id, $month);
                if(!empty($paid_amount)){
                    $data['flats'][$i]['amount_paid'] = $paid_amount[0]['amount'];
                    $data['flats'][$i]['payment_date'] = $paid_amount[0]['payment_date'];
                }else{
                    $data['flats'][$i]['amount_paid'] = "0";
                    $data['flats'][$i]['payment_date'] = "";
                }
                $previous_month =  date('Y-m', strtotime($month. ' -1 months')); 
                $previous_invoice = $this->InvoiceM->check_invoice($property_id, $f['flat_no'], $previous_month);
                if(!empty($previous_invoice)){
                    $data['flats'][$i]['previous_invoice'] = $previous_invoice[0]['invoice'];
                }else{
                    $data['flats'][$i]['previous_invoice'] = "-";
                }  
                $data['flats'][$i]['previous_invoice'] = $previous_invoice[0]['invoice'];
                $previous_outstanding = $this->InvoiceM->get_previous_outstanding($property_id,$f['flat_no'],$previous_month);
                if(!empty($previous_outstanding)){
                    $data['flats'][$i]['prev_outstanding'] = $previous_outstanding[0]['outstanding_amount'];
                }else{
                    $data['flats'][$i]['prev_outstanding'] = 0;
                }                
            }
            $i++;
        }
        
        $data['property_id']=$property_id;
        $data['month']=$month;
        // echo "<pre>";
        // print_r($data);
        // die();
        $this->load->view('Invoice/PrintInvoice',$data);
    }
}
