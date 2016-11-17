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
			'UserId' => $this->session->userdata('id'),
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
			'userId' => $this->session->userdata('id'),
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
			$attendance_record['absent'] = FALSE;
			$this->session->set_userdata('attendance_record', $attendance_record);
		}
		redirect('dashboard');
	}
	
	public function absent(){
		
		date_default_timezone_set("Asia/Karachi");
		
		$d=strtotime("now");
		$date = date("Y-m-d",$d);

		$data = array(
			'userId' => $this->session->userdata('id'),
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
	public function listAttendances()
	{	
		$data = array();
		$data['navigation'] = 'overview';
		$this->load->library("pagination");
		$userId = $this->session->userdata('id');
		$this->load->model('Attendance');

		$config = array();
        $config["base_url"] = base_url() . "employees/listAttendances";
        $config["total_rows"] = $this->Attendance->listAttendances_count($userId);
        $config["per_page"] = 1;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["attendances"] = $this->Attendance->listAttendances($userId,$config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

		$this->view->set($data);
		$this->view->load('content', 'overview');
		$this->view->render();
	}
	public function listEmployees()
	{	
		
		$data = array();
		$data['navigation'] = 'employees';
		$this->load->model('User');
		$data['employees'] = $this->User->listEmployees();

		$this->view->set($data);
		$this->view->load('content', 'listEmployees');
		$this->view->render();


	}
	
	public function viewEmployee($userId = NULL)
	{	
		if (!$userId)
			redirect('employees/listEmployees');
		$data = array();
		$userId = !$userId ? $userId : $this->session->userdata('id');
		$data['navigation'] = 'employees';
		$this->load->library("pagination");
		$this->load->model('Attendance');

		$config = array();
        $config["base_url"] = base_url() . "employees/viewEmployee";
        $config["total_rows"] = $this->Attendance->listAttendances_count($userId);
		//print_r($config["total_rows"]); exit;
        $config["per_page"] = 1;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["attendances"] = $this->Attendance->listAttendances($userId,$config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

		$this->view->set($data);
		$this->view->load('content', 'overview');
		$this->view->render();


	}
	public function register()
	{
		$data = array();
		$data['navigation'] = 'register';
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
				$this->session->set_flashdata('error', 'Some fields are missing...');
				redirect('employees/register');

			}
		}
		$this->view->set($data);
		$this->view->load('content', 'register');
		$this->view->render();
	}
	
	public function edit($employeeId = NULL)
	{
		if (!$employeeId)
			redirect('employees/listEmployees');
		$data = array();
		$data['navigation'] = 'employees';
		$this->load->model('User');
		$data['employee'] = $this->User->getEditUser($employeeId);
		$this->view->set($data);
		$this->view->load('content', 'edit');
		$this->view->render();	
	}
	public function delete($employeeId = NULL)
	{
		if (!$employeeId)
			redirect('employees/listEmployees');
		$newStatus = 0;
		$this->load->model('User');
		$this->User->delete($employeeId,$newStatus);
		redirect('employees');
	}
	public function retrieve($employeeId = NULL)
	{
		if (!$employeeId)
			redirect('employees/listEmployees');
		$this->load->model('User');
		$newStatus = 1;
		$this->load->model('User');
		$this->User->delete($employeeId,$newStatus);
		redirect('employees');
	}

}
