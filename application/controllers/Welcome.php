<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->view->layout = 'partials/layout';
		$this->view->load('header', '');
		$this->view->load('footer', '');	
	}

	public function register(){
		

		$fullName = $this->input->post('fullName');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$role = $this->input->post('role');

		if($fullName!='' && $email!='' && $password!='' && $role!=''){
			
			$data = array(
				'fullName' => $fullName,
				'email' => $email,
				'password' => $password,
				'role' => $role
			);


			$this->load->model('Attendance');
			$this->Attendance->markIn($data);

		}else{
			echo 'Somthing is missing';
		}
		
		
	}
}
