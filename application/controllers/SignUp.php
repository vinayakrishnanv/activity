<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class SignUp extends CI_Controller{ 
	public function __construct(){
        parent::__construct();
        
        $this->load->helper('url');
        $this->load->database(); 
        $this->load->library('email');

	}
	public function index(){

		if($this->session->userdata('user_id')){
			redirect('ActivityList');
		}
		
		$this->load->view('signup');
	}
    public function SignUpProcess(){
        $data['name']	=	$this->input->post('txtName');
        $data['username'] =	$this->input->post('txtUserName');
        $data['user_email'] =	$this->input->post('txtEmail');
        $data['activity_type'] =	$this->input->post('activity_type');
        $passwrd =	$this->input->post('txtPassword');
        $data['password']	= md5($passwrd);
        $data['user_type']	= '2'; //2 for end user, 1 for admin
        $data['registered_on']	=   date('Y-m-d');
        $data['active']	=   '10';

        $this->db->from('tbl_users');
        $this->db->where('username', $data['username']); 
        $this->db->where('active', '10');
        $query = $this->db->get();
        if($query->num_rows() != 0){
            $this->session->set_flashdata('msg', 'Username not available');
			redirect('SignUp'); 
			$this->session->flashdata('msg');
        }

        $this->db->insert('tbl_users',$data);

        $user_id = $this->db->insert_id();

        $activity_count = 1;

        /*  inserting 10 activities */
        while($activity_count <= '10')
        {

            $apiurl     = 'http://www.boredapi.com/api/activity?type='.$data['activity_type'];
            $curl       = curl_init();
            curl_setopt( $curl, CURLOPT_URL, $apiurl );
            curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
            curl_setopt( $curl, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json' ) );
            $result = curl_exec( $curl );
            $bored_array = json_decode( $result, true );
            curl_close( $curl );

            
            $activity = $bored_array['activity'];
            $type = $bored_array['type'];
            $key = $bored_array['key'];
            $accessibility = $bored_array['accessibility'];
            $participants = $bored_array['participants'];
            $price = $bored_array['price'];

            $this->db->from('tbl_activity');
            $this->db->where('activity_key', $key); 
            $this->db->where('user_fk', $user_id);
            $this->db->where('active', '10');
            $query = $this->db->get();
            if($query->num_rows() == 0){
                $data_arr = array(
                        'user_fk'=>$user_id,
                        'activity_type'=>$type,
                        'activity_key'=>$key,
                        'accessibility'=>$accessibility,
                        'participants'=>$participants,
                        'price'=>$price,
                        'active'=>'10',
                        'activity_name'=>$activity
                    );
                $this->db->insert('tbl_activity',$data_arr);
                $activity_count++; 

            }

        }

        $mail_content = 'Hello '.$data['name'].', Welcome to Activity.';

        $this->email->set_mailtype("html");
        $this->email->from('vinayakrishnanv@yahoo.com');
        $this->email->to($data['user_email']);
        $this->email->subject('Welcome to Activity');
        $this->email->message($mail_content);
        $this->email->send();

        $this->session->set_userdata('user_id',$user_id);
		$this->session->set_userdata('user_type','2'); //2 for end user, 1 for admin

        redirect('ActivityList');
        
    }
    public function checkAvailability(){
        $username =	$this->input->post('txtUserName');

        $this->db->from('tbl_users');
        $this->db->where('username', $username); 
        $this->db->where('active', '10');
        $query = $this->db->get();
        if($query->num_rows() == 0){
            echo "<span class='status-available'> Username Available.</span>";
        }else{
            echo "<span class='status-not-available'> Username Not Available.</span>";
        }
    }
}
 ?>
