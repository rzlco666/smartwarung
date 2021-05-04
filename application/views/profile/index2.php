   <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="#">Home</a></li>
                        <li class="page-breadcrumb__nav active">Profile <?php echo $user['name']; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->

    <!-- ::::::  Start  Main Container Section  ::::::  -->
    <main id="main-container" class="main-container">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <!-- Start Leftside - Sidebar -->
                <div class="col-lg-3">
                    <div class="sidebar">
                        <!-- ::::::  Start banner Section  ::::::  -->
                        <div class="sidebar__widget banner">
                            <div class="row">
                                <div class="col-12">
                                    <div class="banner__box">
                                        <a href="single-1.html" class="banner__link">
                                            <?php if($user['photo'] == null): ?>
                                            <a href="<?php echo base_url('assets/images/no-photo.png') ?>" class="image-popup"><img src="<?php echo base_url('assets/images/no-photo.png') ?>" class="img-fluid" ></a>
                                            <?php else: ?>
                                                <a href="<?php $photos = explode(',',$user['photo']); echo base_url('assets/uploads/').$photos[0] ?>" class="image-popup mb-3"><img style="width:100%;margin-bottom:10px" src="<?php $photos = explode(',',$user['photo']); echo base_url('assets/uploads/').$photos[0] ?>" class="img-fluid" ></a>
                                                <?php if($this->session->userdata('username')==$user['username']): ?>
                                                <a class="btn btn-sm btn-primary py-2 px-5 text-white btn--block" data-toggle="modal" data-target="#modal-photo">Ganti Foto</a>
                                                <?php endif ?>
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- ::::::  End banner Section  ::::::  -->
                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar__widget gray-bg">
                            <div class="sidebar__box">
                                <h5 class="sidebar__title"><?php echo $user['name'] ?></h5>
                            </div>
                            <ul class="sidebar__menu-collapse">
                                 <!-- Start Single Menu Collapse List -->
                                <li class="sidebar__menu-collapse-list">
                                    <div class="accordion">
                                        <a href="#" class="accordion__title" data-toggle="collapse" data-target="#kids-fashion">Phone    : <?php echo $user['phone'] ?> </a>
                                    </div>
                                </li>  <!-- End Single Menu Collapse List -->
                                <!-- Start Single Menu Collapse List -->
                                <li class="sidebar__menu-collapse-list">
                                    <div class="accordion">
                                        <a href="#" class="accordion__title" data-toggle="collapse" data-target="#kids-fashion">E-mail   : <?php echo $user['email'] ?> </a>
                                    </div>
                                </li>  <!-- End Single Menu Collapse List -->
                                
                                 <?php if($this->session->userdata('username')==$user['username']): ?>
                                    <?php if($this->session->userdata('role') == 1): ?>
                                        <p id="status" class="btn btn--box btn--small btn-sm py-2 px-5 btn--block text-white"></p>
                                    <?php endif; ?>
                                    <!-- Start Single Menu Collapse List -->
                                    <li class="sidebar__menu-collapse-list">
                                        <div class="sidebar__box">
                                            <a href="<?php echo site_url('profile/edit/').$user['username'] ?>" class="btn btn--box btn-warning btn--small btn-sm py-2 px-5 btn--block text-white">Ubah profile</a>
                                        </div>
                                    </li>  <!-- End Single Menu Collapse List -->
                                    <p></p>
                                    <li class="sidebar__menu-collapse-list">
                                        <div class="sidebar__box">
                                            <a data-toggle="modal" data-target="#modal-password" class="btn btn--box btn-secondary btn-sm py-2 px-5 text-white btn--small btn--block">Ganti password</a>
                                        </div>
                                    </li>  <!-- End Single Menu Collapse List -->

                                <?php endif; ?>
                            </ul>
                        </div>  <!-- End Single Sidebar Widget -->
                    </div>
                </div>  <!-- End Left Sidebar -->

                 <!-- Start Rightside - Content -->
                <div class="col-lg-9">
                    <!-- ::::::  Start banner Section  ::::::  -->
                    <div class="banner">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="sidebar__title">Alamat Warung</h5>
                            </div>
                        </div>
                    </div> <!-- ::::::  End banner Section  ::::::  -->

                    <div class="product-tab-area">
                        <div class="tab-content ">
                            <?php if($user['role']==1): ?>
                                <div class="container-fluid">
                                    <div id="map" class="mb-3" style="width: 100%;height:400px;"></div>
                                    <span class="" style="font-weight: bold">Alamat: </span><span id="address"></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>  <!-- Start Rightside - Content -->
                
            </div>
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->

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