<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->library('session');
        $this->load->model('HomeM');
    }	
	
	public function index()
	{
		$data['property'] = $this->HomeM->getAllHouses();
		$this->load->view('Home/Home',$data);
	}

	public function add_property(){

		$this->load->view('Home/add_property');
	}

	public function insert_new_property(){

		$property_name = $_POST['property_name'];
		$property_address = $_POST['property_address'];
		$flats = $_POST['flats'];

		$this->HomeM->insert_new_property($property_name, $property_address, $flats);

		$this->session->set_flashdata('property_inserted', 'Property Inserted Successfully :)');
		redirect("Home/index");

	}

	public function flats($property_id){

		$property_id = $property_id;
		$data['flat'] = $this->HomeM->get_flats($property_id);
		$data['property_id'] = $property_id;

		$data['flats'] = array();

		for($i=1; $i<=$data['flat'][0]['flats']; $i++){

			$flat_status = $this->HomeM->check_flat_occupied($property_id, $i);

			// echo "<pre>";
			// print_r($flat_status);
			

			if(!empty($flat_status)){
				$data['flats'][$i]['status'] = 1;
				$data['flats'][$i]['tenant_name'] = $flat_status[0]['tenant_name'];
			} else {
				$data['flats'][$i]['status'] = 0;
			}

		}
// die();

		$this->load->view('Home/flats', $data);
	}

	public function delete_property($property_id){

		$property_id = $property_id;
		$this->HomeM->delete_property($property_id);
		
		$this->session->set_flashdata('Property_deleted', 'Property Deleted Successfully :)');
		redirect("Home/index");
	}
	
	public function delete_flat_tenant($flat_no, $property_id){

		$property_id = $property_id;
		$flat_no = $flat_no;
		$tenant_id=$this->HomeM->get_tenant_id($property_id, $flat_no);

		$this->HomeM->delete_tenant($property_id, $flat_no,$tenant_id[0]['id']);
		$this->HomeM->delete_tenant_relatives($property_id, $flat_no,$tenant_id[0]['id']);
		$this->HomeM->delete_tenant_payments($property_id, $flat_no);
		$this->HomeM->delete_tenant_outstanding($property_id, $flat_no);
		$this->HomeM->delete_tenant_entry_form_details($property_id, $flat_no);

		
		$this->session->set_flashdata('tenant_deleted', 'Tenant Deleted Successfully :)');
		redirect("Home/index");
	}

	public function tenant_details($flat_no, $property_id){

		$data['flat_no'] = $flat_no;
		$data['property_id'] = $property_id;

		$data['flat_entry'] = $this->HomeM->check_flat_entry($flat_no, $property_id);

		if(!empty($data['flat_entry'])){
			$month = date('Y-m');
			$month_name = date("F", strtotime($month))." ".date("Y", strtotime($month)); 
			// $reading = $this->HomeM->getElectricityReading($property_id,$flat_no,$month);
			// if(!empty($reading)){
			// 	$data['reading'] = $reading[0]['reading'];
			// }else{
			// 	$data['reading'] = "";
			// }
			$data['month_name'] = $month_name;
			$data['month'] = $month;
			$this->load->view('Home/tenant_details_view', $data);
		} else{
			$this->load->view('Home/tenant_details', $data);
         }
	}

