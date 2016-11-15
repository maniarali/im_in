<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->view->layout = 'partials/layout';
		$this->view->load('header', 'partials/header');
		$this->view->load('footer', 'partials/footer');
	
	}		
	public function index(){	
		$this->view->load('content', 'home_page');
		$this->view->render();
		
		
	}
	public function authentication(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		if($email!='' && $password!=''){
			$query = $this->db->get_where('user',array('email' => $email, 'password' => $password));
			$result = $query->row();

			if($result){
				echo 'Welcome '.$result->fullName.' Your role in our system is '.$result->role;
				redirect('dashboard');
			}else{
				echo 'User authentication failure...';
			}
		}else{
			echo 'Enter Id or Password';
		}
		
	}

	public function register(){
		

		$fullName = $this->input->post('fullName');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$role = $this->input->post('role');

		echo $fullName ;
		echo $email;
		echo $password;
		echo $role;	
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
