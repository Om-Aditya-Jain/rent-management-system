<?php 
defined('BASEPATH') OR exit('No direct script allowed');

class EntryForm extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('EntryFormM');
		if(!isset($_SESSION['user'])){
			redirect(base_url());
		}
	}

	public function index(){

		$data['property'] = $this->EntryFormM->getAllHouses();
		$this->load->view('EntryForm/select_property',$data);
	}	

	public function electricity_water_rate($property_id)
	{
		$data['month'] = date("Y-m");
		$data['property_id'] = $property_id;
		$data['details'] = $this->EntryFormM->get_entry_form_for_property($property_id,$data['month']);
		$this->load->view('EntryForm/electricity_water_rate', $data);
	}


	public function flats(){

		$data['property_id'] = $_GET['property_id'];
		$property_id = $data['property_id'];
		$data['month'] = $_GET['month'];
		$data['rate_per_unit'] = $_GET['rate_per_unit'];
		$data['rate_per_person'] = $_GET['rate_per_person'];
		$data['waste'] = $_GET['waste'];
		$entry_type = $_GET['entry_type'];

		$data['flat'] = $this->EntryFormM->get_flats($property_id);
		$data['flats'] = array();

		for($i=1; $i<=$data['flat'][0]['flats']; $i++){

			$flat_status = $this->EntryFormM->check_flat_occupied($property_id, $i);
			
			if(!empty($flat_status)){
				$data['flats'][$i]['status'] = 1;
				$data['flats'][$i]['tenant_name'] = $flat_status[0]['tenant_name'];
				$data['flats'][$i]['flat_name'] = $flat_status[0]['flat_name'];
				$data['flats'][$i]['members'] = $flat_status[0]['members'];
				$data['flats'][$i]['joining_date'] = $flat_status[0]['joining_date'];
			} else {
				$data['flats'][$i]['status'] = 0;
			}

		}

		// for($i=1; $i<=$data['flat'][0]['flats']; $i++){

		// 	$flat_status = $this->EntryFormM->check_flat_occupied($property_id, $i);

			// echo "<pre>";
			// print_r($flat_status);

			

		// 	if(!empty($flat_status)){
		// 		$data['flats'][$i]['status'] = 1;
		// 		$data['flats'][$i]['tenant_name'] = $flat_status[0]['tenant_name'];
		// 		$data['flats'][$i]['flat_name'] = $flat_status[0]['flat_name'];
		// 		$data['flats'][$i]['members'] = $flat_status[0]['members'];
		// 		$data['flats'][$i]['joining_date'] = $flat_status[0]['joining_date'];
		// 	} else {
		// 		$data['flats'][$i]['status'] = 0;
		// 	}

		// }
		// die();

		$data['tenant_name'] = array();
		for($i=1; $i<=$data['flat'][0]['flats']; $i++){

			$flat_status = $this->EntryFormM->check_flat_occupied($property_id, $i);
			if(!empty($flat_status)){
				$data['tenant_name'][$i] = $flat_status[0]['tenant_name'];
			} else {
				$data['tenant_name'][$i] ="";
			}

		}
		//***************************** Property wise Entry Form ********************************** */

		// echo "<pre>";
		// print_r($data['flats']);
		// die();
		$data['previous_rent']  = array();
		$data['previous_reading'] = array();
		for($i=1; $i<=sizeof($data['flats']); $i++){

		if($data['flats'][$i]['status'] == 1){

		$data['flat_entry'] = $this->EntryFormM->check_flat_entry($i, $property_id);

		$month = $data['month'];
		// $previous_month =  date('Y-m', strtotime('-1 month'));
		$previous_month = date('Y-m', strtotime($month . '-01 -1 month'));
		
		$previous_rent = $this->EntryFormM->get_previous_rent($property_id,$i,$previous_month);
		if(!empty($previous_rent)){
			$data['previous_rent'][$i]=$previous_rent[0]['rent'];
		}else{
			$data['previous_rent'][$i]="";
		}
		$previous_reading = $this->EntryFormM->previousReading($property_id,$i,$previous_month);
		$data['previous_reading'][$i] = $previous_reading[0]['current_meter_reading'];
		// echo "<pre>";
		// print_r($data['previous_reading'][$i]);
		// die();
		}
		

	}
		//*************************************************************************************************** */

		// echo "<pre>";
		// print_r($data);
		// die();
		if($entry_type == 1){
		$this->load->view('EntryForm/property_wise_entry', $data);	
		}else{
		$this->load->view('EntryForm/select_flat', $data);
		}

		
	}

	public function entry_form($flat_no,$property_id,$property_name,$no_of_flats,$active_status,$month,$rate_per_unit,$rate_per_person,$waste){


		$data['flat_no'] = $flat_no;
		$data['property_id'] = $property_id;
		$data['property_name'] = $property_name;
		$data['no_of_flats'] = $no_of_flats;
		$data['active_status'] = $active_status;
		$data['month'] = $month;
		$data['rate_per_unit'] = $rate_per_unit;
		$data['rate_per_person'] = $rate_per_person;
		$data['waste'] = $waste;
		

		// echo "<pre>";
		// print_r($data['property_id']);
		// echo "<br>";
		// print_r($data['month']);
		// echo "<br>";
		// print_r($rate_per_unit);
		// echo "<br>";
		// print_r($rate_per_person);
		// die();

		$data['flat_entry'] = $this->EntryFormM->check_flat_entry($flat_no, $property_id);

		// print_r($data['flat_entry']);
		// die();

		$month = $data['month'];
		// $previous_month =  date('Y-m', strtotime('-1 month'));
		$previous_month = date('Y-m', strtotime($month . '-01 -1 month'));
		// echo $previous_month;
		$previous_rent = $this->EntryFormM->get_previous_rent($property_id,$flat_no,$previous_month);
		// print_r($previous_rent);
		// die();
		if(!empty($previous_rent)){
			$data['previous_rent']=$previous_rent[0]['rent'];
		}else{
			$data['previous_rent']="";
		}

		$data['previous_reading'] = $this->EntryFormM->previousReading($property_id,$flat_no,$previous_month);
		// echo "<pre>";
		// print_r($data);
		// die();
		$this->load->view('EntryForm/entry_form_view', $data);


	}

	public function insert_entry_form(){

		$tenant_rent= $_POST['tenant_rent'];
		$current_meter_reading= $_POST['current_meter_reading'];
		$previous_meter_reading = $_POST['previous_meter_reading'];
		$miscellaneous= $_POST['miscellaneous'];
		$duedate= $_POST['duedate'];

		$flat_no = $_POST['flat_no'];
		$property_id = $_POST['property_id'];
		$property_name = $_POST['property_name'];
		$no_of_members = $_POST['no_of_members'];
		$active_status = $_POST['active_status'];
		$month = $_POST['month'];
		$rate_per_unit = $_POST['rate_per_unit'];
		$rate_per_person = $_POST['rate_per_person'];
		$waste= $_POST['waste'];

		$check = $this->EntryFormM->get_entry_form($property_id,$flat_no,$month);

		if(!empty($check)){
			$this->EntryFormM->update_entry_form($month,$property_id, $property_name, $flat_no, $no_of_members, $rate_per_unit,$rate_per_person, $tenant_rent, $previous_meter_reading, $current_meter_reading, $waste, $miscellaneous, $duedate, $active_status);
		}else{
			$this->EntryFormM->insert_entry_form($month,$property_id, $property_name, $flat_no, $no_of_members, $rate_per_unit,$rate_per_person, $tenant_rent, $previous_meter_reading, $current_meter_reading, $waste, $miscellaneous, $duedate, $active_status);
		}

	

		// $this->EntryFormM->insert_entry_form($month,$property_id, $property_name, $flat_no, $no_of_members, $rate_per_unit,$rate_per_person, $tenant_rent, $previous_meter_reading, $current_meter_reading, $waste, $miscellaneous, $duedate, $active_status);

		$this->session->set_flashdata('entry_form_inserted', 'Entry Form Inserted Successfully :)');

		// redirect("EntryForm/flats");

		redirect(base_url("EntryForm/flats?month=".$month."&rate_per_unit=".$rate_per_unit."&rate_per_person=".$rate_per_person."&property_id=".$property_id."&waste=".$waste));

	}

	public function insert_property_wise_entry(){
	    
	    // echo "<pre>";
		// print_r($_POST);
		// die();

// echo "hello";
		$property_name1 = $this->EntryFormM->get_property_name($_POST['property_id'][0]);
		$property_name = $property_name1[0]['property_name'];
		$property = $_POST['property_id'][0];
		
		for($i=0; $i<sizeof($_POST['property_id']); $i++){
		$tenant_rent= $_POST['tenant_rent'][$i];
		$current_meter_reading= $_POST['current_meter_reading'][$i];
		$previous_meter_reading = $_POST['previous_meter_reading'][$i];
		$miscellaneous= $_POST['miscellaneous'][$i];
		$duedate= $_POST['duedate'][$i];
		$flat_no = $_POST['flat_no'][$i];
		$property_id = $_POST['property_id'][$i];
		$month = $_POST['month'][$i];
		$rate_per_unit = $_POST['rate_per_unit'][$i];
		$rate_per_person = $_POST['rate_per_person'][$i];
		$waste= $_POST['waste'][$i];

		$member = $this->EntryFormM->get_member($_POST['property_id'][$i], $_POST['flat_no'][$i]);
		$no_of_members = $member[0]['members'];
		$active_status = $member[0]['status'];

		$check = $this->EntryFormM->get_entry_form($property_id,$flat_no,$month);

		if(!empty($check)){
			$this->EntryFormM->update_entry_form($month,$property_id, $property_name, $flat_no, $no_of_members, $rate_per_unit,$rate_per_person, $tenant_rent, $previous_meter_reading, $current_meter_reading, $waste, $miscellaneous, $duedate, $active_status);
		}else{
			$this->EntryFormM->insert_entry_form($month,$property_id, $property_name, $flat_no, $no_of_members, $rate_per_unit,$rate_per_person, $tenant_rent, $previous_meter_reading, $current_meter_reading, $waste, $miscellaneous, $duedate, $active_status);
		}
	

		}

		$this->session->set_flashdata('entry_form_inserted', 'Entry Form Inserted Successfully :)');

		redirect(base_url("EntryForm"));
	
	}
}

?>
