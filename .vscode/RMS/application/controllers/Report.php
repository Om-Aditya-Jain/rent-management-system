<?php
defined('BASEPATH') OR exit('No direct script allowed');

class Report extends CI_Controller{

function __construct(){
	parent::__construct();
	$this->load->library('session');
	$this->load->model('ReportM');
}

public function reportv(){
	$this->load->view('Report/report_front_page');
}

public function receiver_report(){

	$this->load->view('Report/receiver_report');
}

public function receiver_payment_report(){

	$data['from_date'] = $_POST['from_date'];
	$data['to_date'] = $_POST['to_date'];
	$receiver = $_POST['receiver'];

	if($receiver == 1){
		$receiver = "Mr. Ram Kripal Shah";
	} else if($receiver == 2){

		$receiver = "Mr. Manoj Kumar Shah";
	}else{
		$receiver = "Dr. Indra Kumar Shah";
	}
	
	$data['payments']= $this->ReportM->get_receiver_payments($data['from_date'], $data['to_date'], $receiver);
	$data['total'] = $this->ReportM->get_total_receiver_payments($data['from_date'], $data['to_date'], $receiver);
	$data['receiver_expenditure'] = $this->ReportM->get_receiver_expenditure($data['from_date'], $data['to_date'], $receiver);
	// echo "<pre>";
	// print_r($data['receiver_expenditure']);
	// die();
	
	$this->load->view('Report/payment_report',$data);
}



public function balance_report(){
	$this->load->view('Report/balance_report');
}
	public function select_property_for_report_monthwise()
	{
		$data['property'] = $this->ReportM->getAllHouses();

		$this->load->view('Report_Monthwise/select_property_for_report_monthwise',$data);
	}

	public function select_month_for_report_monthwise($property_id, $flats)
	{
		$data['property_id'] = $property_id;
		$data['flats'] = $flats;
		$this->load->view('Report_Monthwise/select_month_for_report_monthwise',$data);
	}
    
    public function Report_Monthwise()
    {
    	$data['month'] = $_POST['month'];
    	$data['property_id'] =$_POST['property_id'];
    	$property_id = $data['property_id'];

    	$data['report_monthwise_details'] = $this->ReportM->get_report_details_monthwise($data['month'],$data['property_id']);

    	// echo "<pre>";
    	// print_r($data['report_monthwise_details']);
		// die();

		$month = $data['report_monthwise_details'][0]['month'];

	    $data['invoice_status'] = $this->ReportM->get_invoive_status($data['property_id'],$month);

		if(!empty($data['invoice_status'])){

			
			for($i=0; $i<sizeof($data['report_monthwise_details']); $i++){

			$month = $data['report_monthwise_details'][$i]['month'];
			$flat_no = $data['report_monthwise_details'][$i]['flat_no'];


			$data['invoice_number'] = $this->ReportM->get_invoive_number($data['property_id'],$month, $flat_no);
			$data['report_monthwise_details'][$i]['invoice_number'] = 	$data['invoice_number'][0]['invoice'];
			}


		}
    	for($i = 0; $i < sizeof($data['report_monthwise_details']); $i++){

			$month = $data['report_monthwise_details'][$i]['month'];
			$flat_no = $data['report_monthwise_details'][$i]['flat_no'];

			$data['paid_amount'] = $this->ReportM->get_tenant_amount($flat_no, $data['property_id'], $month);

			$data['report_monthwise_details'][$i]['amount_paid'] = $data['paid_amount'][0]['amount'];

			
		}
    	
    	
		// foreach ($data['report_monthwise_details'] as $key => $value) {


		$month = $data['report_monthwise_details'][0]['month'];
    	$flat_no = $data['report_monthwise_details'][0]['flat_no'];
		// echo $month;
		// die();
		// $previous_month = date('Y-m', strtotime($month . '-01 -1 month'));
		// $data['previous_reading'] = $this->ReportM->previousReading($property_id,$flat_no,$previous_month);
		
		// }

    	
    	$this->load->view('Report_Monthwise/Report_monthwise',$data);
    }

	public function Report_flatwise()
    {
		$data['flats'] =$_POST['flats'];
    	$flats = $data['flats'];
		$data['from_date'] = $_POST['from_date'];
		$data['to_date'] = $_POST['to_date'];
		$data['property_id'] =$_POST['property_id'];
		// echo $data['flats'];
		// die();
    	$data['report_flatwise_details'] = $this->ReportM->get_flatwise_payments($data['to_date'],$data['from_date'],$data['property_id'],$flats);
    	// echo "ehllo";
		// die();
		$month = $data['report_flatwise_details'][0]['month'];
		$previous_month =  date('Y-m', strtotime('-1 month'));
		$data['previous_reading'] = $this->ReportM->previousReading($data['property_id'],$flats,$previous_month);
    	$this->load->view('Report_Monthwise/Report_flatwise',$data);
    }

    public function User_Wise_Report()
    {
    	$this->load->view('User_Wise_Report/select_user');
    }

     public function User_Wise_Report_detail()
    {
    	$data['user_name'] = $_POST['user_name'];
    	$this->load->view('User_Wise_Report/user_wise_report',$data);
    }
	public function outstanding_amount(){

		$data['property'] = $this->ReportM->getAllHouses();
		$this->load->view('Report_Monthwise/outstanding_amount_report', $data);
	}

	public function outstanding_report_view($property_id){

		$data['property_id'] = $property_id;
		
		$data['outstanding_report_details'] = $this->ReportM->get_outstanding_report_details($data['property_id']);
		// echo "<pre>";
		// print_r($data['outstanding_report_details']);
		// die();
	
		for($i = 0; $i < sizeof($data['outstanding_report_details']); $i++){

			$property_id = $data['outstanding_report_details'][$i]['property_id'];
			$flat_no = $data['outstanding_report_details'][$i]['flat_no'];
			$tenant_name = $this->ReportM->get_tenant_name($property_id,$flat_no);
		// 	echo "<pre>";
		// print_r($tenant_name);
			$data['outstanding_report_details'][$i]['tenant_name'] = $tenant_name[0]['tenant_name'];
		}
		
		
		// die();

		$this->load->view('Report_Monthwise/outstanding_amount_report_view', $data);
	}

	public function receiver_expenditure(){

		$this->load->view('Report_Monthwise/receiver_expenditure');
	}

	public function insert_receiver_expenditure(){
		
		$date = $_POST['date'];
		$receiver = $_POST['pay_user'];
		$head = $_POST['head'];
		$amount = $_POST['amount'];

	    if($receiver == 1){
		$receiver = "Mr. Ram Kripal Shah";
		} else if($receiver == 2){

			$receiver = "Mr. Manoj Kumar Shah";
		}else{
			$receiver = "Dr. Indra Kumar Shah";
		}

	    if($head == 1){
		$head = "Waste";
	    } else if($head == 2){

		$head = "Maintenance";
	    }else{
		$head = "Other";
	    }

		$this->ReportM->insert_receiver_expenditure($date, $receiver, $head, $amount);
		$this->session->set_flashdata('Expenditure_inserted', 'Expenditure Inserted Successfully :)');
	    redirect("Report/receiver_expenditure");

		}

		public function view_expenditure(){

			$data['expenditure'] = $this->ReportM->get_expenditure();
			// print_r($data['expenditure']);
			// die();

		    $this->load->view('Report_Monthwise/view_expenditure', $data);	
		}


}


?>