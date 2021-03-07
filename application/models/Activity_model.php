<?php defined('BASEPATH') OR exit('No direct script access allowed');  
class Activity_model extends CI_Model{ 
	public function __construct(){ 
		parent::__construct(); 
		$this->load->database(); 
	} 

    public function getUserWiseActivityList($user_id){
        $this->db->select('*');
        $this->db->from('tbl_activity');
        $this->db->where('active','10');
        $this->db->where('user_fk',$user_id);
        $sql   =   $this->db->get();
        return $sql->result_array();
    }
    public function getAllActivityList(){
        $this->db->select('*');
        $this->db->from('tbl_activity');
        $this->db->join('tbl_users','user_fk = user_id');
        $this->db->where('tbl_activity.active','10');
        $sql   =   $this->db->get();
        return $sql->result_array();
    }
    public function getActivityByID($activity_id){
        $this->db->select('*');
        $this->db->from('tbl_activity');
        $this->db->where('activity_id',$activity_id);
        $sql   =   $this->db->get();
        return $sql->result_array();
    }
    public function getUserActivityType($user_id){
        $this->db->select('activity_type');
        $this->db->from('tbl_users');
        $this->db->where('user_id',$user_id);
        $sql   =   $this->db->get();
        $ActivitySQL = $sql->result_array();

        if($ActivitySQL){
            foreach ($ActivitySQL as $value) {
                $activity_type = $value['activity_type'];
            }
        }

        return $activity_type;
    }
    public function TodaysFetchedCount($user_id){
        $this->db->from('tbl_activity');
        $this->db->where('added_on', date('Y-m-d')); 
        $this->db->where('user_fk', $user_id);
        $this->db->where('active', '10');
        $query = $this->db->get();
        $num_rows = $query->num_rows();

        return $num_rows;
    }
    

    

}
?>