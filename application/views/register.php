<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>	

<?php echo form_open("welcome/register"); ?>
				
					<input type="text" class="form-control" name="fullname" placeholder="Full Name">
					<input type="text" class="form-control" name="email" placeholder="Email">
					<input type="text" class="form-control" name="password" placeholder="Password">
					<input type="text" class="form-control" name="role" placeholder="Role">
				<button type="submit" class="btn btn-submit">Contact</button>
			</form>
        