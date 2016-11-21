
		<div class="col-md-9">
            <div class="profile-content">
				<?php echo form_open(); ?>
					<div class="form-group">	
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
					<div class="form-group">	
						<input type="password" class="form-control" name="c_password" placeholder="Confirm Password">
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


			
        