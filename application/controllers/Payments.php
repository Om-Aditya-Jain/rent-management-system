<?php 
defined('BASEPATH') OR exit('No direct script allowed');

class Payments extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('PaymentsM');
		if(!isset($_SESSION['user'])){
			redirect(base_url());
		}
	}

	public function index(){

		$data['payment_details'] = $this->PaymentsM->get_payment();
		$data['tenants'] = $this->PaymentsM->get_tenant_name();
		$this->load->view('Payments/paymentview',$data);
	}

	public function new_entry(){

		$data['tenants'] = $this->PaymentsM->get_tenant_name_dropdown();
		$this->load->view('Payments/manage_payment',$data);
		
	}

	public function add_new_entry(){

		$tenant_id = $_POST['tenant_id'];
		$invoice = $_POST['invoice'];
		$amount = $_POST['amount'];

		$this->PaymentsM->insert_new_payment($tenant_id,$invoice,$amount);

		redirect(base_url('Payments'));
	}

	public function edit_entry(){

		$id = $_POST['id'];
		$tenant_id = $_POST['tenant_id'];
		// $invoice = $_POST['invoice'];
		$amount = $_POST['amount'];

		$this->PaymentsM->update_payment($id,$tenant_id,$amount);

		redirect(base_url('Payments'));
	}

	public function delete_entry($id){

		$this->PaymentsM->delete_payment($id);

		redirect(base_url('Payments'));
	}
}

?>