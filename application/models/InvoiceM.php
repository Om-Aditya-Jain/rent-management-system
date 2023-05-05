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
        $sql = " SELECT entry_form_details.*, tenants.tenant_name from entry_form_details,tenants where entry_form_details.`property_id`=$property_id and entry_form_details.flat_no=$flat_no and entry_form_details.`month`='$month' and tenants.property_id=$property_id and tenants.flat_no=$flat_no and tenants.status=1";

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

      function insert_invoice($invoice, $property_id, $flat_no, $month, $tenant_name, $units,$invoice_date){
        $sql = " INSERT INTO `invoice` (`invoice`,`property_id`,`flat_no`,`month`,`tenant_name`,`electricity_units`,`timestamp`) VALUES ('$invoice', $property_id, $flat_no, '$month','$tenant_name',$units, '$invoice_date') ";
        $query = $this->db->query($sql);
        return ;
      }

      function update_invoice($invoice, $property_id, $flat_no, $month, $tenant_name, $units,$invoice_date){
        $sql = " UPDATE `invoice` SET `tenant_name`='$tenant_name', `electricity_units`=$units, `timestamp` = '$invoice_date'  WHERE `invoice`='$invoice' and `property_id`=$property_id and `flat_no`=$flat_no and `month`='$month'";
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

      function delete_invoice($property_id,$flat_no,$month){
        $sql = " DELETE FROM invoice where `property_id`=$property_id and flat_no=$flat_no and `month`='$month'";
        $query = $this->db->query($sql);
        return;
      }

      function delete_entry_form($property_id,$flat_no,$month){
        $sql = " DELETE FROM entry_form_details where `property_id`=$property_id and flat_no=$flat_no and `month`='$month' and status = 1";
        $query = $this->db->query($sql);
        return;
      }

      function delete_payment($property_id,$flat_no,$month){
        $sql = " DELETE FROM payment where `property_id`='$property_id' and `flat_no` = '$flat_no' and `month`='$month' and status = 1";
        $query = $this->db->query($sql);
        return;
      }

      function delete_outstanding_amount($property_id,$flat_no,$month){
        $sql = " DELETE FROM outstanding_amount where `property_id`=$property_id and flat_no=$flat_no and `month`='$month' and status = 1";
        $query = $this->db->query($sql);
        return;
      }

  //     public function get_tenant_amount($flat_no, $property_id, $month){

  //   $query = "SELECT amount, `payment_date` FROM payment where property_id = $property_id and flat_no = $flat_no and month = '$month' order by payment_date desc";

  //   $result = $this->db->query($query);
  //   return $result->result_array();
  // }
      public function get_tenant_amount($flat_no, $property_id, $to_date, $from_date){

    $query = "SELECT amount, `payment_date` FROM payment where property_id = $property_id and flat_no = $flat_no and payment_date between '$from_date' and '$to_date' order by payment_date desc";

    $result = $this->db->query($query);
    return $result->result_array();
  }
      public function get_tenant_amount_todate($flat_no, $property_id, $to_date){

    $query = "SELECT amount, `payment_date` FROM payment where property_id = $property_id and flat_no = $flat_no and payment_date <= '$to_date' order by payment_date desc";

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

  public function get_flat_name($property_id, $flat_no)
  {
    $query = "SELECT flat_name FROM tenants where property_id = $property_id and flat_no = $flat_no AND status =1 ";

    // print_r($query);
    // die();

    $result = $this->db->query($query);
    return $result->result_array();
  }
}

?>