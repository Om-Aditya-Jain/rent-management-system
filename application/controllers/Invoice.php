<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->library('session');
        $this->load->model('InvoiceM');
        if(!isset($_SESSION['user'])){
			redirect(base_url());
		}
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

        // if(!empty($data['paid_amount'])){
        //     // $data['data']['amount_paid']=$data['paid_amount'][0]['amount'];
        //     $data['data']['payment_date']=$data['paid_amount'][0]['payment_date'];
        // }else{
        //     // $data['data']['amount_paid'] = 0;
        //     $data['data']['payment_date'] = "";
        // }
        
        $data['property_id']=$property_id;
        $data['month']=$month;
        // echo "<pre>";
        // print_r($data);
        // die();
        $this->load->view('Invoice/ViewFlatInvoice',$data);
    }

    public function print_invoice(){
        $property_id = $_POST['property_id'];
        $month = $_POST['month'];
        $data['flats_count'] = $this->InvoiceM->get_flats_invoice($property_id, $month);
        
        $data['flats'] = array();
        $i=0;
        foreach($data['flats_count'] as $f){
            $check = $this->InvoiceM->check_invoice($property_id, $f['flat_no'], $month);
            // echo "<pre>";
            // print_r($check);
            // die();
            if(!empty($check)){
               
                $entry_form_details = $this->InvoiceM->get_report_details_monthwise($property_id,$f['flat_no'],$month);
                $data['flats'][$i]=$entry_form_details[0];
                $flat_name = $this->InvoiceM->get_flat_name($property_id, $f['flat_no']);
                if(!empty($flat_name)){
                    $data['flats'][$i]['flat_name'] = $flat_name[0]['flat_name'];
                }else{
                    $data['flats'][$i]['flat_name'] = "";
                }
                $outstanding_details = $this->InvoiceM->get_outstanding_details($property_id,$f['flat_no'],$month);
                $data['flats'][$i]['tenant_name'] = $check[0]['tenant_name'];
                $data['flats'][$i]['invoice'] = $check[0]['invoice'];
                $data['flats'][$i]['timestamp'] = $check[0]['timestamp'];
                $data['flats'][$i]['outstanding_amount'] = $outstanding_details[0]['outstanding_amount'];
                
                $to_date = date('Y-m-d',strtotime($check[0]['timestamp']));
		$previous_month =  date('Y-m', strtotime($month. ' -1 months')); 
			$previous_flat_invoice = $this->InvoiceM->check_invoice($property_id, $f['flat_no'], $previous_month);
			if(!empty($previous_flat_invoice)){
				$from_date = date('Y-m-d',strtotime($previous_flat_invoice[0]['timestamp']));
				$data['flats'][$i]['paid_amount'] = $this->InvoiceM->get_tenant_amount($f['flat_no'], $property_id, $to_date, $from_date);
			}else{
				$data['flats'][$i]['paid_amount'] = $this->InvoiceM->get_tenant_amount_todate($f['flat_no'], $property_id, $to_date);
			}

        $previous_month =  date('Y-m', strtotime($month. ' -1 months')); 
        $data['previous_invoice'] = $this->InvoiceM->check_invoice($property_id, $f['flat_no'], $previous_month);
        $previous_outstanding = $this->InvoiceM->get_previous_outstanding($property_id,$f['flat_no'],$previous_month);
        if(!empty($data['previous_invoice'])){
            $data['flats'][$i]['previous_invoice'] = $data['previous_invoice'][0]['invoice'];
        }else{
            $data['flats'][$i]['previous_invoice'] = "-";
        }  

        if(!empty($data['flats'][$i]['paid_amount'])){
            // $data['flats'][$i]['amount_paid']=$data['flats'][$i]['paid_amount'][0]['amount'];
            $data['flats'][$i]['payment_date']=$data['flats'][$i]['paid_amount'][0]['payment_date'];
        }else{
            // $data['flats'][$i]['amount_paid'] = 0;
            $data['flats'][$i]['payment_date'] = "";
        }
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
