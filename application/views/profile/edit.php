    <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="#">Home</a></li>
                        <li class="page-breadcrumb__nav active">Edit Akun</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->

    <!-- ::::::  Start  Main Container Section  ::::::  -->
    <main id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- :::::::::: Start My Account Section :::::::::: -->
                    <div class="my-account-area">
                        <div class="row">
                            <div class="col-xl-3 col-md-4">
                                <div class="my-account-menu">
                                    <ul class="nav account-menu-list flex-column nav-pills" id="pills-tab" role="tablist">
                                        <li>
                                            <a class="active link--icon-left" id="pills-dashboard-tab" data-toggle="pill" href="#pills-dashboard"
                                                role="tab" aria-controls="pills-dashboard" aria-selected="true"><i
                                                    class="fas fa-user"></i> Ubah Detail Akun</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-8 col-md-8">
                                <div class="tab-content my-account-tab" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-dashboard" role="tabpanel"
                                        aria-labelledby="pills-dashboard-tab">
                                        <div class="my-account-details account-wrapper">
                                            <h4 class="account-title">Detail Akun</h4>

                                            <div class="account-details">
                                                <form action="<?php echo site_url('profile/update/').$user['username'] ?>" method="post">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-box__single-group">
                                                            <label>Nama Lengkap</label>
                                                            <input value="<?php echo $user['name'] ?>" type="text" class="form-control" name="name" placeholder="">
                                                            <?php echo form_error('name', '<small class="text-danger error">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-box__single-group">
                                                            <label>Username</label>
                                                            <input value="<?php echo $user['username'] ?>" type="text" class="form-control" name="username" placeholder="Username">
                                                            <?php echo form_error('username', '<small class="text-danger error">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-box__single-group">
                                                            <label>Email</label>
                                                            <input value="<?php echo $user['email'] ?>" type="email" name="email" class="form-control" placeholder="">
                                                            <?php echo form_error('email', '<small class="text-danger error">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-box__single-group">
                                                            <label>No. HP</label>
                                                            <input value="<?php echo $user['phone'] ?>" type="text" class="form-control" name="phone" placeholder="">
                                                            <?php echo form_error('phone', '<small class="text-danger error">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-box__single-group">
                                                            <input type="submit" class="btn btn--box btn--small btn--uppercase btn--blue" value="Perbarui">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- :::::::::: End My Account Section :::::::::: -->
                </div>
            </div>
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->

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