<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->view->layout = 'partials/layout';
		$this->view->load('header', '');
		$this->view->load('footer', '');
	}

	public function index()
	{		
		if ($this->session->userdata('id'))
			redirect('dashboard');

		$data = array();
		if ($_POST)
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			if($email!='' && $password!='')
			{
				$query = $this->db->get_where('user',array('email' => $email, 'password' => md5($password)));
				$result = $query->row();

				if($result)
				{
					if($result->status)
					{
						$this->load->model('Attendance');
						$attendance = $this->Attendance->check_today_record($result->id);
						$attendance_record = array('check_in' => TRUE, 'check_out' => FALSE, 'absent' => TRUE);
						if ($attendance)
						{
							if ($attendance->timeOut)
							{
								$attendance_record = array('check_in' => TRUE, 'check_out' => FALSE, 'absent' => FALSE);
							}
							elseif ($attendance->timeIn)
							{
								$attendance_record = array('check_in' => FALSE, 'check_out' => TRUE, 'absent' => FALSE);
							}
							elseif ($attendance->absent)
							{
								$attendance_record = array('check_in' => FALSE, 'check_out' => FALSE, 'absent' => FALSE);
							}
						}
						$user_data = array('id' => $result->id, 'fullName' => $result->fullName, 'role' => $result->role, 'attendance_record' => $attendance_record);
						$this->session->set_userdata($user_data);
						redirect('dashboard');
					}
					else
					{
						$this->session->set_flashdata('error', 'User is in-active...');
						redirect('login');

					}
				}
				else
				{
					$this->session->set_flashdata('error', 'User authentication failure...');
					redirect('login');
					
				}
			}
			else
			{
				$this->session->set_flashdata('error', 'Enter Id or Password...');
				redirect('login');
			}
		}
		$this->view->set($data);
		$this->view->load('content', 'home');
		$this->view->render();
	}
	function editProfile($id = NULL)
	{
		if (!$id)
			redirect ('employees/listEmployees');
		$data = array();
		if ($_POST)
		{
			$fullName = $this->input->post('fullName');
			$email = $this->input->post('email');
			$role = $this->input->post('role');

			if($fullName!='' && $email!='' && $role!='')
			{
				$this->load->model('User');

				
				$data = array(
					'fullName' => $fullName,
					'email' => $email,
					'role' => $role,
					'status' => 1
				);

				$result = $this->User->edit($data,$id);

				if($result)
				{	
					$this->session->set_flashdata('success', 'You have updated data');
					redirect('employees/edit/' . $id);
					
				}
				else
				{	
					$this->session->set_flashdata('error', 'User in saving data...');
				}
			}
			else
			{	
				$this->session->set_flashdata('error', 'Some fields are missing...');
			}
		}
		$this->view->set($data);
		$this->view->load('content', 'register');
		$this->view->render();
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect();
	}
}
