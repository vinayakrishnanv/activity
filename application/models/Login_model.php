<?php defined('BASEPATH') OR exit('No direct script access allowed');  
class Login_model extends CI_Model{ 
	public function __construct(){ 
		parent::__construct(); 
		$this->load->database(); 
	} 
	public function logincheck($data){ 
		$sql	=	$this->db->get_where('tbl_users',$data); 
		if($sql->num_rows()>0){ 
			$user	=	$sql->row_array(); 
			$this->session->set_userdata('user_id',$user['user_id']);
			$this->session->set_userdata('user_type',$user['user_type']); 

			redirect('ActivityList');
		} 
		else{ 
			$this->session->set_flashdata('msg', 'Login Error : Username / Password incorrect!');
			redirect('Login'); 
			$this->session->flashdata('msg');
		} 
	} 

} ?> 
