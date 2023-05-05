<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EntryFormM extends CI_Model {

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
  public function check_flat_occupied($property_id, $flat_no){

    $query = "SELECT property_id , flat_no FROM tenants where property_id = $property_id and flat_no = $flat_no and status = 1";

    $result = $this->db->query($query);
    return $result->result_array();
  }

   public function check_flat_entry($flat_no, $property_id){

    $query = "SELECT * from tenants where flat_no = $flat_no and property_id = $property_id and `status` = 1";

    $result = $this->db->query($query);
    return $result->result_array();
  }

  public function insert_entry_form($month,$property_id, $property_name, $flat_no, $no_of_members, $rate_per_unit,$rate_per_person, $rent, $previous_meter_reading, $current_meter_reading, $waste, $miscellaneous, $duedate, $active_status){
    // $_SESSION['user']=$user;
    $query = "INSERT INTO `entry_form_details` (`month`, `property_id`, `property_name`, `flat_no`, `no_of_members`,`electricity_rate`,`water_rate`, `rent`, `previous_meter_reading`, `current_meter_reading`, `waste`, `miscellaneous`, `duedate`, `status`) VALUES ('$month','$property_id', '$property_name', '$flat_no','$no_of_members','$rate_per_unit','$rate_per_person', '$rent', '$previous_meter_reading', '$current_meter_reading', '$waste', '$miscellaneous', '$duedate', '$active_status')";

    $result = $this->db->query($query);
    return ;

  }

  public function update_entry_form($month,$property_id, $property_name, $flat_no, $no_of_members, $rate_per_unit,$rate_per_person, $rent, $previous_meter_reading, $current_meter_reading, $waste, $miscellaneous, $duedate, $active_status){
    // $_SESSION['user']=$user;
    $query = "UPDATE `entry_form_details` SET `electricity_rate`='$rate_per_unit',`water_rate`='$rate_per_person', `rent`='$rent', `waste`='$waste', `previous_meter_reading`='$previous_meter_reading',`current_meter_reading`='$current_meter_reading', `miscellaneous`='$miscellaneous', `duedate`='$duedate'  WHERE `month`='$month'and`property_id`='$property_id'and `flat_no`='$flat_no'";
// print_r($query);
// die();
    $result = $this->db->query($query);
    return ;

  }

  public function previousReading($property_id,$flat_no,$month){

    $query = "SELECT * FROM entry_form_details WHERE property_id =$property_id AND flat_no = $flat_no AND month = '$month'";
    // print_r($query);
    // die();
    $result = $this->db->query($query);
    return $result->result_array()[0]['current_meter_reading'];
  }
  public function get_entry_form($property_id,$flat_no,$month){

    $query = "SELECT * FROM entry_form_details WHERE property_id =$property_id AND flat_no = $flat_no AND month = '$month'";
    // print_r($query);
    // die();
    $result = $this->db->query($query);
    return $result->result_array();
  }

  public function get_previous_rent($property_id,$flat_no,$month){

    $query = "SELECT * FROM entry_form_details WHERE property_id =$property_id AND flat_no = $flat_no AND month = '$month'";
    // print_r($query);
    // die();
    $result = $this->db->query($query);
    return $result->result_array();
  }
                       
     
}
?>