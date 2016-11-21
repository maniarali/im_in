
		<div class="col-md-9">
            <div class="profile-content">
				<?php echo form_open('users/editProfile/'.$employee->id); ?>
						<div class="form-group">
							<input type="text" class="form-control" name="fullName" value="<?php echo $employee->fullName; ?>">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="email" value="<?php echo $employee->email; ?>">
						</div>
						<div class="form-group">
							<select class="form-control" name="role">
								<option value="employee">Employee</option>
								<option value="manager">Manager</option>
							</select>
						</div>
					<button type="submit" class="btn btn-submit">Submit</button>
				</form>
				<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success padding">
						<strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
					</div>
				<?php endif; ?>
				<?php if ($this->session->flashdata('error')) : ?>
					<div class="alert alert-danger padding">
						<strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
					</div>
				<?php endif; ?>
            </div>
		</div>
	</div>
</div>


			
        