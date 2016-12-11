<?php
class Main extends CI_Controller{

	public function __construct(){

		parent::__construct();
	}


	public function index(){
		$this->load->view('layouts/header');

	}

	public function About(){
		$this->load->view('layouts/about');

	}

	public function login(){
		$this->load->view('layouts/login');
	}

	public function registration_farmers(){
		$this->load->view('layouts/registration_farmers');
	}
}
?>
