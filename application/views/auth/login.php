   <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="#">Home</a></li>
                        <li class="page-breadcrumb__nav active">Login</li>
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
                <!-- login area start -->
                <div class="login-register-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                                <div class="login-register-wrapper">
                                    <div class="login-register-tab-list nav">
                                        <a class="active" data-toggle="tab">
                                            <h4>login</h4>
                                        </a>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane active">
                                            <div class="login-form-container">
                                                <div class="login-register-form">
                                                    <?php if ($this->session->flashdata('errors') != '') : ?>
                                                        <div class="alert alert-danger text-center" role="alert">
                                                            <?php echo $this->session->flashdata('errors'); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if ($this->session->flashdata('success') != '') : ?>
                                                        <div class="alert alert-success text-center" role="alert">
                                                            <?php echo $this->session->flashdata('success') ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <form action="<?php echo site_url('auth/verif') ?>" method="post">
                                                        <div class="form-box__single-group">
                                                            <label>Username</label>
                                                            <input type="text" id="form-username" name="username" placeholder="Username">
                                                        </div>
                                                        <div class="form-box__single-group">
                                                            <label>Password</label>
                                                            <input type="password" id="form-username-password" name="password" placeholder="Enter password">
                                                        </div>
                                                        <div class="d-flex justify-content-between flex-wrap m-tb-20">
                                                            <a href=""></a>
                                                            <a class="link--gray" href="">Forgot Password?</a>
                                                        </div>
                                                        <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight" type="submit">LOGIN</button>
                                                    </form>
                                                    <div class="d-flex justify-content-center m-tb-20">
                                                        <a href="<?php echo base_url('auth/register') ?>">Daftar</a> <p>&nbsp;atau&nbsp;</p> <a href="<?php echo base_url('auth/register_warung') ?>">Daftar sebagai warung</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- login area end -->
               </div>
            </div>
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->