    <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="#">Home</a></li>
                        <li class="page-breadcrumb__nav active">Akun</li>
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
                                                    class="fas fa-tachometer-alt"></i> Dashboard</a>
                                        </li>
                                        <li>
                                            <a id="pills-order-tab" class="link--icon-left" data-toggle="pill" href="#pills-order" role="tab"
                                                aria-controls="pills-order" aria-selected="false"><i
                                                    class="fas fa-shopping-cart"></i> Pesanan</a>
                                        </li>
                                        <li>
                                            <a id="pills-account-tab" class="link--icon-left" data-toggle="pill" href="#pills-account" role="tab"
                                                aria-controls="pills-account" aria-selected="false"><i class="fas fa-user"></i>
                                                Detail Akun</a>
                                        </li>
                                        <li>
                                            <a class="link--icon-left" href="<?php echo site_url('auth/logout') ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-8 col-md-8">
                                <div class="tab-content my-account-tab" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-dashboard" role="tabpanel"
                                        aria-labelledby="pills-dashboard-tab">
                                        <div class="my-account-dashboard account-wrapper">
                                            <h4 class="account-title">Dashboard</h4>
                                            <div class="welcome-dashboard m-t-30">
                                                <p>Hello, <strong><?php echo $user['name'] ?></strong> (Jika bukan <strong><?php echo $user['name'] ?> !</strong> <a
                                                        href="<?php echo site_url('auth/logout') ?>">Logout</a> )</p>
                                            </div>
                                            <p class="m-t-25">Dari dashboard akun, anda dapat dengan mudah memeriksa pesanan terakhir, mengatur akun dan mengubah password.</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-order" role="tabpanel" aria-labelledby="pills-order-tab">
                                        <div class="my-account-order account-wrapper">
                                            <h4 class="account-title">Pesanan</h4>
                                            <div class="account-table text-center m-t-30 table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="no">No</th>
                                                            <th class="name">Tanggal</th>
                                                            <th class="date">Total</th>
                                                            <th class="status">Warung</th>
                                                            <th class="total">Status</th>
                                                            <th class="action">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1;
                                                        foreach ($invoices as $invoice) : ?>
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td><?= date("d M Y H:i",strtotime($invoice['date'])); ?></td>
                                                            <td>
                                                                <span class="amount">
                                                                <?php $ttl = $invoice['total']; 
                                                                    if($ttl == 0){
                                                                        echo "Rp " . number_format($invoice['billing'], 0, ".", ".");
                                                                    }else{
                                                                        echo "Rp " . number_format($invoice['total'], 0, ".", ".");
                                                                    }
                                                                ?>
                                                                </span>
                                                            </td>
                                                            <td><?php echo $invoice['warung_name'] ?></td>
                                                            <td>
                                                                <?php if ($this->session->role == 0) { ?>
                                                                    <?php if ($invoice['invoice_status'] == "Menunggu proses penjual") : ?>
                                                                        <span class="text-warning"><?php echo $invoice['invoice_status'] ?></span>
                                                                    <?php elseif ($invoice['invoice_status'] == "Menunggu verif pembayaran") : ?>
                                                                        <span class="text-warning"><?php echo $invoice['invoice_status'] ?></span>
                                                                    <?php elseif ($invoice['invoice_status'] == "Sedang dikirim") : ?>
                                                                        <span class="text-info"><?php echo $invoice['invoice_status'] ?></span>
                                                                    <?php elseif ($invoice['invoice_status'] == "Sudah diterima") : ?>
                                                                        <span class="text-success"><?php echo $invoice['invoice_status'] ?></span>
                                                                    <?php elseif ($invoice['invoice_status'] == "Dibatalkan") : ?>
                                                                        <span class="text-danger"><?php echo $invoice['invoice_status'] ?></span>
                                                                    <?php endif; ?>
                                                                <?php } elseif ($this->session->role == 1) { ?>
                                                                    <?php if ($invoice['invoice_status'] == "Menunggu proses penjual") : ?>
                                                                        <span class="text-warning"><?php echo $invoice['invoice_status'] ?></span>
                                                                    <?php elseif ($invoice['invoice_status'] == "Menunggu verif pembayaran") : ?>
                                                                        <span class="text-warning"><?php echo $invoice['invoice_status'] ?></span>
                                                                    <?php elseif ($invoice['invoice_status'] == "Sedang dikirim") : ?>
                                                                        <span class="text-info"><?php echo $invoice['invoice_status'] ?></span>
                                                                    <?php elseif ($invoice['invoice_status'] == "Sudah diterima") : ?>
                                                                        <span class="text-success"><?php echo $invoice['invoice_status'] ?></span>
                                                                    <?php elseif ($invoice['invoice_status'] == "Dibatalkan") : ?>
                                                                        <span class="text-danger"><?php echo $invoice['invoice_status'] ?></span>
                                                                    <?php endif; ?>
                                                                <?php } ?>  
                                                            </td>
                                                            <td><a href="<?= base_url('profile/order') ?>">Lihat</a></td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-account" role="tabpanel"
                                        aria-labelledby="pills-account-tab">
                                        <div class="my-account-details account-wrapper">
                                            <h4 class="account-title">Detail Akun</h4>

                                            <div class="account-details">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-box__single-group">
                                                            <?php if($user['photo'] == null): ?>
                                                            <img height="50%" width="50%" src="<?php echo base_url('assets/images/no-photo.png') ?>" class="img-fluid" >
                                                            <?php else: ?>
                                                                <img height="50%" width="50%" src="<?php $photos = explode(',',$user['photo']); echo base_url('assets/uploads/').$photos[0] ?>" class="img-fluid" >
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-box__single-group">
                                                            <label>Nama Lengkap</label>
                                                            <input type="text" value="<?php echo $user['name'] ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-box__single-group">
                                                            <label>Username</label>
                                                            <input type="text" value="<?php echo $user['username'] ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-box__single-group">
                                                            <label>Email</label>
                                                            <input type="text" value="<?php echo $user['email'] ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-box__single-group">
                                                            <label>No. HP</label>
                                                            <input type="text" value="<?php echo $user['phone'] ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-box__single-group">
                                                            <a class="btn btn--box btn--small btn--uppercase btn--blue" href="<?php echo site_url('profile/edit/').$user['username'] ?>">Ubah Detail Akun</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-box__single-group">
                                                            <h5 class="title">Password</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-box__single-group">
                                                            <label>Password (Enkripsi)</label>
                                                            <input type="password" value="<?php echo $user['password'] ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-box__single-group">
                                                            <button class="btn btn--box btn--small btn--uppercase btn--blue" data-toggle="modal" data-target="#modal-password">Ubah Password</button>
                                                        </div>
                                                    </div>
                                                </div>
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