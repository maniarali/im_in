<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('id'))
			redirect('login');

		$this->view->layout = 'partials/layout';
		$this->view->load('header', 'partials/header');
		$this->view->load('footer', 'partials/footer');
	}

	public function index()
	{
		$data = array();
		$data['attendance_record'] = $this->session->userdata('attendance_record');
		$this->view->set($data);
		$this->view->load('content', 'dashboard');
		$this->view->render();
	}

	public function checkIn(){
		
		date_default_timezone_set("Asia/Karachi");
		
		$d=strtotime("now");
		$date = date("Y-m-d",$d);
		$date_time =  date("Y-m-d H:i:s",$d);

		$data = array(
			'UserId' => '1',
			'date' => $date,
			'timeIn' => $date_time,
		);

		$this->load->model('Attendance');
		$record = $this->Attendance->markIn($data);

		if ($record)
		{
			$attendance_record = $this->session->userdata('attendance_record');
			$attendance_record['check_in'] = FALSE;
			$attendance_record['check_out'] = TRUE;
			$attendance_record['absent'] = FALSE;
			$this->session->set_userdata('attendance_record', $attendance_record);
		}
		redirect('dashboard');
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
		$record = $this->Attendance->markOut($data);
		if ($record)
		{
			$attendance_record = $this->session->userdata('attendance_record');
			$attendance_record['check_in'] = TRUE;
			$attendance_record['check_out'] = FALSE;
			$attendance_record['absent'] = TRUE;
			$this->session->set_userdata('attendance_record', $attendance_record);
		}
		redirect('dashboard');
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
		$record = $this->Attendance->markIn($data);
		if ($record)
		{
			$attendance_record = $this->session->userdata('attendance_record');
			$attendance_record['check_in'] = FALSE;
			$attendance_record['check_out'] = FALSE;
			$attendance_record['absent'] = FALSE;
			$this->session->set_userdata('attendance_record', $attendance_record);
		}
		redirect('dashboard');
	}

	public function listEmployees()
	{
		$data = array();
		$this->load->model('User');
		$data['employees'] = $this->User->listEmployees();

		$this->view->set($data);
		$this->view->load('content', 'listEmployees');
		$this->view->render();


	}
	public function register()
	{
		$data = array();
		if ($_POST)
		{
			$fullName = $this->input->post('fullName');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$role = $this->input->post('role');

			if($fullName!='' && $email!='' && $password!='' && $role!='')
			{
				$this->load->model('User');

				$record = $this->User->check($email);
				if (!$record)
				{
					$data = array(
						'fullName' => $fullName,
						'email' => $email,
						'password' => md5($password),
						'role' => $role,
						'status' => 1
					);

					$result = $this->User->register($data);

					if($result)
					{
						redirect('dashboard');
						
					}
					else
					{
						$data['error'] = 'User in saving data...';
					}
				}
				else
				{
					$data['error'] = 'User already exists...';
				}
			}
			else
			{
				$data['error'] = 'Some fields are missing...';
			}
		}
		$this->view->set($data);
		$this->view->load('content', 'register');
		$this->view->render();
	}
}
