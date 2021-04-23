<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category">
                    <?php include APPPATH . 'views/admin/menu.php'; ?>
                </ul>
            </div>
        </div>
        <div class="row">
            <!-- content -->
            <div class="container">
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
                <div class="row">
                    <div class="col-md-12 ftco-animate">
                        <div class="cart-list">
                            <h3 class="text-center">Daftar Pembeli</h3>
                            <table class="table myTablesss">
                                <thead class="thead-primary">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>&nbsp;</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($users as $user) : ?>
                                        <tr class="text-center">
                                            <td><?= $no ?></td>
                                            <!-- <td><?= $user["username"] ?></td> -->
                                            <td class="image-prod">
                                                <div class="img" style="width:100px;background-image:url(<?php $photos = explode(',', $user['photo']);
                                                                                                            echo base_url('assets/uploads/');
                                                                                                            if ($user['photo'] != null) {
                                                                                                                echo $photos[0];
                                                                                                            } else {
                                                                                                                echo 'no-photo.png';
                                                                                                            }; ?>);"></div>
                                            </td>
                                            <td><?= $user['username'] ?></td>
                                            <td class="">
                                                <a href="<?php echo site_url('profile/show/') . $user['username'] ?>" class=""><?php echo $user['name'] ?></a>
                                                <p><?php ?></p>
                                            </td>
                                            <td class="">
                                                <p><?php echo $user['phone']; ?></p>
                                            </td>
                                            <td>
                                                <p class="p-2 text-small <?php echo ($user['is_aktif_cust'] == 1 ? 'bg-info text-white' : ($user['is_aktif_cust'] == 0 ? 'bg-warning text-dark' : 'bg-danger text-light')) ?>">
                                                <?php 
                                                    if($user['is_aktif_cust'] == 1){
                                                        echo "Aktif";
                                                    }else {
                                                        echo "Nonaktif";
                                                    }
                                                ?>
                                            </td>
                                            <td class="">
                                            <?php if ($user['is_aktif_cust'] == 0) { ?>
                                                    <a href="<?php echo site_url('admin/aktifasi_cust/') . $user['username'] ?>/1" class="btn btn-sm btn-info px-3 mb-2" onclick="return confirm('Apkah Anda yakin ingin mengaktifkan warung?')"> Aktifkan </a>
                                                <?php } else { ?>
                                                    <!-- <a href="<?php echo site_url('admin/aktifasi_cust/') . $user['username'] ?>/0" class="btn btn-sm btn-danger px-3 mb-2" onclick="return confirm('Apkah Anda yakin ingin menonaktifkan warung?')"> Nonaktifkan </a> -->
                                                    <button class="btn btn-sm btn-danger px-3 mb-2" id="btn_nonaktif" data-id="<?= $user['username'] ?>" data-toggle="modal"> Nonaktifkan </button>
                                                <?php } ?>
                                                <!-- <a href="<?php echo site_url('profile/edit/') . $user['username'] ?>" class="btn btn-sm btn-warning px-3 mb-2"> Edit </a> -->
                                                <a href="<?php echo site_url('admin/delete/') . $user['username'] ?>" class="btn btn-sm btn-danger px-3 mb-2" onclick="return confirm('Apkah Anda yakin ingin menghapus?')"> Hapus </a>
                                            </td>
                                        </tr><!-- END TR-->
                                    <?php $no++;
                                    endforeach; ?>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Unapprove Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" id="form_unapprove">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Alasan</label>
                        <textarea class="form-control" name="alasan" id="exampleInputPassword1" placeholder="Alasan tidak Valid"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Unapprove</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.myTablesss').DataTable();
        $(document).on('click', "#btn_nonaktif", function() {
            var _uswarung = $("#btn_nonaktif").attr("data-username");
            $('#form_unapprove').attr('action', "<?php echo site_url('admin/aktifasi_cust/') ?>" + _uswarung+"/0");
            $("#exampleModal").modal('show');
        });
    });
</script>