			<?php echo form_open(); ?>
				
					<input type="text" class="form-control" name="fullName" placeholder="Full Name">
					<input type="text" class="form-control" name="email" placeholder="Email">
					<input type="password" class="form-control" name="password" placeholder="Password">
					<select class="form-control" name="role">
						<option value="employee">Employee</option>
						<option value="manager">Manager</option>
					</select>
				<button type="submit" class="btn btn-submit">Submit</button>
			</form>
        