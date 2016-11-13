

<div class="loginDiv">
	<div class="headln"><p>Welcome! Login?</p></div>
	<?php echo form_open("welcome/authentication"); ?>
		<div class="form-inline">
			<div class="form-group">
				<input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" id="email" placeholder="Username">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>" id="paas" placeholder="Password">
			</div>
		</div>
		<div class="logbtn">
			<button type="submit" value="submit" class="btn btn-submit" >Login</button>
		</div>
	
	</form>

	<h4>Hurry up! each moment is important. <a href="dashboard.html" style="color:#03a9f4">Join us :) </a></h4>
</div>