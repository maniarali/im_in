<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->view->layout = 'partials/layout';
		$this->view->load('header', 'partials/header');
		$this->view->load('footer', 'partials/footer');
	
	}		
	public function index(){	
		$this->view->load('content', 'dashboard');
		$this->view->render();
	}
	public function checkIn(){
		
		date_default_timezone_set("Asia/Karachi");
		
		$d=strtotime("now");
		$date = date("Y-m-d",$d);
		$date_time =  date("Y-m-d H:i:s",$d);

		echo $date_time ;
		$data = array(
			'UserId' => '1',
			'date' => $date,
			'timeIn' => $date_time,
		);


		$this->load->model('Attendance');
		$this->Attendance->markIn($data);

	}
	
	public function checkOut(){
		
		date_default_timezone_set("Asia/Karachi");
		
		$d=strtotime("now");		
		$date = date("Y-m-d",$d);
		$date_time =  date("Y-m-d H:i:s",$d);

		$data = array(
			'userId' => '1',
			'date' => $date,
			'timeOut' => $date_time,
		);


		$this->load->model('Attendance');
		$this->Attendance->markOut($data);

	}
	
	public function absent(){
		
		date_default_timezone_set("Asia/Karachi");
		
		$d=strtotime("now");
		$date = date("Y-m-d",$d);

		$data = array(
			'userId' => '1',
			'date' => $date,
			'absent' => 1,
		);


		$this->load->model('Attendance');
		$this->Attendance->markIn($data);

	}

	public function register(){
		
		$this->view->load('content', 'register');
		$this->view->render();
	}
}
