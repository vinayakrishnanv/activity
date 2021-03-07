<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Login extends CI_Controller{ 
	public function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->helper('url');

	}
	public function index(){

		if($this->session->userdata('user_id')){
			redirect('ActivityList');
		}
		
		$this->load->view('login');
	}
	public function logout(){

		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_type');

		$this->session->sess_destroy();
		session_destroy();
    	unset($_SESSION);

		redirect('Login');
	}
	public function loginprocess(){
		$data['username']	=	$this->input->post('txtUsername');
		$passwrd =	$this->input->post('txtpassword');
		$data['password']	= md5($passwrd);
		$data['active']	=   '10';
		$this->Login_model->logincheck($data);
	}
}
 ?>
