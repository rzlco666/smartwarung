<section class="ftco-section">
    <div class="container">
		<?php if($this->session->flashdata('errors') != ''): ?>
		<div class="alert alert-danger" role="alert">
		<?php echo $this->session->flashdata('errors'); ?>
		</div>
		<?php endif; ?>
		<?php if($this->session->flashdata('success')!= ''): ?>
		<div class="alert alert-success" role="alert">
		<?php echo $this->session->flashdata('success') ?>
		</div>
		<?php endif; ?>		
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
                <form action="<?php echo site_url('profile/update/').$user['username'] ?>" class="billing-form" method="post">
                <h3 class="mb-4 billing-heading">Register</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Full Name</label>
						<input value="<?php echo $user['name'] ?>" type="text" class="form-control" name="name" placeholder="">
						<?php echo form_error('name', '<small class="text-danger error">', '</small>'); ?>
	                </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input value="<?php echo $user['username'] ?>" type="text" class="form-control" name="username" placeholder="Username">
                        <?php echo form_error('username', '<small class="text-danger error">', '</small>'); ?>
                    </div>
                </div>
                <div class="w-100"></div>
				<div class="col-md-6">
				<div class="form-group">
					<label for="phone">Phone</label>
					<input value="<?php echo $user['phone'] ?>" type="text" class="form-control" name="phone" placeholder="">
					<?php echo form_error('phone', '<small class="text-danger error">', '</small>'); ?>
				</div>
				</div>
				<div class="col-md-6">
				<div class="form-group">
					<label for="emailaddress">Email Address</label>
					<input value="<?php echo $user['email'] ?>" type="email" name="email" class="form-control" placeholder="">
					<?php echo form_error('email', '<small class="text-danger error">', '</small>'); ?>
				</div>
                </div>
                <div class="w-100"></div>
                <div class="offset-md-4 col-md-2 mt-4">
                	<div class="form-group">
                        <input type="submit" class="btn btn-primary px-5 text-center d-block" value="Update">
                    </div>
                </div>
	            </div>
	          </form><!-- END -->
            </div>
        </div>
    </div>
</section> <!-- .section -->