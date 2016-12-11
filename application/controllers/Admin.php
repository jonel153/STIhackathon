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
			$data['get_loan'] = $this->get_loan();
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

	public function get_loan(){
		$this->load->model('admin_model');
		$result = $this->admin_model->get_loan();

		return $result;
	}

	public function accept($id, $amount, $farmers_id){
		$this->load->model('admin_model');

		$data['farmers_info'] = $this->admin_model->farmers_info($farmers_id);
		$info = array($data['farmers_info']);
		foreach ($info as $key) {
			$name = $key[0]->first_name . ' ' . $key[0]->last_name;
			$number = '63' .substr($key[0]->contact,1);
		}



		$result = $this->admin_model->accept($id, $amount);
		if(isset($result)){

			$curl = curl_init();
		
			curl_setopt_array($curl, array(
			  	CURLOPT_URL => "https://api.us.apiconnect.ibmcloud.com/ubpapi-dev/sb/api/RESTs/transfer",
			  	CURLOPT_RETURNTRANSFER => true,
			  	CURLOPT_ENCODING => "",
			  	CURLOPT_MAXREDIRS => 10,
			  	CURLOPT_TIMEOUT => 30,
			  	CURLOPT_SSL_VERIFYPEER => false,
			  	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  	CURLOPT_CUSTOMREQUEST => "POST",
			  	CURLOPT_POSTFIELDS => "{\"channel_id\":\"Rising Farmers\",\"transaction_id\":\"$id\",\"source_account\":\"101243427914\",\"source_currency\":\"php\",\"target_account\":\"100183723187\",\"target_currency\":\"php\",\"amount\":$amount}",
			  	CURLOPT_HTTPHEADER => array(
			    	"accept: application/json",
			    	"content-type: application/json",
			    	"x-ibm-client-id: 61ce107f-69e5-440b-9762-5c0f8554da2a",
			    	"x-ibm-client-secret: O8oQ5qD3vY0yN4aV1cE8mF4mU8sE4uS7nG8mO7xY3vQ1yM0jF1"
			  	),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			/*$data = explode(",",$response);
			foreach ($data as $value) {
				echo $value .'<br/>';
			}*/
			
			if ($err) {
			  echo "cURL Error #:" . $err;
			}else{
				$message = 'Hello ' . $name . ' your loan in RISING FARMERS approved worth PHP'. number_format($amount);  
				$this->sms($number, $message);
			  //echo $response;
			}
			redirect('main/farmers');
		}else{
			echo 'Failed';
		}
	}

	public function sms($number, $message){

		$curl = curl_init();
		$verificationcode = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://post.chikka.com/smsapi/request",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_SSL_VERIFYPEER => false,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "message_type=SEND&mobile_number=" . $number . "&shortcode=29290492017&client_Id=23629b0f3a1be89a1662690c0d03b7d404ccd43133bef66b41d7581840db77d7&secret_key=51164ecaa4ca629e73cacc5749188f8ce03c8d8c3afcc3c0bff31efffa9b89f9&message=" . $message . "&message_id=x12312312333". $verificationcode,
		  CURLOPT_HTTPHEADER => array(
		    "cache-control: no-cache",
		    "content-type: application/x-www-form-urlencoded",
		    "postman-token: 80ee916c-5ad7-6c5f-00f9-757227bebba3"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
		}
	}
}
?>