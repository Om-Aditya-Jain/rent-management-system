<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BillM extends CI_Model {
  function __construct()
  {
      // Call the Model constructor
      parent::__construct();
  }
  

  function getLastWaterBill($year){

    $sql="SELECT *, sum(water_bill) as sum from `extra_charges` where `month` LIKE '$year%' group by `property_id` ";    
    $query = $this->db->query($sql);
    return $query->result_array();

  }

  function getLastElectricityBill($year){

    $sql="SELECT *, sum(electricity_charges) as sum from `extra_charges` where `month` LIKE '$year%' group by `property_id` ";    
    $query = $this->db->query($sql);
    return $query->result_array();

  }
  // function getWaterBill($property_id,$month){
  // function getWaterBill($property_id,$month){

  //   $sql="SELECT water_bill from `extra_charges` where `property_id`='$property_id' and `month` = '$month'";    
  //   $query = $this->db->query($sql);
  //   return $query->result_array();

  // }
  function getWaterBillOfProperty($property_id,$month){

    $sql="SELECT water_bill from `extra_charges` where `property_id`='$property_id' and `month` = '$month'";    
    $query = $this->db->query($sql);
    return $query->result_array();

  }
  function getElectricityBill($property_id,$month){

    $sql="SELECT electricity_charges from `extra_charges` where `property_id`='$property_id' and `month` = '$month'";    
    $query = $this->db->query($sql);
    return $query->result_array();

  }
  // function getWaterBillOfProperty($property_id,$month){

  function getWasteAndMiscBillOfProperty($property_id,$month){

    $sql="SELECT waste_misc_bill from `extra_charges` where `property_id`='$property_id' and `month` = '$month'";    
    $query = $this->db->query($sql);
    return $query->result_array();

  }
  function getElectricityBillOfProperty($property_id,$month){

    $sql="SELECT electricity_charges from `extra_charges` where `property_id`='$property_id' and `month` = '$month'";    
    $query = $this->db->query($sql);
    return $query->result_array();

  }

  function getPropertyName($property_id){

    $sql="SELECT property_name from `property` where `property_id`='$property_id' and `active` = 1";    
    $query = $this->db->query($sql);
    return $query->result_array()[0]['property_name'];

  }

  function insertWaterBill($property_id,$month,$water_bill){

    $sql="INSERT INTO `extra_charges` (`property_id`,`month`,`water_bill`) VALUES ('$property_id','$month','$water_bill')";    
    $query = $this->db->query($sql);
    return 1;

  }

  function updateWaterBill($property_id,$month,$water_bill){

    $sql="UPDATE `extra_charges` SET `water_bill`='$water_bill' WHERE `property_id`='$property_id' and `month` = '$month' ";    
    $query = $this->db->query($sql);
    return 1;

  }
  function insertElectricityBill($property_id,$month,$electricity_charges){

    $sql="INSERT INTO `extra_charges` (`property_id`,`month`,`electricity_charges`) VALUES ('$property_id','$month','$electricity_charges')";    
    $query = $this->db->query($sql);
    return 1;

  }

  function updateElectricityBill($property_id,$month,$electricity_charges){

    $sql="UPDATE `extra_charges` SET `electricity_charges`='$electricity_charges' WHERE `property_id`='$property_id' and `month` = '$month' ";    
    $query = $this->db->query($sql);
    return 1;

  }

  function insertWasteAndMiscBill($property_id,$month,$water_bill){

    $sql="INSERT INTO `extra_charges` (`property_id`,`month`,`waste_misc_bill`) VALUES ('$property_id','$month','$water_bill')";    
    $query = $this->db->query($sql);
    return 1;

  }

  function updateWasteAndMiscBill($property_id,$month,$water_bill){

    $sql="UPDATE `extra_charges` SET `waste_misc_bill`='$water_bill' WHERE `property_id`='$property_id' and `month` = '$month' ";    
    $query = $this->db->query($sql);
    return 1;

  }


}