<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
	<div class="container">
	<div class="row no-gutters slider-text align-items-center justify-content-center">
		<div class="col-md-9 ftco-animate text-center">
		<p class="breadcrumbs" style="color: black;"><span class="mr-2" ><a href="<?php echo base_url(); ?>" style="color: black;">Home</a></span> <span style="color: black;">Profile</span></p>
		<h1 class="mb-0 bread" style="color: black;"><?php echo $user['name']; ?></h1>
		</div>
	</div>
	</div>
</div>

    <section class="ftco-section">
    <div class="container">
    <?php if($this->session->flashdata('errors') != ''): ?>
    <div class="alert alert-danger text-center" role="alert">
    <?php echo $this->session->flashdata('errors'); ?>
    </div>
    <?php endif; ?>
    <?php if($this->session->flashdata('success')!= ''): ?>
    <div class="alert alert-success text-center" role="alert">
    <?php echo $this->session->flashdata('success') ?>
    </div>
    <?php endif; ?>
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category">
                    <?php include APPPATH.'views/profile/menu.php'; ?>
                </ul>
            </div>
        </div>
        <div class="row">
            <!-- content -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-2 justify-content-center ftco-animate">
                        <?php if($user['photo'] == null): ?>
                        <a href="<?php echo base_url('assets/images/no-photo.png') ?>" class="image-popup"><img src="<?php echo base_url('assets/images/no-photo.png') ?>" class="img-fluid" ></a>
                        <?php else: ?>
                            <a href="<?php $photos = explode(',',$user['photo']); echo base_url('assets/uploads/').$photos[0] ?>" class="image-popup mb-3"><img style="width:100%;margin-bottom:10px" src="<?php $photos = explode(',',$user['photo']); echo base_url('assets/uploads/').$photos[0] ?>" class="img-fluid" ></a>
                            <?php if($this->session->userdata('username')==$user['username']): ?>
                            <a class="btn btn-sm btn-primary py-2 px-5 text-white" style="margin-left: 20%" data-toggle="modal" data-target="#modal-photo">Ganti foto profile</a>
                            <?php endif ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-8 product-details pl-md-5 ftco-animate">
                        <h3><?php echo $user['name'] ?></h3>
                        <p>Phone    : <?php echo $user['phone'] ?></p>
                        <p>E-mail   : <?php echo $user['email'] ?></p>
                        <?php if($this->session->userdata('username')==$user['username']): ?>
                            <?php if($this->session->userdata('role') == 1): ?>
                                <p id="status" class="col-md-4 text-center"></p>
                            <?php endif; ?>
                            <a class="btn btn-sm btn-warning py-2 px-3 text-dark" href="<?php echo site_url('profile/edit/').$user['username'] ?>">Ubah profile</a>
                            
                            <a class="btn btn-sm btn-secondary py-2 px-3 text-white" data-toggle="modal" data-target="#modal-password">Ganti password</a>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!-- endcontent -->
        </div>
        <div class="row mt-5">
            <?php if($user['role']==1): ?>
                <div class="container-fluid">
                    <div id="map" class="mb-3" style="width: 100%;height:400px;"></div>
                    <span class="" style="font-weight: bold">Alamat: </span><span id="address"></span>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php if($this->session->userdata('username')==$user['username']): ?>
    <!-- Modal -->
    <div class="modal fade" id="modal-photo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Foto Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 ftco-animate">
                            <form method="POST" action="<?php echo site_url('profile/change_photo/').$user['username'] ?>" enctype="multipart/form-data">
                                <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="photo">Upload foto</label>
                                    <input type="file" required class="form-control" name="file" placeholder="Choose a photo">
                                    <?php echo form_error('file', '<small class="text-danger error">', '</small>'); ?>
                                </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn px-3 btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn px-3 btn-primary" value="Ganti Foto">
                </form>
            </div>
            </div>
        </div>
        </div>
    <!-- endmodal -->
<?php endif; ?>
<!-- Modal -->
<div class="modal fade" id="modal-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-sm-12 ftco-animate">
                        <form method="POST" action="<?php echo site_url('profile/change_password/').$user['username'] ?>">
                            <div class="col-sm-12">
                            <div class="form-group">
                                <label for="oldpassword">Password Lama</label>
                                <input type="password" required class="form-control" name="oldpassword" placeholder="Old passsword">
                                <?php echo form_error('oldpassword', '<small class="text-danger error">', '</small>'); ?>
                            </div>
                            </div>
                            <div class="col-sm-12">
                            <div class="form-group">
                                <label for="newpassword">Password Baru</label>
                                <input type="password" required class="form-control" name="newpassword" placeholder="New passsword">
                                <?php echo form_error('newpassword', '<small class="text-danger error">', '</small>'); ?>
                            </div>
                            </div>
                            <div class="col-sm-12">
                            <div class="form-group">
                                <label for="verif-newpassword">Verifikasi Password Baru</label>
                                <input type="password" required class="form-control" name="verif-newpassword" placeholder="New passsword">
                                <?php echo form_error('verif-newpassword', '<small class="text-danger error">', '</small>'); ?>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn px-3 btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn px-3 btn-primary" value="Ganti Password">
            </form>
        </div>
        </div>
    </div>
    </div>
<!-- endmodal -->