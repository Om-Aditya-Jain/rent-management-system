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
      function get_receiver_payments($from_date, $to_date, $receiver){

      $sql = "SELECT amount, reference_id, payment_date, payment_receiver FROM payment where payment_date BETWEEN '$from_date' AND '$to_date' and payment_receiver = '$receiver'";

        $query = $this->db->query($sql);
        return $query->result_array();
      }

      function get_flatwise_payments($to_date,$from_date,$property_id,$flat_no){
        $sql = " SELECT entry_form_details.*, tenants.tenant_name,tenants.rent, invoice.invoice, sum(payment.amount) as amount_paid FROM entry_form_details , tenants , property , invoice, payment  
        WHERE  entry_form_details.property_id = $property_id and entry_form_details.flat_no = $flat_no and
        tenants.property_id = $property_id and tenants.flat_no = $flat_no and tenants.property_id = entry_form_details.property_id and tenants.property_id = property.property_id
         AND tenants.flat_no = entry_form_details.flat_no
         and entry_form_details.timestamp between '$to_date' and '$from_date' and payment.property_id = $property_id and payment.flat_no=$flat_no and payment.month = '$month' 
         order by unix_timestamp(entry_form_details.timestamp)  asc";
        // print_r($sql);die();
        $query = $this->db->query($sql);
        return $query->result_array();
      }
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

       function getAllFlats($property_id){

    $sql="SELECT flats from `property` where `property_id`= $property_id";    
    $query = $this->db->query($sql);
    return $query->result_array();

  }    
  
    public function get_report_details_monthwise($month,$property_id){

    $query = "SELECT entry_form_details.* FROM entry_form_details WHERE `property_id` =$property_id AND `month` = '$month' AND status =1 ORDER BY `month`";

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
    $query = " SELECT invoice FROM invoice WHERE property_id = $property_id AND month ='$month' and flat_no = $flat_no order by `month`";

    $result = $this->db->query($query);
    return $result->result_array();
  }

     public function get_tenant_amount($flat_no, $property_id, $month){

    $query = "SELECT SUM(amount) as amount FROM payment where property_id = $property_id and flat_no = $flat_no and month = '$month'";

    $result = $this->db->query($query);
    return $result->result_array();
  }

   public function get_tenant_name($flat_no, $property_id){

    $query = "SELECT tenant_name FROM tenants where property_id = $property_id and flat_no = $flat_no and status =1 ";
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

    $query = "SELECT * FROM outstanding_amount WHERE property_id = $property_id ORDER BY `month` ";
    
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




}

?>