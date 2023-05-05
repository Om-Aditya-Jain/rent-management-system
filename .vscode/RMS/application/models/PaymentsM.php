<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PaymentsM extends CI_Model {

      function __construct()
      {
          // Call the Model constructor
          parent::__construct();
      }

      function get_payment(){

        $sql = "SELECT p.*, t.tenant_name as `name` FROM payments p inner join tenants t on t.id = p.tenant_id where t.status = 1 order by date(p.date_created) desc "; 
                  
        $query =$this->db->query($sql);
        return $query->result_array();
      }

      function get_tenant_name(){

        $sql = "SELECT DISTINCT tenant_name as `name`, `id` FROM tenants WHERE `status`=1"; 
                  
        $query =$this->db->query($sql);
        return $query->result_array();
      }

      function insert_new_payment($tenant_id,$invoice,$amount){

        $sql = "INSERT INTO payments (tenant_id,invoice,amount) VALUES ('$tenant_id', '$invoice', '$amount')";

        $query = $this->db->query($sql);
        return;
      }
      function update_payment($id, $tenant_id,$amount){

        $sql = "UPDATE `payments` SET `amount` = $amount WHERE `sno` = $id and `tenant_id`=$tenant_id";

        $query = $this->db->query($sql);
        return;
      }
      function delete_payment($id){

        $sql = "DELETE FROM `payments` WHERE `sno` = $id ";

        $query = $this->db->query($sql);
        return;
      }

      function get_tenant_name_dropdown(){
        
        $sql ="SELECT *, tenant_name as `name` FROM tenants where `status` = 1 order by `name` asc"; 
        $query = $this->db->query($sql);
        return $query->result_array();
      }
                
                         
}

?>