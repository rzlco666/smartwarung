   <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="#">Home</a></li>
                        <li class="page-breadcrumb__nav active">Edit Bank</li>
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
                                            <h4>Edit Bank</h4>
                                        </a>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane active">
                                            <div class="login-form-container">
                                                <div class="login-register-form">
                                                    <form action="<?php echo site_url('warung/update_bank/'). $bank[0]['id_bank_account'] ?>" enctype='multipart/form-data' method="post">
                                                        <div class="form-box__single-group">
                                                            <label>Nama Bank</label>
                                                            <select class="form-control" name="name" placeholder="Nama Bank">
                                                                <option></option>
                                                                <option value="BCA">BCA</option>
                                                                <option value="BRI">BRI</option>
                                                                <option value="BNI">BNI</option>
                                                                <option value="MANDIRI">MANDIRI</option>
                                                                <option value="BTPN">BTPN</option>
                                                                <option value="BPD JABAR">BPD JABAR</option>
                                                            </select>
                                                            <?php echo form_error('name', '<small class="text-danger error">', '</small>'); ?>
                                                        </div>
                                                        <div class="form-box__single-group">
                                                            <label>Nama Rekening</label>
                                                            <input type="text" value="<?= $bank[0]['account_name'] ?>" class="form-control" name="nama_rek" placeholder="Nama Rekening">
                                                            <?php echo form_error('nama_rek', '<small class="text-danger error">', '</small>'); ?>
                                                        </div>
                                                        <div class="form-box__single-group">
                                                            <label>Nomor Rekening</label>
                                                            <input type="text" value="<?= $bank[0]['account_number'] ?>" class="form-control" name="nomor" placeholder="Nomor Rekening">
                                                            <?php echo form_error('nomor', '<small class="text-danger error">', '</small>'); ?>
                                                        </div>
                                                        <div class="d-flex justify-content-between flex-wrap m-tb-20">
                                                            <a href=""></a>
                                                            <a href=""></a>
                                                        </div>
                                                        <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight" type="submit">PERBARUI</button>
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