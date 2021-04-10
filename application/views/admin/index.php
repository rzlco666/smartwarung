
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<?php include APPPATH . 'views/admin/style_card.php';?>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category">
                    <?php include APPPATH . 'views/admin/menu.php';?>
                </ul>
            </div>
        </div>
        <div class="row">
            <!-- content -->
            <div class="container">
                <?php if ($this->session->flashdata('errors') != ''): ?>
                <div class="alert alert-danger text-center" role="alert">
                <?php echo $this->session->flashdata('errors'); ?>
                </div>
                <?php endif;?>
                <?php if ($this->session->flashdata('success') != ''): ?>
                <div class="alert alert-success text-center" role="alert">
                <?php echo $this->session->flashdata('success') ?>
                </div>
                <?php endif;?>
                <div class="row m-2">
                <div class="col-md-3">
                    <div class="card-counter primary">
                        <i class="fa fa-code-fork"></i>
                        <span class="count-numbers"><?=$total_warung?></span>
                        <span class="count-name">Warung</span>
                    </div>
                </div>

                <div class="col-md-3">
                <div class="card-counter danger">
                    <i class="fa fa-ticket"></i>
                    <span class="count-numbers"><?=$total_transaction?></span>
                    <span class="count-name">Invoices</span>
                </div>
                </div>

                <div class="col-md-3">
                <div class="card-counter success">
                    <i class="fa fa-database"></i>
                    <span class="count-numbers"><?=$total_item?></span>
                    <span class="count-name">Item</span>
                </div>
                </div>

                <div class="col-md-3">
                <div class="card-counter info">
                    <i class="fa fa-users"></i>
                    <span class="count-numbers"><?=$total_user?></span>
                    <span class="count-name">Pembeli</span>
                </div>
                </div>
                </div>
                <div class="row m-2">
                    <div class="col-lg-6 col-sm-12">
                        <div class="card">
                            <div class="card-header">Pembeli Tersering</div>
                            <div class="card-body d-flex flex-column">
                                <?php foreach ($pembeli_tersering as $key) {?>
                                    <div class="p-2 bd-highlight row">
                                        <div class="col-sm-9"><?=$key->user?></div>
                                        <div class="col-sm-3"><?=$key->total?></div>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="card">
                            <div class="card-header">Toko Terlaku</div>
                            <div class="card-body">
                                <?php foreach ($warung_terlaku as $key) {?>
                                    <div class="p-2 bd-highlight row">
                                        <div class="col-sm-9"><?=$key->warung?></div>
                                        <div class="col-sm-3"><?=$key->total?></div>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include APPPATH . 'views/admin/chart.php'; ?>
                <!-- <div class="row mb-5">
                    <div class="col-md-12 ftco-animate">
                        <div class="cart-list">
                            <h3 class="text-center">Daftar Warung</h3>
                            <table class="table">
                                <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>Nama Warung</th>
                                    <th>Alamat</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($warungs as $warung): ?>
                                <tr class="text-center">
                                    <td class="image-prod"><div class="img" style="width:100px;background-image:url(<?php $photos = explode(',', $warung['photo']);
echo base_url('assets/uploads/') . $photos[0]?>);"></div></td>

                                    <td class="" style="width: 25%">
                                        <a href="<?php echo site_url('profile/show/') . $warung['username'] ?>" class=""><?php echo $warung['name'] ?></a>
                                        <p><?php ?></p>
                                    </td>

                                    <td class="" style="width: 25%"><p><?php echo $warung['address'] ?></p></td>

                                    <td class="" style="width: 15%"><p><?php echo $warung['phone']; ?></p></td>

                                    <td class="" style="width: 10%"><p class="p-2 text-small <?php echo ($warung['status'] == 'Sudah diverifikasi' ? 'bg-info text-white' : ($warung['status'] == 'Belum diverifikasi' ? 'bg-warning text-dark' : 'bg-danger text-light')) ?>"><?php echo $warung['status']; ?></p></td>

                                    <td class="" style="width: 10%">
                                        <a href="<?php ?>" class="btn btn-sm btn-warning px-3 mb-2"> Edit </a>
                                        <a href="<?php echo site_url('admin/approve/') . $warung['username'] ?>" class="btn btn-sm btn-info px-3 mb-2"> Approve </a>
                                        <a href="<?php echo site_url('admin/unapprove/') . $warung['username'] ?>" class="btn btn-sm btn-dark text-white px-3 mb-2"> Unapprove </a>
                                        <a href="<?php echo site_url('admin/delete/') . $warung['username'] ?>" class="btn btn-sm btn-danger px-3 mb-2" onclick="return confirm('Apkah Anda yakin ingin menghapus?')"> Hapus </a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="row">
                    <div class="col-md-12 ftco-animate">
                        <div class="cart-list">
                            <h3 class="text-center">Daftar User</h3>
                            <table class="table">
                                <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>Nama User</th>>
                                    <th>Phone</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($users as $user): ?>
                                <tr class="text-center">
                                    <td class="image-prod"><div class="img" style="width:100px;background-image:url(<?php $photos = explode(',', $user['photo']);
                    echo base_url('assets/uploads/');if ($user['photo'] != null) {echo $photos[0];} else {echo 'no-photo.png';}
                        ;?>);"></div></td>
                                    <td class="" style="width: 25%">
                                        <a href="<?php echo site_url('profile/show/') . $user['username'] ?>" class=""><?php echo $user['name'] ?></a>
                                        <p><?php ?></p>
                                    </td>
                                    <td class="" style="width: 25%"><p><?php echo $user['phone']; ?></p></td>
                                    <td class="" style="width: 25%">
                                        <a href="<?php echo site_url('profile/edit/') . $user['username'] ?>" class="btn btn-sm btn-warning px-3 mb-2"> Edit </a>
                                        <a href="<?php echo site_url('admin/delete/') . $user['username'] ?>" class="btn btn-sm btn-danger px-3 mb-2" onclick="return confirm('Apkah Anda yakin ingin menghapus?')"> Hapus </a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> -->
            </div>
            <!-- endcontent -->
        </div>
    </div>
</section>
