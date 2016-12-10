<?php
class Admin extends CI_Controller{

	public function __construct(){

		parent::__construct();
	}

	public function check_login(){
		$check_login = $this->session->userdata('uhack_admin');
		if(isset($check_login)){
			redirect('admin/');
		}
	}

	public function logout(){
		$this->session->unset_userdata('uhack_admin');
		$this->session->sess_destroy();
		redirect('admin/login');
	}

	public function index(){

		$check_login = $this->session->userdata('uhack_admin');
		if(isset($check_login)){
			$s = $this->session->userdata('uhack_admin');
			$data['name'] =  $s['first_name'] . ' ' . $s['last_name'];
			$this->load->view('layouts/admin/admin', $data);	
		}else{
			redirect('admin/login');
		}
		

	}

	public function login(){
		$this->check_login();
		$this->load->view('layouts/admin/login_page');
	}

	public function login_process(){
		$this->load->model('admin_model');
		$username = $this->input->post('username');
		$password = hash('sha256', $this->input->post('password'));

		$login_data = array(
			'username' => $username,
			'password' => $password
		);
		$result = $this->admin_model->login_process($login_data);

		if($result == TRUE){
			redirect('/admin/');
		}else{
			$message = 'Invalid username and password!';
			echo $password;
			redirect('admin/login?message=' . base64_encode($message));
		}
	}

}
?>