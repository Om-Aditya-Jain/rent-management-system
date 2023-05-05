<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HomeM extends CI_Model {
  function __construct()
  {
      // Call the Model constructor
      parent::__construct();
  }
  
  function getAllHouses(){

    $sql="SELECT * from `property` where `active`= 1";    
    $query = $this->db->query($sql);
    return $query->result_array();

  }

  function get_flats($property_id){

    $query = "SELECT * from property where property_id = '$property_id'";

    $result = $this->db->query($query);
    return $result->result_array();
  }

  public function insert_new_property($property_name, $property_address, $flats){

    $query = "INSERT INTO `property` (`property_name`, `property_address`, `flats`, `active`) VALUES ('$property_name', '$property_address', '$flats', 1)";

    $result = $this->db->query($query);
    return ;

  }

  public function check_flat_entry($flat_no, $property_id){

    $query = "SELECT * from tenants where flat_no = $flat_no and property_id = $property_id and `status` = 1";

    $result = $this->db->query($query);
    return $result->result_array();
  }

  // public function insert_tenant_details($name, $father_name, $dob, $email, $rent, $mobile, $Aadhaar, $joining_date, $members, $property_id, $flat_no){

  //   $query = "INSERT INTO `tenants` (`tenant_name`, `father_name`, `email`, `aadhaar_no`, `contact`, `members`, `rent`, `birth_date`, `property_id`, `flat_no`, `status`, `joining_date`) VALUES ('$name', '$father_name', '$email', '$Aadhaar', '$mobile', '$members', '$rent', '$dob', '$property_id', '$flat_no', 1, '$joining_date')";

  //   $result = $this->db->query($query);
  //   return ;

  // }
   public function insert_tenant_details($name, $father_name, $dob, $age, $gender, $email, $rent, $mobile, $Aadhaar, $joining_date, $address, $district, $state, $polic_station, $no_of_members,$no_of_male, $no_of_female, $no_of_children_below_5, $two_wheeler, $four_wheeler, $occupation, $occupation_address, $occupation_contact, $identifier_name1, $identifier_mobile1, $identifier_address1, $identifier_district1, $identifier_state1, $identifier_policestation1, $identifier_email1, $identifier_name2, $identifier_mobile2,$identifier_address2, $identifier_district2, $identifier_state2, $identifier_policestation2, $identifier_email2,$property_id, $flat_no){

    $query = "INSERT INTO `tenants` (`tenant_name`, `father_name`, `dob`,`age`, `gender`, `email`, `aadhaar_no`, `contact`, `joining_date`, `address`, `district`, `state`, `polic_station`, `rent`, `members`, `no_of_male`, `no_of_female`, `no_of_children_below_5`, `two_wheeler`, `four_wheeler`, `tenant_occupation`, `tenant_occupation_address`, `occupation_contact`, `granter1_name`, `granter1_contact`, `granter1_address`, `granter1_district`, `granter1_state`, `granter1_police_station`, `granter1_email`, `granter2_name`, `granter2_contact`,`granter2_address`, `granter2_district`, `granter2_state`, `granter2_police_station`, `granter2_email`,`property_id`, `flat_no`,`status`) VALUES ('$name', '$father_name', '$dob', '$age', '$gender', '$email', '$Aadhaar', '$mobile', '$joining_date', '$address', '$district', '$state', '$polic_station', '$rent', '$no_of_members','$no_of_male', '$no_of_female', '$no_of_children_below_5', '$two_wheeler', '$four_wheeler', '$occupation', '$occupation_address','$occupation_contact', '$identifier_name1', '$identifier_mobile1', '$identifier_address1', '$identifier_district1', '$identifier_state1', '$identifier_policestation1', '$identifier_email1', '$identifier_name2', '$identifier_mobile2','$identifier_address2', '$identifier_district2', '$identifier_state2', '$identifier_policestation2', '$identifier_email2','$property_id', '$flat_no', 1)";

    $result = $this->db->query($query);
    $insert_id = $this->db->insert_id();

    return  $insert_id;

  }

  // public function insertElectricityReading($property_id, $flat_no, $month, $reading){
  //   $query = "INSERT INTO `flats_electricity_reading` (`property_id`, `flat_no`, `month`, `reading`) VALUES ('$property_id', '$flat_no', '$month', '$reading')";

  //   $result = $this->db->query($query);
  //   return ;

  // }

  // public function updateElectricityReading($property_id, $flat_no, $month, $reading){

  //   $query = "UPDATE `flats_electricity_reading` SET `reading` = $reading WHERE property_id = $property_id and flat_no = $flat_no and `month`='$month' ";

  //   $result = $this->db->query($query);
  //   return ;

  // }

  public function check_flat_occupied($property_id, $flat_no){

    $query = "SELECT property_id , flat_no , tenant_name FROM tenants where property_id = $property_id and flat_no = $flat_no and status = 1";

    $result = $this->db->query($query);
    return $result->result_array();
  }

  // public function getElectricityReading($property_id, $flat_no, $month){

  //   $query = "SELECT reading FROM flats_electricity_reading where property_id = $property_id and flat_no = $flat_no and `month`='$month'";

  //   $result = $this->db->query($query);
  //   return $result->result_array();
  // }

  public function delete_property($property_id){

    $query = "UPDATE property SET `active` = 0 where property_id = $property_id";

    $result = $this->db->query($query);
    return ;
  }

  public function delete_tenant($property_id, $flat_no, $tenant_id){

    $query = "UPDATE tenants set `status` = 0
    where `property_id` = $property_id and `flat_no` = $flat_no
    and `id` = $tenant_id
    ";
    $result = $this->db->query($query);
    return ;
  }

public function delete_tenant_relatives($property_id, $flat_no, $tenant_id){

    $query = "UPDATE tenant_relatives set `active` = 0
    where `tenant_id` = $tenant_id
    ";
    $result = $this->db->query($query);
    return ;
  }
  public function delete_tenant_payments($property_id, $flat_no){

    $query = "UPDATE payment set `status` = 0
    where `property_id` = $property_id and `flat_no` = $flat_no
    ";
    $result = $this->db->query($query);
    return ;
  }
  public function delete_tenant_outstanding($property_id, $flat_no){

    $query = "UPDATE outstanding_amount set `status` = 0
    where `property_id` = $property_id and `flat_no` = $flat_no
    ";
    $result = $this->db->query($query);
    return ;
  }
  public function delete_tenant_entry_form_details($property_id, $flat_no){

    $query = "UPDATE entry_form_details set `status` = 0
    where `property_id` = $property_id and `flat_no` = $flat_no
    ";
    $result = $this->db->query($query);
    return ;
  }
  public function get_tenant_id($property_id,$flat_no){

    $query = "SELECT id FROM tenants WHERE property_id =$property_id AND flat_no = $flat_no AND status=1";
    $result = $this->db->query($query);
    return $result->result_array();
    
  }

  public function get_tenant_entry_form_details($flat_no,$property_id){

    $query = "SELECT * FROM entry_form_details WHERE property_id =$property_id AND flat_no = $flat_no AND status=1 ORDER BY `month` ";
    // print_r($query);
    // die();
    $result = $this->db->query($query);
    return $result->result_array();
    
  }
  public function previousReading($property_id,$flat_no,$month){

    $query = "SELECT * FROM entry_form_details WHERE property_id =$property_id AND flat_no = $flat_no AND month = '$month'";
    // print_r($query);
    // die();
    $result = $this->db->query($query);
    return $result->result_array()[0]['current_meter_reading'];
  }

  public function insert_payment_online($mode, $date, $amount, $reference_id, $payment_mode, $property_id, $flat_no, $description, $month, $receiver){


    $query = "INSERT INTO `payment` (`property_id`, `flat_no`, `amount`, `reference_id`, `pay_mode`, `payment_date`, `status`, `description`, `month`, `payment_receiver`) VALUES ('$property_id', '$flat_no', '$amount', '$reference_id', '$payment_mode', '$date', 1 , '$description', '$month', '$receiver')";

    $result = $this->db->query($query);
    return ;

  }

  public function insert_payment_offline($mode, $date, $amount, $description, $property_id, $flat_no, $payment_mode, $month, $receiver){

    $query = "INSERT INTO `payment` (`property_id`, `flat_no`, `amount`, `pay_mode`, `payment_date`, `status`, `description`, `month`, `payment_receiver`) VALUES ('$property_id', '$flat_no', '$amount', '$payment_mode', '$date', 1 , '$description', '$month', '$receiver')";

    $result = $this->db->query($query);
    return ;

  }

  public function get_tenant_amount($flat_no, $property_id, $month){

    $query = "SELECT SUM(amount) as amount FROM payment where property_id = $property_id and flat_no = $flat_no and month = '$month'";

    // print_r($query);
    // die();

    $result = $this->db->query($query);
    return $result->result_array();
  }

  public function get_previous_outstanding($property_id, $flat_no, $month){

    $query = "SELECT * FROM outstanding_amount where property_id = $property_id and flat_no = $flat_no and month = '$month'";

    // print_r($query);
    // die();

    $result = $this->db->query($query);
    return $result->result_array();
  }

  public function insert_tenant_relatives($tenant_id, $name, $father_name, $age, $gender, $relation, $mobile_no, $aadhar){

    $query = "INSERT INTO `tenant_relatives` (`tenant_id`, `name`, `father_name`, `age`, `gender`, `relation`, `mobile_no`, `aadhar`, `active`) VALUES ('$tenant_id', '$name', '$father_name', '$age', '$gender', '$relation', '$mobile_no', '$aadhar', 1)";

    $result = $this->db->query($query);
    return ;

  }
  public function fetch_details_for_police_verification($flat_no,$property_id)
  {
    $query = "SELECT * FROM tenants where property_id = $property_id AND flat_no = $flat_no AND status = 1";

    $result = $this->db->query($query);
    return $result->result_array();
  }

  public function get_family_member_details_for_police_verification($tenant_id)
  {
    $query = " SELECT * FROM tenant_relatives WHERE tenant_id = $tenant_id AND active = 1";

    $result = $this->db->query($query);
    return $result->result_array();
  }

  public function get_invoive_status($property_id,$month)
  {
    $query = " SELECT * FROM invoice_status WHERE property_id = $property_id AND month ='$month' order by `month`";

    $result = $this->db->query($query);
    return $result->result_array();
  }

  public function get_invoive_number($property_id,$month, $flat_no)
  {
    $query = " SELECT invoice FROM invoice WHERE property_id = $property_id AND month ='$month' and flat_no = $flat_no order by `month`";

    $result = $this->db->query($query);
    return $result->result_array();
  }

  public function insert_oustanding_amount($property_id, $flat_no, $month, $total, $amount, $outstanding){

    $query = "INSERT INTO `outstanding_amount` (`property_id`, `flat_no`, `month`, `total`, `amount_received`, `outstanding_amount`, `status`) VALUES ('$property_id', '$flat_no', '$month', '$total', '$amount', '$outstanding', 1)";

    $result = $this->db->query($query);
    return ;
  }

  public function check_outstanding_exist($property_id, $flat_no, $month){

    $query = " SELECT * FROM outstanding_amount WHERE property_id = $property_id AND month ='$month' and flat_no = $flat_no  and status = 1 order by `month`";

    $result = $this->db->query($query);
    return $result->result_array();

  }

  public function update_oustanding_amount($property_id, $flat_no, $month, $total, $amount, $outstanding){

    $query = "UPDATE `outstanding_amount` SET `total` = '$total', `amount_received` = '$amount', `outstanding_amount` = '$outstanding' WHERE property_id = '$property_id' AND  flat_no = $flat_no AND month = '$month'";

    $result = $this->db->query($query);
    return ;
  }

  public function get_outstanding_amount($property_id, $flat_no, $month){

    $query = " SELECT outstanding_amount FROM outstanding_amount WHERE property_id = $property_id AND month ='$month' and flat_no = $flat_no and status = 1 order by `month`";

    // print_r($query);
    // die();

    $result = $this->db->query($query);
    return $result->result_array();

  }
  


}
