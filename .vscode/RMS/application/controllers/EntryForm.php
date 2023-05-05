<?php 
defined('BASEPATH') OR exit('No direct script allowed');

class EntryForm extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('EntryFormM');
	}

	public function index(){

		$data['property'] = $this->EntryFormM->getAllHouses();
		$this->load->view('EntryForm/select_property',$data);
	}	

	public function electricity_water_rate($property_id)
	{
		$data['property_id'] = $property_id;
		$this->load->view('EntryForm/electricity_water_rate', $data);
	}


	public function flats(){

		$data['property_id'] = $_GET['property_id'];
		$property_id = $data['property_id'];
		$data['month'] = $_GET['month'];
		$data['rate_per_unit'] = $_GET['rate_per_unit'];
		$data['rate_per_person'] = $_GET['rate_per_person'];
		$data['waste'] = $_GET['waste'];
		
		// echo "<pre>";
		// print_r($data['property_id']);
		// echo "<br>";
		// print_r($data['month']);
		// echo "<br>";
		// print_r($data['rate_per_unit']);
		// echo "<br>";
		// print_r($data['rate_per_person']);
		// echo "<br>";
		// die();

		$data['flat'] = $this->EntryFormM->get_flats($property_id);
		$data['flats'] = array();

		for($i=1; $i<=$data['flat'][0]['flats']; $i++){

			$flat_status = $this->EntryFormM->check_flat_occupied($property_id, $i);
			if(!empty($flat_status)){
				$data['flats'][$i] = 1;
			} else {
				$data['flats'][$i] = 0;
			}

		}

		// echo "<pre>";
		// print_r($data['flats']);
		// die();

		$this->load->view('EntryForm/select_flat', $data);
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

		

		$month = $data['month'];
		// $previous_month =  date('Y-m', strtotime('-1 month'));
		$previous_month = date('Y-m', strtotime($month . '-01 -1 month'));
		$previous_rent = $this->EntryFormM->get_previous_rent($property_id,$flat_no,$previous_month);
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



	
		// echo "<br>";
		// print_r($property_name);
		// echo "<br>";
		// print_r($month);
		// echo "<br>";
		// print_r($rate_per_unit);
		// echo "<br>";
		// print_r($no_of_flats);
		// die();
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
	
}

?>