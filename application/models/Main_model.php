<?php
class main_model extends CI_Model{

	public function login_process($data){

		$this->db->select('*');
		$this->db->from('user_tbl');
		/*$this->db->where('email_address="'. $data['email'] . '" AND password="' . $data['password'] . '"');*/
		$query = $this->db->query('SELECT * FROM user_tbl WHERE email_address="' . $data['email'] . '" AND password="' . $data['password'] . '"');
		/*$query = $this->db->get();*/
		
		echo $query->num_rows();
		 $result = $query->result();
		if($query->num_rows > 0){
			$session = array(
				'username' => $result[0]->email_address,
				'id' => $result[0]->id,
				'first_name' => $result[0]->first_name,
				'last_name' => $result[0]->last_name,
				'user_level' => $result[0]->user_level,
				'bank_account' => $result[0]->bank_account
			);
			$this->session->set_userdata('uhack_farmers', $session);
			
			return true;

		}else{
			return false;
		}
	}

	public function post_product($images){
		$farmers_id = $this->input->post('farmers_id');
		$type = $this->input->post('type');
		$unit = $this->input->post('unit');
		$price = $this->input->post('price');
		$quantity = $this->input->post('quantity');
		$total = $price * $quantity;
		$query = $this->db->query("INSERT INTO product (farmers_id, type, unit, price, quantity, total, images)
				VALUES('$farmers_id','$type','$unit', '$price', '$quantity', '$total', '$images')");
		
		if($query > 0){
			
			return true;
		}else{
			return false;
		}

	}

	public function request_loan(){
		$farmers_id = $this->input->post('farmers_id');
		$loan = $this->input->post('loan');
		$status = 'Pending';
		$query = $this->db->query("INSERT INTO loan (farmers_id, amount, status)
				VALUES('$farmers_id','$loan','$status')");
		
		if($query > 0){
			return true;
		}else{
			return false;
		}
	}

	public function check_loan($data){

		$this->db->select('*');
		$this->db->from('loan');
		$this->db->where('farmers_id="'. $data['id'] . '" AND (status="Pending" OR paid="")');
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->result();
		
		if($result){
			return $result;	
		}else{
			return FALSE;
		}
		
		
	}

	public function get_product($data){

		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('farmers_id="'. $data . '" AND status=""');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
		
	}

	public function product($data){

		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('status=""');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}


	public function product_details($data){

		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('status="" AND id='.$data);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
		
	}

	public function purchase_info($id){
		$query = $this->db->query("SELECT product.total, user_tbl.* FROM user_tbl, product WHERE product.farmers_id=user_tbl.id AND product.id=".$id);
		//$this->db->query("SELECT loan.*, user_tbl.* FROM loan, user_tbl WHERE loan.farmers_id=user_tbl.id");
		$result = $query->result();
		
		return $result;
	}

	public function accept($id){
				
		$query = $this->db->query('UPDATE product set status="done" WHERE id="' . $id . '"');
		return $query;
	}

	public function get_type(){

		$this->db->select('*');
		$this->db->from('farm_type');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
		
	}


}
?>