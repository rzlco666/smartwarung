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
                <div class="row mb-5">
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
                                <?php foreach($warungs as $warung): ?>
                                <tr class="text-center">
                                    <td class="image-prod"><div class="img" style="width:100px;background-image:url(<?php $photos = explode(',',$warung['photo']); echo base_url('assets/uploads/').$photos[0]?>);"></div></td>
                                    
                                    <td class="" style="width: 25%">
                                        <a href="<?php echo site_url('profile/show/').$warung['username'] ?>" class=""><?php echo $warung['name'] ?></a>
                                        <p><?php ?></p>
                                    </td>
                                    
                                    <td class="" style="width: 25%"><p><?php echo $warung['address']?></p></td>
                                    
                                    <td class="" style="width: 15%"><p><?php echo $warung['phone']; ?></p></td>

                                    <td class="" style="width: 10%"><p class="p-2 text-small <?php echo ($warung['status'] == 'Sudah diverifikasi'? 'bg-info text-white':($warung['status']=='Belum diverifikasi'?'bg-warning text-dark':'bg-danger text-light')) ?>"><?php echo $warung['status']; ?></p></td>
                                    
                                    <td class="" style="width: 10%">
                                        <a href="<?php  ?>" class="btn btn-sm btn-warning px-3 mb-2"> Edit </a>
                                        <a href="<?php echo site_url('admin/approve/').$warung['username'] ?>" class="btn btn-sm btn-info px-3 mb-2"> Approve </a>
                                        <a href="<?php echo site_url('admin/unapprove/').$warung['username'] ?>" class="btn btn-sm btn-dark text-white px-3 mb-2"> Unapprove </a>
                                        <a href="<?php echo site_url('admin/delete/').$warung['username'] ?>" class="btn btn-sm btn-danger px-3 mb-2" onclick="return confirm('Apkah Anda yakin ingin menghapus?')"> Hapus </a>
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