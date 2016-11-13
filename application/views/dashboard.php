<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>	
<div >
	<?php echo form_open("dashboard/checkIn"); ?>
		<button type="submit" value="submit" class="btn btn-submit checkIn" >Check In</button>
	</form>
	<?php echo form_open("dashboard/checkOut"); ?>
		<button type="submit" value="submit" class="btn btn-submit checkIn" >Check Out</button>
	</form>
	<?php echo form_open("dashboard/absent"); ?>
		<button type="submit" value="submit" class="btn btn-submit checkIn" >Absent</button>
	</form>
	<?php echo form_open("dashboard/register"); ?>
		<button type="submit" value="submit" class="btn btn-submit checkIn" >Register</button>
	</form>
	
	
</div>