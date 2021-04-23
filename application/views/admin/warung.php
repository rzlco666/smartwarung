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
                <div class="row mb-5">
                    <div class="col-md-12 ftco-animate">
                        <div class="cart-list">
                            <h3 class="text-center">Daftar Warung</h3>
                            <table class="table myTablesss">
                                <thead class="thead-primary">
                                    <tr class="text-center">
                                        <th></th>
                                        <th>&nbsp;</th>
                                        <th>Username</th>
                                        <th>Nama Warung</th>
                                        <th>Alamat</th>
                                        <th>No Telpon</th>
                                        <th>Status Verifikasi</th>
                                        <th>Status Aktif</th>
                                        <th>Alasan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($warungs as $warung) : ?>
                                        <tr class="text-center">
                                            <td><?= $no ?></td>
                                            <td class="image-prod">
                                                <div class="img" style="width:100px;background-image:url(<?php $photos = explode(',', $warung['photo']);
                                                                                                            echo base_url('assets/uploads/') . $photos[0] ?>);"></div>
                                            </td>

                                            <td><?= $warung['username'] ?></td>
                                            <td class="">
                                                <a href="<?php echo site_url('profile/show/') . $warung['username'] ?>" class=""><?php echo $warung['name'] ?></a>
                                                <p><?php ?></p>
                                            </td>
                                            <td class="">
                                                <p><?php echo $warung['address'] ?></p>
                                            </td>

                                            <td class="">
                                                <p><?php echo $warung['phone']; ?></p>
                                            </td>

                                            <td class="">
                                                <p class="p-2 text-small <?php echo ($warung['status'] == 'Sudah diverifikasi' ? 'bg-info text-white' : ($warung['status'] == 'Belum diverifikasi' ? 'bg-danger text-light' : 'bg-danger text-light')) ?>"><?php echo $warung['status']; ?></p>
                                            </td>
                                            <td>
                                                <p class="p-2 text-small <?php echo ($warung['is_aktif'] == 1 ? 'bg-info text-white' : ($warung['is_aktif'] == 0 ? 'bg-danger text-light' : 'bg-danger text-light')) ?>">
                                                    <?php echo ($warung['is_aktif'] == 0 ? 'Tidak aktif' : 'Aktif') ?>
                                                </p>
                                            </td>
                                            <td>
                                                <p><?php echo $warung['alasan']; ?></p>
                                            </td>

                                            <td class="" style="width: 10%">
                                                <div class="btn-group">
                                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-bars" aria-hidden="true"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a target="_blank" href="<?= base_url('assets/uploads/') . $warung['ktp'] ?>" class="btn dropdown-item"> Lihat KTP </a>
                                                        <!-- <a href="<?php  ?>" class="btn btn-sm btn-warning px-3 mb-2"> Edit </a> -->
                                                        <?php if ($warung['is_aktif'] == 0) { ?>
                                                            <a href="<?php echo site_url('admin/aktifasi_warung/') . $warung['id'] ?>/1" class="btn dropdown-item" onclick="return confirm('Apkah Anda yakin ingin mengaktifkan warung?')"> Aktifkan </a>
                                                        <?php } else { ?>
                                                            <!-- <a href="<?php echo site_url('admin/aktifasi_warung/') . $warung['id'] ?>/0" class="btn btn-sm btn-danger px-3 mb-2" onclick="return confirm('Apkah Anda yakin ingin menonaktifkan warung?')"> Nonaktifkan </a> -->
                                                            <button class="btn btn-sm btn-danger px-3 mb-2" id="btn_nonaktif" data-id="<?= $warung['id'] ?>" data-toggle="modal"> Nonaktifkan </button>
                                                        <?php } ?>
                                                        <?php if ($warung['status'] != 'Sudah diverifikasi') { ?>
                                                            <a href="<?php echo site_url('admin/approve/') . $warung['username'] ?>" class="btn dropdown-item "> Approve </a>
                                                            <button class="btn dropdown-item" id="btn_unapprove" data-username="<?= $warung['username'] ?>" data-toggle="modal"> Unapprove </button>
                                                        <?php } ?>
                                                        <a href="<?php echo site_url('admin/delete/') . $warung['username'] ?>" class="btn dropdown-item " onclick="return confirm('Apkah Anda yakin ingin menghapus?')"> Hapus </a>
                                                    </div>
                                                </div>
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

<!-- Modal -->
<div class="modal fade" id="nonaktifModal" tabindex="-1" role="dialog" aria-labelledby="nonaktifModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nonaktifModalLabel">Nonaktif Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" id="form_nonaktif">
                    <div class="form-group">
                        <label for="asdasdasd">Alasan</label>
                        <textarea class="form-control" name="alasan" id="asdasdasd" placeholder="Alasan tidak aktif"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Nonaktifkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.myTablesss').DataTable();
        $(document).on('click', "#btn_unapprove", function() {
            var _uswarung = $("#btn_unapprove").attr("data-username");
            $('#form_unapprove').attr('action', "<?php echo site_url('admin/unapprove/') ?>" + _uswarung);
            $("#exampleModal").modal('show');
        });
        $(document).on('click', "#btn_nonaktif", function() {
            var _uswarung = $("#btn_nonaktif").attr("data-id");
            $('#form_nonaktif').attr('action', "<?php echo site_url('admin/aktifasi_warung/') ?>" + _uswarung + "/0");
            $("#nonaktifModal").modal('show');
        });
    });
</script>