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
                <form action="<?php echo site_url('auth/store_warung') ?>" class="billing-form" method="post" enctype='multipart/form-data'> 
                <h3 class="mb-4 billing-heading">Register</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-12">
						<div class="form-group">
							<label for="firstname">Nama Warung</label>
						<input type="text" class="form-control" name="name" placeholder="">
						</div>
					</div>
					<div class="w-100"></div>
					<div class="col-md-6 pb-3">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username" placeholder="Username">
					</div>
					<div class="col-md-6 pb-3">
						<label for="username">Password</label>
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
					<!-- ini nanti lokasi -->
					<div class="w-100"></div>
					<div class="col-md-12 pb-3">
						<div id="map" style="width: 100%; height: 400px;"></div>
						<!-- <div id="type-selector" class="pac-controls">
							<input type="radio" name="type" id="changetype-all" checked="checked">
							<label for="changetype-all">All</label>

							<input type="radio" name="type" id="changetype-establishment">
							<label for="changetype-establishment">Establishments</label>

							<input type="radio" name="type" id="changetype-address">
							<label for="changetype-address">Addresses</label>

							<input type="radio" name="type" id="changetype-geocode">
							<label for="changetype-geocode">Geocodes</label>
							</div>
							<div id="strict-bounds-selector" class="pac-controls">
							<input type="checkbox" id="use-strict-bounds" value="">
							<label for="use-strict-bounds">Strict Bounds</label>
							</div>
						</div> -->
						<div id="pac-container col-md-12">
							<div class="form-group pt-3">
								<label for="Address">Alamat</label>
								<input id="pac-input" class="form-control" type="text" name="address" placeholder="Enter a location">
								<input type="text" id="place" name="place_id" hidden>
								<input type="text" id="lat" name="lat" hidden>
								<input type="text" id="lng" name="lng" hidden>
							</div>
						</div>
					</div>
					<div class="w-100"></div>
					<div class="col-md-6">
					<div class="form-group">
						<label for="phone">Phone</label>
						<input type="text" class="form-control" name="phone" placeholder="">
					</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="emailaddress">Email Address</label>
						<input type="email" name="email" class="form-control" placeholder="">
						</div>
					</div>
					<div class="w-100"></div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="photo">Add photo</label>
							<input type="file" name="files[]" multiple class="form-control my-2" style="padding-top: 15px;" required>
							<!-- <input type="file" name="photo[]" class="form-control my-2" style="padding-top: 15px;">
							<input type="file" name="photo[]" class="form-control my-2" style="padding-top: 15px;"> -->
						</div>
					</div>
					<div class="w-100"></div>
					<div class="offset-md-4 col-md-2 mt-4">
						<div class="form-group">
							<input type="submit" class="btn btn-primary px-5 text-center d-block" value="Register">
						</div>
					</div>
	            </div>
	          </form><!-- END -->
            </div>
        </div>
    </div>
</section> <!-- .section -->



