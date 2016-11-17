
		<div class="col-md-9">
            <div class="profile-content">
				<?php echo form_open('users/editProfile/'.$employee->id); ?>
					
						<input type="text" class="form-control" name="fullName" value="<?php echo $employee->fullName; ?>">
						<input type="text" class="form-control" name="email" value="<?php echo $employee->email; ?>">
						<select class="form-control" name="role">
							<option value="employee">Employee</option>
							<option value="manager">Manager</option>
						</select>
					<button type="submit" class="btn btn-submit">Submit</button>
				</form>
				<div class="alert alert-success">
  					<strong>Success!</strong> User have successfully register.
				</div>
				<div class="alert alert-danger">
  					<strong>Success!</strong> Not able to register user
				</div>
            </div>
		</div>
	</div>
</div>


			
        