public function insert_tenant_details(){

	// $data = $_POST;
	// echo "<pre>";
	// print_r($data);
	// die();

	$name = $_POST['name'];
	$father_name = $_POST['father_name'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$age = $_POST['age'];
	$email = $_POST['email'];
	$rent = $_POST['rent'];
	$mobile = $_POST['mobile'];
	$Aadhaar = $_POST['Aadhaar'];
	$joining_date = $_POST['joining_date'];
	$address = $_POST['address'];
	$district = $_POST['district'];
	$state = $_POST['state'];
	$polic_station = $_POST['polic_station'];
	$no_of_members =$_POST['no_of_members'];
	$no_of_male =$_POST['no_of_male'];
	$no_of_female =$_POST['no_of_female'];
	$no_of_children_below_5 =$_POST['no_of_children_below_5'];
	$two_wheeler = $_POST['two_wheeler'];
	$four_wheeler = $_POST['four_wheeler'];
	$occupation = $_POST['occupation'];
	$occupation_address = $_POST['occupation_address'];
	$occupation_contact = $_POST['occupation_contact'];
	$identifier_name1 = $_POST['identifier_name1'];
	$identifier_mobile1 = $_POST['identifier_mobile1'];
	$identifier_address1 = $_POST['identifier_address1'];
	$identifier_district1 = $_POST['identifier_district1'];
	$identifier_state1 = $_POST['identifier_state1'];
	$identifier_policestation1 = $_POST['identifier_policestation1'];
	$identifier_email1 = $_POST['identifier_email1'];
	$identifier_name2 = $_POST['identifier_name2'];
	$identifier_mobile2 = $_POST['identifier_mobile2'];
	$identifier_address2 = $_POST['identifier_address2'];
	$identifier_district2 = $_POST['identifier_district2'];
	$identifier_state2 = $_POST['identifier_state2'];
	$identifier_policestation2 = $_POST['identifier_policestation2'];
	$identifier_email2 = $_POST['identifier_email2'];
	$flat_no = $_POST['flat_no'];
	$property_id = $_POST['property_id'];

    $member_name = $_POST['member_name'];
    $member_father_name = $_POST['member_father_name'];
    $member_age = $_POST['member_age'];
    $member_gender = $_POST['member_gender'];
    $member_relation = $_POST['member_relation'];
    $member_mobile_no = $_POST['member_mobile_no'];
    $member_aadhar = $_POST['member_aadhar'];
	// echo "<pre>";
	// print_r($_POST);
	// die();
	$tenant_id = $this->HomeM->insert_tenant_details($name, $father_name, $dob,$age,$gender, $email, $rent, $mobile, $Aadhaar, $joining_date, $address, $district, $state, $polic_station, $no_of_members, $no_of_male, $no_of_female, $no_of_children_below_5, $two_wheeler, $four_wheeler, $occupation, $occupation_address, $occupation_contact, $identifier_name1, $identifier_mobile1, $identifier_address1, $identifier_district1, $identifier_state1, $identifier_policestation1, $identifier_email1, $identifier_name2, $identifier_mobile2,$identifier_address2, $identifier_district2, $identifier_state2, $identifier_policestation2, $identifier_email2,$property_id, $flat_no);

    for($i=0; $i<count($member_name); $i++){
        $member_details[] = array(
            
            'name' => $member_name[$i],
            'father_name' => $member_father_name[$i],
            'age' => $member_age[$i],
            'gender' => $member_gender[$i],
            'relation' => $member_relation[$i],
            'mobile_no' => $member_mobile_no[$i],
            'aadhar' => $member_aadhar[$i]
        );
	}
	// echo "<pre>";
	// print_r($member_details);
	// die();

	foreach($member_details as $m){
		$this->HomeM->insert_tenant_relatives($tenant_id, $m['name'], $m['father_name'], $m['age'], $m['gender'], $m['relation'], $m['mobile_no'], $m['aadhar']);
	}

	// $tenant_id = $this->HomeM->insert_tenant_details($name, $father_name, $dob,$age,$gender, $email, $rent, $mobile, $Aadhaar, $joining_date, $address, $district, $state, $polic_station, $no_of_members, $no_of_male, $no_of_female, $no_of_children_below_5, $two_wheeler, $four_wheeler, $occupation, $occupation_address, $occupation_contact, $identifier_name1, $identifier_mobile1, $identifier_address1, $identifier_district1, $identifier_state1, $identifier_policestation1, $identifier_email1, $identifier_name2, $identifier_mobile2,$identifier_address2, $identifier_district2, $identifier_state2, $identifier_policestation2, $identifier_email2,$property_id, $flat_no);


	// foreach($member_details as $m){
	// $this->HomeM->insert_tenant_relatives( $m['name'], $m['father_name'], $m['age'], $m['gender'], $m['relation'], $m['mobile_no'], $m['aadhar']);
	// }


	$this->session->set_flashdata('tenant_inserted', 'Tenant Inserted Successfully :)');
	redirect("Home/index");

}

		
    // echo "<br>";
    // print_r($member_father_names);
    // echo "<br>";
    // print_r($member_ages);
    // echo "<br>";
    // print_r($member_genders);
    // echo "<br>";
    // print_r($member_relations);
    // echo "<br>";
    // print_r($member_mobile_nos);
    // echo "<br>";
    // print_r($member_aadhars);
    // echo "<br>";
    
    // print_r($mobile);
    // echo "<br>";
    // print_r($Aadhaar);
    // echo "<br>";
    // print_r($joining_date);
    // echo "<br>";
    // print_r($address);
    // echo "<br>";
    // print_r($district);
    // echo "<br>";
    // print_r($state);
    // echo "<br>";
    // print_r($polic_station);
    // echo "<br>";
    // print_r($two_wheeler);
    // echo "<br>";
    // print_r($four_wheeler);
    // echo "<br>";
    // print_r($occupation);
    // echo "<br>";
    // die();


		// $this->HomeM->insert_tenant_details($name, $father_name, $dob, $email, $rent, $mobile, $Aadhaar, $joining_date, $members, $property_id, $flat_no);


	public function month_wise_report($flat_no,$property_id)
	{
		$data['flat_no'] = $flat_no;
		$data['property_id'] = $property_id;
		
		$data['tenant_entry_form_details'] = $this->HomeM->get_tenant_entry_form_details($data['flat_no'],$data['property_id']);

		// echo "<pre>";
		// print_r($data['tenant_entry_form_details']);
		// die();
		// $month = $data['tenant_entry_form_details'][0]['month'];
	    
		for($i = 0; $i < sizeof($data['tenant_entry_form_details']); $i++){

			$month = $data['tenant_entry_form_details'][$i]['month'];
			// $data['invoice_status'] = $this->HomeM->get_invoive_status($data['property_id'],$month);


			// if(!empty($data['invoice_status'])){

				// for($i=0; $i<sizeof($data['tenant_entry_form_details']); $i++){

				// $month = $data['tenant_entry_form_details'][$i]['month'];

				$data['invoice_number'] = $this->HomeM->get_invoive_number($data['property_id'],$month, $data['flat_no']);
				if(!empty($data['invoice_number'])){
					$data['tenant_entry_form_details'][$i]['invoice_number'] = 	$data['invoice_number'][0]['invoice'];
				}else{
					$data['tenant_entry_form_details'][$i]['invoice_number']="";
				}
				// }



			// }
		
			$previous_month =  date('Y-m', strtotime($month. ' -1 months')); 
			// echo $previous_month;
			// die();
			$previous_outstanding = $this->HomeM->get_previous_outstanding($property_id,$flat_no,$previous_month);
			// print_r($previous_outstanding);
			// echo "<br>";
			if(!empty($previous_outstanding)){
				$data['previous_outstanding'] = $previous_outstanding[0]['outstanding_amount'];
			}else{
				$data['previous_outstanding'] = 0;
			}
			// echo $data['previous_outstanding'];

		    // $data['previous_reading'] = $this->HomeM->previousReading($property_id,$flat_no,$previous_month);

			$data['paid_amount'] = $this->HomeM->get_tenant_amount($data['flat_no'], $data['property_id'], $month);
			$data['tenant_entry_form_details'][$i]['previous_reading'] = $data['previous_reading'];

			$rent = $data['tenant_entry_form_details'][$i]['rent'];
			$waste = $data['tenant_entry_form_details'][$i]['waste'];
			$miscellaneous = $data['tenant_entry_form_details'][$i]['miscellaneous'];
			$water = $data['tenant_entry_form_details'][$i]['no_of_members'] * $data['tenant_entry_form_details'][$i]['water_rate'];
			$electricity = $data['tenant_entry_form_details'][$i]['electricity_rate'] * ($data['tenant_entry_form_details'][$i]['current_meter_reading'] - $data['tenant_entry_form_details'][$i]['previous_meter_reading']);

			// echo $rent;
			// echo "<br>";
			// echo $water;
			// echo "<br>";
			// echo $miscellaneous;
			// echo "<br>";
			// echo $waste;
			// echo "<br>";
			// echo $electricity;
			// echo "<br>";
			// echo $data['previous_outstanding'];
			// echo "<br>";
			// echo "end";
			$total = $rent + $waste + $miscellaneous + $water + $electricity + $data['previous_outstanding'];
			// echo $total;
			$data['tenant_entry_form_details'][$i]['total'] = $total;
			$data['tenant_entry_form_details'][$i]['amount_paid'] = $data['paid_amount'][0]['amount'];
		    
			$outstanding_amount = $total - $data['tenant_entry_form_details'][$i]['amount_paid'];
			$data['tenant_entry_form_details'][$i]['outstanding_amount'] = $outstanding_amount;
			// echo $oustanding_amount;
			// echo $total;
			// echo "<br>";
			$check = $this->HomeM->check_outstanding_exist($data['property_id'], $data['flat_no'], $month);
			if(!empty($check)){
			$this->HomeM->update_oustanding_amount($data['property_id'], $data['flat_no'], $month, $total, $data['tenant_entry_form_details'][$i]['amount_paid'], $outstanding_amount);

			}else {
			$this->HomeM->insert_oustanding_amount($data['property_id'], $data['flat_no'], $month, $total, $data['tenant_entry_form_details'][$i]['amount_paid'], $outstanding_amount);
			}


		}
		// die();
		// for($i=0; $i<sizeof($data['tenant_entry_form_details']); $i++){

		// 	$month = $data['tenant_entry_form_details'][$i]['month'];

		// 	$outstanding = $this->HomeM->get_outstanding_amount($data['property_id'], $data['flat_no'], $month);

		// 	$data['tenant_entry_form_details'][$i]['outstanding_amount'] = $outstanding[0]['outstanding_amount'];
		// }

		// echo "<pre>";
		// print_r($data['tenant_entry_form_details']);
		// die();


		// $previous_month =  date('Y-m', strtotime('-1 month'));
		// $previous_month = date('Y-m', strtotime($month . '-01 -1 month'));
		// $data['previous_reading'] = $this->HomeM->previousReading($property_id,$flat_no,$previous_month);


		$this->load->view('Home/month_wise_reportv',$data);
	}

	public function getFlatElectricityReading()
	{
		$month = $_GET['month'];
		$property_id = $_GET['property_id'];
		$flat_no = $_GET['flat_no'];
        $data['flat_no'] = $flat_no;
		$data['property_id'] = $property_id;

		$data['flat_entry'] = $this->HomeM->check_flat_entry($flat_no, $property_id);

		if(!empty($data['flat_entry'])){
			$month_name = date("F", strtotime($month))." ".date("Y", strtotime($month)); 
			// $reading = $this->HomeM->getElectricityReading($property_id,$flat_no,$month);
			// if(!empty($reading)){
			// 	$data['reading'] = $reading[0]['reading'];
			// }else{
			// 	$data['reading'] = "";
			// }
			$data['month_name'] = $month_name;
			$data['month'] = $month;
			$this->load->view('Home/tenant_details_view', $data);
		} else{
			$this->load->view('Home/tenant_details', $data);
         }
	}

    public function addElectricityReading($property_id, $flat_no, $month){

		$data['flat_no'] = $flat_no;
		$data['property_id'] = $property_id;

		$data['flat_entry'] = $this->HomeM->check_flat_entry($flat_no, $property_id);

		$month_name = date("F", strtotime($month))." ".date("Y", strtotime($month)); 
		// $reading = $this->HomeM->getElectricityReading($property_id,$flat_no,$month);
		// if(!empty($reading)){
		// 	$data['reading'] = $reading[0]['reading'];
		// }else{
		// 	$data['reading'] = "";
		// }
		$data['month_name'] = $month_name;
		$data['month'] = $month;
			
		$this->load->view('Home/AddFlatElectricityReading',$data);
	}

    public function insertFlatElectricityReading(){
		$property_id = $_POST['property_id'];
		$flat_no = $_POST['flat_no'];
		$month = $_POST['month'];
		$reading = $_POST['reading'];
		// $check = $this->HomeM->getElectricityReading($property_id, $flat_no, $month);
		// if(empty($check)){
		// 	$this->HomeM->insertElectricityReading($property_id, $flat_no, $month,$reading);
		// }else{
		// 	$this->HomeM->updateElectricityReading($property_id, $flat_no, $month,$reading);
		// }
		
		redirect(base_url("Home/getFlatElectricityReading?property_id=").$property_id."&flat_no=".$flat_no."&month=".$month);
	}

	public function pay_bill($property_id, $flat_no, $month){

		$data['property_id'] = $property_id;
		$data['flat_no'] = $flat_no;
		$data['month'] = $month;

		$this->load->view('Home/Pay_bill', $data);

	}

	public function payment_mode(){

		$data['mode'] = 0;
		$data['property_id'] = $_POST['property_id'];
	    $data['flat_no'] = $_POST['flat_no'];
		$data['month'] = $_POST['month'];
		if($_POST['payment_mode'] == 'online'){
		 $data['mode'] = 1;
		$this->load->view('Home/payment_mode', $data);
	    } else {
		$data['mode'] = 2;
		$this->load->view('Home/payment_mode', $data);
	    }
} 

public function insert_payment(){

	// echo "<pre>";
	// print_r($_POST);
	// die();

	if($_POST['mode'] == 1){

	$mode = "online";
	$date = $_POST['date'];
	$amount = $_POST['amount'];
	$reference_id = $_POST['ref_id'];
	$payment_mode = $_POST['payment_mode'];
	$property_id = $_POST['property_id'];
	$flat_no = $_POST['flat_no'];
	$description = $_POST['description'];
	$receiver = $_POST['receiver'];

	if($receiver == 1){
		$receiver = "Mr. Ram Kripal Shah";
	} else if($receiver == 2){

		$receiver = "Mr. Manoj Kumar Shah";
	}else{
		$receiver = "Dr. Indra Kumar Shah";
	}

	$month = $_POST['month'];
	// $data = explode('-', $month1);
	// $month = $data[1];
	// echo $month;
	// die();
	
	 $this->HomeM->insert_payment_online($mode, $date, $amount, $reference_id, $payment_mode, $property_id, $flat_no, $description, $month, $receiver);	
	} else {

	$mode = "offline";
	$date = $_POST['date'];
	$amount = $_POST['amount'];
	$description = $_POST['description'];
	$property_id = $_POST['property_id'];
	$flat_no = $_POST['flat_no'];
	$payment_mode = "offline";
	$month = $_POST['month'];
	// echo $month1;
	// die();
	// $data = explode('-', $month1);
	// $month = $data[1];

	$receiver = $_POST['receiver'];

	if($receiver == 1){
		$receiver = "Mr. Ram Kripal Shah";
	} else if($receiver == 2){

		$receiver = "Mr. Manoj Kumar Shah";
	}else{
		$receiver = "Dr. Indra Kumar Shah";
	}
	
	
	 $this->HomeM->insert_payment_offline($mode, $date, $amount, $description, $property_id, $flat_no, $payment_mode, $month, $receiver);
	}

	$this->session->set_flashdata('Payment_inserted', 'Payment Inserted Successfully :)');
	redirect("Home/index");

}

	public function police_verification_form($flat_no, $property_id){

		$flat_no = $flat_no;
		$property_id = $property_id;

		$data['details_for_police_verification'] = $this->HomeM->fetch_details_for_police_verification($flat_no,$property_id);

		// echo "<pre>";
		// print_r($data['details_for_police_verification']);
		// die();
		$tenant_id = $data['details_for_police_verification'][0]['id'];

		$data['family_member_details'] = $this->HomeM->get_family_member_details_for_police_verification($tenant_id);

		

		$this->load->view('Home/police_verification_form',$data);
	}


}
?>