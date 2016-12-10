<?php
class Admin_model extends CI_Model{

	public function login_process($data){

		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('username="'. $data['username'] . '" AND password="' . $data['password'] . '"');
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->result();
		

		if($query->num_rows() == 1){
			$session = array(
				'username' => $result[0]->username,
				'id' => $result[0]->userid,
				'first_name' => $result[0]->first_name,
				'last_name' => $result[0]->last_name,
			);
			$this->session->set_userdata('uhack_admin', $session);
			
			return true;

		}else{
			return false;
		}
	}
}
?>