<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class InvoiceM extends CI_Model {

      function __construct()
      {
          // Call the Model constructor
          parent::__construct();
      }
                       
      function get_property(){
        $sql = " SELECT * from property where `active`=1";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

      function get_invoice($property_id,$month){
        $sql = " SELECT * from invoice where `property_id`=$property_id and `month`='$month'";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

      function check_invoice($property_id, $flat_no, $month){
        $sql = " SELECT * from invoice where `property_id`=$property_id and `flat_no` = $flat_no and `month`='$month'";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

      function getFlatDetails($property_id, $flat_no, $month){
        $sql = " SELECT * from entry_form_details where `property_id`=$property_id and flat_no=$flat_no and `month`='$month'";

        // print_r($sql);
        // die();
        $query = $this->db->query($sql);
        return $query->result_array();
      }

      function get_payments($property_id, $flat_no, $month){
        $sql = " SELECT sum(payment.amount) as amount, payment.payment_date from payment, tenants where tenants.`property_id`=$property_id and tenants.flat_no=$flat_no and tenants.status = 1 and payment.`property_id`=$property_id and payment.flat_no=$flat_no and payment.status = 1 and payment.`payment_date` LIKE '$month%'";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

      function get_flats($property_id){
        $sql = " SELECT * from tenants where `property_id`=$property_id and `status`=1 order by flat_no";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

      function get_flats_invoice($property_id, $month){
        $sql = " SELECT * from invoice where `property_id`=$property_id and `month`='$month' order by flat_no";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

      function insert_invoice($invoice, $property_id, $flat_no, $month, $tenant_name, $units){
        $sql = " INSERT INTO `invoice` (`invoice`,`property_id`,`flat_no`,`month`,`tenant_name`,`electricity_units`) VALUES ('$invoice', $property_id, $flat_no, '$month','$tenant_name',$units) ";
        $query = $this->db->query($sql);
        return ;
      }

      function update_invoice($invoice, $property_id, $flat_no, $month, $tenant_name, $units){
        $sql = " UPDATE `invoice` SET `tenant_name`='$tenant_name' and `electricity_units`=$units WHERE `invoice`='$invoice' and `property_id`=$property_id and `flat_no`=$flat_no and `month`='$month'";
        $query = $this->db->query($sql);
        return ;
      }

      function get_invoice_status($property_id,$month){
        $sql = " SELECT * from invoice_status where `property_id`=$property_id and `month`='$month'";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

      function get_report_details_monthwise($property_id,$flat_no,$month){
        $sql = " SELECT * from entry_form_details where `property_id`=$property_id and `flat_no`=$flat_no and `month`='$month'";
        $query = $this->db->query($sql);
        return $query->result_array();
      }
      function get_outstanding_details($property_id,$flat_no,$month){
        $sql = " SELECT * from outstanding_amount where `property_id`=$property_id and flat_no=$flat_no and `month`='$month'";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

      public function get_tenant_amount($flat_no, $property_id, $month){

    $query = "SELECT SUM(amount) as amount, `payment_date` FROM payment where property_id = $property_id and flat_no = $flat_no and month = '$month'";

    $result = $this->db->query($query);
    return $result->result_array();
  }

      function insert_status($property_id,$month,$date){
        $sql = " INSERT INTO `invoice_status` (`property_id`,`month`,`date`) VALUES ($property_id,'$month','$date')";
        $query = $this->db->query($sql);
        return;
      }

      function update_status($property_id,$month, $date){
        $sql = "UPDATE `invoice_status` SET `date`= '$date' WHERE `property_id`=$property_id and `month`='$month' ";
        $query = $this->db->query($sql);
        return;
      }
      public function get_previous_outstanding($property_id, $flat_no, $month){

    $query = "SELECT * FROM outstanding_amount where property_id = $property_id and flat_no = $flat_no and month = '$month'";

    // print_r($query);
    // die();

    $result = $this->db->query($query);
    return $result->result_array();
  }
}

?>