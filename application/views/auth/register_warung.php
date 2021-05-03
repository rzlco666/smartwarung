   <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="#">Home</a></li>
                        <li class="page-breadcrumb__nav active">Daftar Warung</li>
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
                                            <h4>Daftar Warung</h4>
                                        </a>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane active">
                                            <div class="login-form-container">
                                                <div class="login-register-form">
                                                    <form action="<?php echo site_url('auth/store_warung') ?>" method="post" enctype='multipart/form-data'>
                                                        <div class="form-box__single-group">
                                                            <label>Nama Warung</label>
                                                            <input type="text" id="form-username" name="name" placeholder="Nama Warung">
                                                        </div>
                                                        <div class="form-box__single-group">
                                                            <label>Username</label>
                                                            <input type="text" id="form-username" name="username" placeholder="Username">
                                                        </div>
                                                        <div class="form-box__single-group">
                                                            <div id="map" style="width: 100%; height: 200px;"></div>
                                                        </div>
                                                        <div class="form-box__single-group">
                                                            <label for="Address">Alamat</label>
                                                            <input id="pac-input" class="form-control" type="text" name="address" placeholder="Masukkan alamat warung">
                                                            <input type="text" id="place" name="place_id" hidden>
                                                            <input type="text" id="lat" name="lat" hidden>
                                                            <input type="text" id="lng" name="lng" hidden>
                                                        </div>
                                                        <div class="form-box__single-group">
                                                            <label>Email</label>
                                                            <input type="email" id="form-username" name="email" placeholder="Email">
                                                        </div>
                                                        <div class="form-box__single-group">
                                                            <label>Password</label>
                                                            <input type="password" id="form-username-password" name="password" placeholder="password">
                                                        </div>
                                                        <div class="form-box__single-group">
                                                            <label>No. Telepon</label>
                                                            <input type="phone" id="form-username" name="phone" placeholder="No. Telepon">
                                                        </div>
                                                        <div class="form-box__single-group">
                                                            <label for="photo">Add photo</label>
                                                            <input type="file" name="files[]" multiple class="form-control" required>
                                                        </div>
                                                        <div class="form-box__single-group">
                                                            <label for="photo">Add KTP</label>
                                                            <input type="file" name="ktp" multiple class="form-control" required>
                                                        </div>
                                                        <div class="d-flex justify-content-between flex-wrap m-tb-20">
                                                            <a href=""></a>
                                                            <a class="link--gray" href="<?php echo base_url('auth/login') ?>">Login disini</a>
                                                        </div>
                                                        <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight" type="submit">DAFTAR WARUNG</button>
                                                    </form>
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