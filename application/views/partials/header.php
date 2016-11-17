<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>I'm In </title>
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

</head>

	<body class="home-body">

    <div class="header">
    	<h2>HK Consultancy Pakistan</h2>				
    </div>
	
<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="<?php echo base_url(); ?>assets/img/man-logo.png" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php echo  $this->session->userdata('fullName'); ?>
					</div>
					<div class="profile-usertitle-job">
						<?php echo  $this->session->userdata('role'); ?>
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<?php if ($attendance_record['check_in']) : ?>
						<a href="<?php echo site_url('employees/checkIn'); ?>" class="btn btn-success btn-sm">Check In</a>
					<?php endif; ?>
					
					<?php if ($attendance_record['check_out']) : ?>
						<a href="<?php echo site_url('employees/checkOut'); ?>" class="btn btn-danger btn-sm">Check Out</a>
					<?php endif; ?>
					
					<?php if ($attendance_record['absent']) : ?>
						<a href="<?php echo site_url('employees/absent'); ?>" class="btn btn-danger btn-sm">Absent</a>
					<?php endif; ?>
				</div>

				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<?php if ($this->session->userdata('role') == 'admin' || $this->session->userdata('role') == 'manager') : ?>
							<li>
								<a href="<?php echo site_url('employees/listEmployees'); ?>">
								<i class="glyphicon glyphicon-ok"></i>
								Employees </a>
							</li>
							<?php endif; ?>
						<?php if ($this->session->userdata('role') == 'admin' || $this->session->userdata('role') == 'manager') : ?>
							<li>
								<a href="<?php echo site_url('employees/register'); ?>">
								<i class="glyphicon glyphicon-ok"></i>
								Register </a>
							</li>
							<?php endif; ?>
						<li>
							<a href="<?php echo site_url('logout'); ?>">
							<i class="glyphicon glyphicon-flag"></i>
							Logout </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>