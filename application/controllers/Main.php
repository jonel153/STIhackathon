<?php
class Main extends CI_Controller{

	public function __construct(){

		parent::__construct();
	}


	public function index(){
		$check_login = $this->session->userdata('uhack_farmers');
		if(isset($check_login)){
			$s = $this->session->userdata('uhack_farmers');
			$data['name'] =  $s['first_name'] . ' ' . $s['last_name'];
			$data['status'] = '1';
			$this->load->view('layouts/header', $data);	
		}else{
			$data['status'] = '0';
			$this->load->view('layouts/header', $data);
		}
		

	}

	public function About(){
		$this->load->view('layouts/about');

	}

	public function login(){
		$check_login = $this->session->userdata('uhack_farmers');
		if(isset($check_login)){
			$s = $this->session->userdata('uhack_farmers');
			$data['name'] =  $s['first_name'] . ' ' . $s['last_name'];
			$data['status'] = '1';
			$user = $s['user_level'];
			if($user == "Farmers"){
				redirect('main/farmers');
			}elseif($user == "Merchant"){
				redirect('/');
			}else{

			}
			
		}else{
			$data['status'] = '0';
			$this->load->view('layouts/login');
		}
		
	}

	public function registration_farmers(){
		$this->load->view('layouts/registration_farmers');
	}

	public function login_process(){
		$this->load->model('main_model');
		echo $email = $this->input->post('email');
		$password = $this->input->post('password');

		$login_data = array(
			'email' => $email,
			'password' => $password
		);
		$result = $this->main_model->login_process($login_data);

		if($result == TRUE){
			$s = $this->session->userdata('uhack_farmers');
			$data['name'] =  $s['first_name'] . ' ' . $s['last_name'];
			redirect('main/farmers', $data);
		}else{
			echo $message = 'Invalid username and password!';
			echo $password;
			//redirect('admin/login?message=' . base64_encode($message));
		}
	}

	public function logout(){
		$this->session->unset_userdata('uhack_farmers');
		$this->session->sess_destroy();
		redirect('main/login');
	}

	public function farmers(){
		$check_login = $this->session->userdata('uhack_farmers');
		$this->load->model('main_model');
		if(isset($check_login)){
			$s = $this->session->userdata('uhack_farmers');
			$data['name'] =  $s['first_name'] . ' ' . $s['last_name'];
			$data['id'] = $s['id'];
			$data['ids'] = $s['id'];
			$data['user_level'] = $s['user_level'];
			$data['type'] = $this->main_model->get_type();
			if($s['user_level'] == 'Farmers'){
				$data['check_loan'] = $this->check_loan();

				if($data['check_loan'] == FALSE){
					$data['status'] = '1';
				}else{
					$data['status'] = '2';
				}

				$data['get_product'] = $this->main_model->get_product($s['id']);

				$this->load->view('layouts/farmers', $data);
			}else{
				redirect('/');
			}
				
		}else{
			redirect('admin/login');
		}
			
	}

	public function product(){


		$check_login = $this->session->userdata('uhack_farmers');
		if(isset($check_login)){
			$s = $this->session->userdata('uhack_farmers');
			$data['name'] =  $s['first_name'] . ' ' . $s['last_name'];
			$data['status'] = '1';
			$user = $s['user_level'];
			if($user == "Farmers"){
				redirect('main/farmers');
			}elseif($user == "Merchant"){
				$data['status'] = '1';
				$this->load->model('main_model');
				$data['product'] = $this->main_model->product('product');

				$this->load->view('layouts/products', $data);
			}else{

			}
			
		}else{
			$data['status'] = '0';
			$this->load->model('main_model');
			$data['product'] = $this->main_model->product('product');

			$this->load->view('layouts/products', $data);
		}

		
	}

	public function post_product(){

		$this->load->model('main_model');

		mkdir('images/product/'. $prodID, 0777, true);

			
		$fronttemp = $_FILES['displaypic']['tmp_name'];
		$name = $_FILES["displaypic"]["name"];
		

		move_uploaded_file($fronttemp,'images/'.$name);

		$path = 'images/'.$name;
		$result = $this->main_model->post_product($path);
		
		redirect('main/farmers');
	}

	public function product_details($id){

		$this->load->model('main_model');
		$data['product'] = $this->main_model->product_details($id);
		$this->load->view('layouts/product_details', $data);
	}
	public function request_loan(){

		$this->load->model('main_model');

		$result = $this->main_model->request_loan();
		
		redirect('main/farmers');
	}

	public function check_loan(){
		$this->load->model('main_model');
		$s = $this->session->userdata('uhack_farmers');
		$data['id'] = $s['id'];
		$result = $this->main_model->check_loan($data);

		if($result == FALSE){
			return FALSE;

		}else{
			return $result;
		}
		
		/*if($result){
			echo 1;
			return TRUE;
		}else{
			echo 2;
			return FALSE;
		}*/
	}

	public function purchase($id){
		$this->load->model('main_model');
		$s = $this->session->userdata('uhack_farmers');
		$source_account = $s['bank_account'];
		$data['purchase_info'] = $this->main_model->purchase_info($id);
		$transaction_id = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);
		$info = array($data['purchase_info']);
		foreach ($info as $key) {
			$name = $key[0]->first_name . ' ' . $key[0]->last_name;
			$bank_account = $key[0]->bank_account;
			$number = '63' .substr($key[0]->contact,1);
			$amount = $key[0]->total;
	


		}
		$result = $this->main_model->accept($id);
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
			  	CURLOPT_POSTFIELDS => "{\"channel_id\":\"Rising Farmers\",\"transaction_id\":\"$transaction_id\",\"source_account\":\"$source_account\",\"source_currency\":\"php\",\"target_account\":\"$bank_account\",\"target_currency\":\"php\",\"amount\":$amount}",
			  	CURLOPT_HTTPHEADER => array(
			    	"accept: application/json",
			    	"content-type: application/json",
			    	"x-ibm-client-id: 61ce107f-69e5-440b-9762-5c0f8554da2a",
			    	"x-ibm-client-secret: O8oQ5qD3vY0yN4aV1cE8mF4mU8sE4uS7nG8mO7xY3vQ1yM0jF1"
			  	),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			echo $response;
			curl_close($curl);

			/*$data = explode(",",$response);
			foreach ($data as $value) {
				echo $value .'<br/>';
			}*/
			
			if ($err) {
			  echo "cURL Error #:" . $err;
			}else{
				$message = 'Hello ' . $name . ' your product has been purchase'. number_format($amount);  
				$this->sms($number, $message);
			  //echo $response;
			}
			//redirect('main/farmers');
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
