<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ReportM extends CI_Model {

      function __construct()
      {
          // Call the Model constructor
          parent::__construct();
      }
      
                       
      function get_payments($to_date,$from_date,$user){
      $sql = " SELECT entry_form_details.*, tenants.tenant_name,tenants.rent, property.property_name FROM entry_form_details , tenants , property , users  WHERE entry_form_details.user = '$user' and entry_form_details.user = users.username and tenants.property_id = entry_form_details.property_id AND tenants.flat_no = entry_form_details.flat_no AND property.property_id = tenants.flat_no and entry_form_details.timestamp between '$to_date' and '$from_date' order by unix_timestamp(timestamp)  asc";
      $query = $this->db->query($sql);
        return $query->result_array();
      }

      function get_no_of_flats($property_id){
    
        $sql="SELECT flats from `property` where `property_id`= $property_id";    
        $query = $this->db->query($sql);
        return $query->result_array();
      }    

      function get_payment_details($from_date, $to_date, $flat_no, $property_id){

        $sql = "SELECT DISTINCT  month  FROM payment where payment_date BETWEEN '$from_date' AND '$to_date' and property_id ='$property_id' AND flat_no = '$flat_no' ";
  
        // print_r($sql);
        // die();
  
          $query = $this->db->query($sql);
          return $query->result_array();
        }

        function get_payment($month, $flat_no, $property_id){

          $sql = "SELECT * FROM payment where month = '$month' and property_id ='$property_id' AND flat_no = '$flat_no'";
    
          // print_r($sql);
          // die();
    
            $query = $this->db->query($sql);
            return $query->result_array();
          }
          
      function get_receiver_payments($from_date, $to_date, $receiver){

      $sql = "SELECT amount, reference_id, payment_date, payment_receiver, property_id, flat_no FROM payment where payment_date BETWEEN '$from_date' AND '$to_date' and payment_receiver = '$receiver'";

        $query = $this->db->query($sql);
        return $query->result_array();
      }

      function get_flatwise_payments($to_date,$from_date,$property_id,$flat_no){
        $sql = "SELECT * FROM entry_form_details WHERE entry_form_details.`property_id` =$property_id and entry_form_details.`flat_no` =$flat_no and entry_form_details.month between date_format('$from_date','%Y-%m') and date_format('$to_date','%Y-%m')";
        // print_r($sql);die();
        $query = $this->db->query($sql);
        return $query->result_array();
      }

      // function get_months($to_date,$from_date,$property_id,$flat_no){
      //   $sql = "SELECT invoice.month,invoice.invoice FROM invoice, entry_form_details WHERE invoice.`property_id` =$property_id AND invoice.`flat_no` =$flat_no and 
      //    and entry_form_details.`property_id` =$property_id AND entry_form_details.`flat_no` =$flat_no
      //    and date_format(entry_form_details.timestamp,'%Y-%m') between date_format('$from_date','%Y-%m') and date_format('$to_date','%Y-%m')
      //     order by month asc";
      //   // print_r($sql);die();
      //   $query = $this->db->query($sql);
      //   return $query->result_array();
      // }
      public function get_total_receiver_payments($from_date, $to_date, $receiver){

        $sql = "SELECT SUM(amount) as total FROM payment where payment_date BETWEEN '$from_date' AND '$to_date' and payment_receiver = '$receiver'";
  
          $query = $this->db->query($sql);
          return $query->result_array();
        }
    public function getAllHouses(){

    $sql="SELECT * from `property` where `active`= 1";    
    $query = $this->db->query($sql);
    return $query->result_array();

  }  

  public function get_property_tr_report(){

    $sql="SELECT * from `property` where `active`= 1";    
    $query = $this->db->query($sql);
    return $query->result_array();

  }  

       function getAllFlats($property_id){

    $sql="SELECT flats from `property` where `property_id`= $property_id";    
    $query = $this->db->query($sql);
    return $query->result_array();

  }    
     
  
    public function get_report_details_monthwise($month,$property_id){

    $query = "SELECT entry_form_details.* FROM entry_form_details WHERE `property_id` =$property_id AND `month` = '$month' AND status =1 ORDER BY `month`, flat_no";
    // $query = "SELECT DISTINCT entry_form_details.*, payment.amount
    // FROM entry_form_details
    // INNER JOIN payment ON entry_form_details.property_id = payment.property_id AND entry_form_details.month =payment.month
    // WHERE entry_form_details.property_id = $property_id AND entry_form_details.month = '$month' AND payment.status = 1 AND entry_form_details.status = 1
    // ORDER BY entry_form_details.month";

    // print_r($query);
    // die();
 
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
    $query = " SELECT * FROM invoice WHERE property_id = $property_id AND month ='$month' and flat_no = $flat_no order by `month`";
// print_r($query);die();
    $result = $this->db->query($query);
    return $result->result_array();
  }

     public function get_tenant_amount($flat_no, $property_id, $to_date, $from_date){

    $query = "SELECT SUM(amount) as amount FROM payment where property_id = $property_id and flat_no = $flat_no and payment_date between '$from_date' and '$to_date' order by payment_date";

    $result = $this->db->query($query);
    return $result->result_array();
  }

  public function get_tenant_amount_todate($flat_no, $property_id, $to_date){

    $query = "SELECT sum(amount) as amount FROM payment where property_id = $property_id and flat_no = $flat_no and payment_date <= '$to_date' order by payment_date";

    // print_r($query);
    // die();

    $result = $this->db->query($query);
    return $result->result_array();
  }

  public function get_payment_date($flat_no, $property_id, $month){

    $query = "SELECT payment_date FROM payment where property_id = $property_id and flat_no = $flat_no and month = '$month'";

    $result = $this->db->query($query);
    return $result->result_array();
  }

     public function get_tenant_previous_outstanding($flat_no, $property_id, $month){
$query = "SELECT SUM(amount) as amount FROM payment where property_id = $property_id and flat_no = $flat_no and month = '$month'";

    $result = $this->db->query($query);
    return $result->result_array();
  }

   public function get_tenant_name($flat_no, $property_id,$month){

    $query = "SELECT tenants.tenant_name,contact,tenants.flat_name FROM invoice, tenants where invoice.property_id = $property_id and tenants.property_id = $property_id and invoice.flat_no = $flat_no and tenants.flat_no = $flat_no and tenants.tenant_name = invoice.tenant_name and `month`='$month' ";
    // print_r($query);
    // die();
    $result = $this->db->query($query);
    return $result->result_array();
  }
     public function previousReading($property_id,$flat_no,$month){

    $query = "SELECT * FROM entry_form_details WHERE property_id =$property_id AND flat_no = $flat_no AND month = '$month'";
    
    $result = $this->db->query($query);
    return $result->result_array()[0]['current_meter_reading'];
  }

  public function get_tenant_entry_form_details($property_id){

    $query = "SELECT * FROM entry_form_details WHERE property_id = $property_id ORDER BY `month` ";
    
    $result = $this->db->query($query);
    return $result->result_array();
    
  }

  public function get_outstanding_report_details($property_id){

    $query = "SELECT outstanding_amount.*, invoice.tenant_name, tenants.contact FROM tenants, outstanding_amount,invoice WHERE invoice.property_id = $property_id and outstanding_amount.property_id = $property_id and invoice.flat_no = outstanding_amount.flat_no  and outstanding_amount.`status`=1 and outstanding_amount.outstanding_amount > 0 and outstanding_amount.month = invoice.month and invoice.tenant_name = tenants.tenant_name ORDER BY outstanding_amount.`month` asc"; 

    // print_r($query);
    // die();
    
    $result = $this->db->query($query);
    return $result->result_array();
    
  }

  public function insert_receiver_expenditure($date, $receiver, $head, $amount){

    $query = "INSERT INTO `expenditure` (`date`, `receiver`, `head`, `amount`) VALUES ('$date', '$receiver', '$head', '$amount')";

    $result = $this->db->query($query);
    return ;

  }

  public function get_expenditure(){

    $query = "SELECT * FROM expenditure ";
    
    $result = $this->db->query($query);
    return $result->result_array();
    
  }
  

  public function get_receiver_expenditure($from_date, $to_date, $receiver){

    $query = "SELECT SUM(amount) AS amount FROM expenditure where date BETWEEN '$from_date' AND '$to_date' and receiver = '$receiver'";

    $result = $this->db->query($query);
    return $result->result_array();
  }

  public function get_amount_received($property_id,$month,$flat)
  {
    $query = "SELECT SUM(amount) AS amount FROM payment where `property_id` = $property_id and `flat_no` = $flat and month = '$month'";
//     print_r($query);
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

  public function get_last_invoice($property_id, $flat_no){

    $query = " SELECT invoice FROM invoice WHERE property_id = $property_id AND flat_no = $flat_no order by month desc";

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


  public function get_flats_name($property_id)
  {
    $query = "SELECT property_id,flat_no,flat_name,tenant_name FROM tenants where property_id = $property_id AND status =1 ";
    $result = $this->db->query($query);
    return $result->result_array();
  }

  public function get_tenant($property_id, $flat_no)
  {
    
    $query = "SELECT flat_name, tenant_name FROM tenants where property_id = $property_id and flat_no = $flat_no  ";

    // print_r($query);
    // die();

    $result = $this->db->query($query);
    return $result->result_array(); 
  }

  public function get_property_name($property_id)
  {
    $query = "SELECT property_name FROM property where property_id = $property_id and active = 1";

    // print_r($query);
    // die();

    $result = $this->db->query($query);
    return $result->result_array(); 
  }

}

?>