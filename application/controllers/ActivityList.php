<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ActivityList extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Activity_model');
	}

    public function index()
	{
        if(empty($this->session->userdata('user_id'))){
			redirect('Login');
		}

        $user_id = $this->session->userdata('user_id');
        $user_type = $this->session->userdata('user_type');

        if($user_type == '1'){
            $details['activities'] = $this->Activity_model->getAllActivityList();
        }else{
            $details['activities'] = $this->Activity_model->getUserWiseActivityList($user_id);
        }

        $this->load->view('header',$details);
        $this->load->view('activity_list',$details);
        $this->load->view('footer');
            
         
    }
    public function getActivityByID(){
        $activity_id =	$this->input->post('activity_id');

        $activity_info = $this->Activity_model->getActivityByID($activity_id);

        if($activity_info){
            foreach($activity_info as $info){
                $details['activity_name'] = $info['activity_name'];
                $details['accessibility'] = $info['accessibility'];
                $details['participants'] = $info['participants'];
                $details['price'] = $info['price'];
            }
        }

        echo json_encode($details);
    }
    public function updateActivity(){
        $activity_id =	$this->input->post('activity_id');
        $data['activity_name'] =	$this->input->post('activity_name');
        $data['accessibility'] =	$this->input->post('accessibility');
        $data['participants'] =	$this->input->post('participants');
        $data['price'] =	$this->input->post('price');
        $data['modified_on'] =	date('Y-m-d');

        $this->db->update('tbl_activity', $data, array('activity_id' => $activity_id));
        
    }
    public function FetchNewActivity(){
        $user_id = $this->session->userdata('user_id');

        $activity_type = $this->Activity_model->getUserActivityType($user_id);

        $fetch_status = 0;

        $activity_limit = 0; //for some activity types only few activities are available - handling that 

        $today_fetched_count = $this->Activity_model->TodaysFetchedCount($user_id);

        if($today_fetched_count < 2){
            while($fetch_status == '0'){
                $fetch_status = $this->FetchActivity($user_id,$activity_type);
                $activity_limit++;
                if($activity_limit > 10){
                    $fetch_status = '5';
                    break; 
                }
            }
        }

        echo $fetch_status;
        
    }
    public function FetchActivity($user_id,$activity_type){
        $apiurl     = 'http://www.boredapi.com/api/activity?type='.$activity_type;
        log_message('debug','apiurl -- '.$apiurl);
        $curl       = curl_init();
        curl_setopt( $curl, CURLOPT_URL, $apiurl );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $curl, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json' ) );
        curl_setopt( $curl, CURLOPT_ENCODING, '');
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
        log_message('debug','apiurlssseee -- '.$this->db->last_query());
        log_message('debug','apiurlsss -- '.$query->num_rows());
        if($query->num_rows() == 0){
            $data_arr = array(
                    'user_fk'=>$user_id,
                    'activity_type'=>$type,
                    'activity_key'=>$key,
                    'accessibility'=>$accessibility,
                    'participants'=>$participants,
                    'price'=>$price,
                    'active'=>'10',
                    'added_on'=> date('Y-m-d'),
                    'activity_name'=>$activity
                );
            $this->db->insert('tbl_activity',$data_arr);
            return "10";

        }else{
            return "0";
        }
    }
    public function DeleteActivity(){
        $activity_id =	$this->input->post('activity_id');

        $this->db->where('activity_id', $activity_id);
        $this->db->delete('tbl_activity');

    }

}
?>