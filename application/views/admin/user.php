<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category">
                    <?php include APPPATH.'views/admin/menu.php'; ?>
                </ul>
            </div>
        </div>
        <div class="row">
            <!-- content -->
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
                <div class="row">
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
                                <?php foreach($users as $user): ?>
                                <tr class="text-center">
                                    <td class="image-prod"><div class="img" style="width:100px;background-image:url(<?php $photos = explode(',',$user['photo']); echo base_url('assets/uploads/'); if($user['photo'] != null){echo $photos[0];}else{echo 'no-photo.png';};?>);"></div></td>
                                    <td class="" style="width: 25%">
                                        <a href="<?php echo site_url('profile/show/').$user['username'] ?>" class=""><?php echo $user['name'] ?></a>
                                        <p><?php ?></p>
                                    </td>
                                    <td class="" style="width: 25%"><p><?php echo $user['phone']; ?></p></td>
                                    <td class="" style="width: 25%">
                                        <a href="<?php echo site_url('profile/edit/').$user['username'] ?>" class="btn btn-sm btn-warning px-3 mb-2"> Edit </a>
                                        <a href="<?php echo site_url('admin/delete/').$user['username'] ?>" class="btn btn-sm btn-danger px-3 mb-2" onclick="return confirm('Apkah Anda yakin ingin menghapus?')"> Hapus </a>
                                    </td>
                                </tr><!-- END TR-->
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- endcontent -->
        </div>
    </div>
</section>