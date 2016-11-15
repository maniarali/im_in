<?php
	echo 'Welcome ' . $this->session->userdata('fullName');
?>
<div >
	<?php if ($attendance_record['check_in']) : ?>
	<?php echo form_open("employees/checkIn"); ?>
		<button type="submit" value="submit" class="btn btn-submit checkIn" >Check In</button>
	</form>
	<?php endif; ?>

	<?php if ($attendance_record['check_out']) : ?>
	<?php echo form_open("employees/checkOut"); ?>
		<button type="submit" value="submit" class="btn btn-submit checkIn" >Check Out</button>
	</form>
	<?php endif; ?>

	<?php if ($attendance_record['absent']) : ?>
	<?php echo form_open("employees/absent"); ?>
		<button type="submit" value="submit" class="btn btn-submit checkIn" >Absent</button>
	</form>
	<?php endif; ?>

	<?php if ($this->session->userdata('role') == 'admin') : ?>
	<?php echo form_open("employees/register"); ?>
		<button type="submit" value="submit" class="btn btn-submit checkIn" >Register</button>
	</form>
	<?php endif; ?>

	<?php echo form_open("logout"); ?>
		<button type="submit" value="submit" class="btn btn-submit checkIn" >Logout</button>
	</form>
	
	
</div>