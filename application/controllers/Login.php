<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->library('session');
        $this->load->model('LoginM');
    }	
	
	public function index()
	{
		$this->load->view('Login/Login');
	}

	public function Login()
	{
		if(isset($_POST)){
				$username = $_POST['username'];
				$password = md5($_POST['password']);
				$check = $this->LoginM->checkUser($username,$password);
				if(!empty($check)){
					$_SESSION['user'] = $check[0]['name'];
					$_SESSION['login_type'] = $check[0]['type'];
					redirect(base_url('Home'));
				}else{
					redirect(base_url('Login'));
				}
		}else{
			redirect(base_url('Login'));
		}
	}
}
