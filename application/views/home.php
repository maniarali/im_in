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

	<div class="loginDiv">
		<div class="headln"><p>Welcome! Login?</p></div>
		<?php if (isset($error)) : ?>
			<?php echo $error; ?>
		<?php endif; ?>
		<?php echo form_open("users"); ?>
			<div class="form-inline">
				<div class="form-group">
					<input type="email" class="form-control" name="email" value="maniarali@gmail.com<?php //echo set_value('email'); ?>" id="email" placeholder="Username">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" value="123<?php //echo set_value('password'); ?>" id="paas" placeholder="Password">
				</div>
			</div>
			<div class="logbtn">
				<button type="submit" value="submit" class="btn btn-submit" >Login</button>
			</div>
		
		</form>
	</div>

			<div class="footer">
				<h4>HK Consultancy Pakistan Pvt Ltd - The Australian IMMIGRATION Company in Karachi <a href="contactUs.html" class="other-links">Contact Us </a></h4>  
			</div>
		</body>
	</html>