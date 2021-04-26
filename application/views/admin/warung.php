<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">

                    <!-- Page-Title -->
                    <div class="page-title-box">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="page-title mb-1">Daftar Warung</h4>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin')?>">Admin</a></li>
                                    <li class="breadcrumb-item active">Daftar Warung</li>
                                    </ol>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end page title end breadcrumb -->

                    <div class="page-content-wrapper">
                        <div class="container-fluid">
            
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">

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
            
                                            <table id="datatable-buttons" class="table myTablesss table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>&nbsp;</th>
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
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td>
                                                        <img style="width: 100px;" class="img-thumbnail img-fluid" src="<?php $photos = explode(',', $warung['photo']);echo base_url('assets/uploads/') . $photos[0] ?>">
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo site_url('profile/show/') . $warung['username'] ?>"><?php echo $warung['name'] ?></a>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $phrase = $warung['address'];
                                                            echo implode(' ', array_slice(str_word_count($phrase, 2), 0, 5));
                                                        ?>                                                         
                                                    </td>
                                                    <td><?php echo $warung['phone']; ?></td>
                                                    <td>
                                                        <?php if ($warung['status'] == 'Sudah diverifikasi') {
                                                                echo '<span class="badge text-white  bg-success">' . $warung['status'] . '</span>';
                                                            } elseif ($warung['status'] == 'Belum diverifikasi') {
                                                                echo '<span class="badge text-white  bg-danger">' . $warung['status'] . '</span>';
                                                            } else{
                                                                echo '<span class="badge text-white  bg-danger">' . $warung['status'] . '</span>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($warung['is_aktif'] == 1) {
                                                                echo '<span class="badge text-white  bg-success">' . 'Aktif' . '</span>';
                                                            } elseif ($warung['is_aktif'] == 0) {
                                                                echo '<span class="badge text-white  bg-danger">' . 'Tidak Aktif' . '</span>';
                                                            } 
                                                        ?>        
                                                    </td>
                                                    <td>
                                                        <?php echo $warung['alasan']; ?>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="mdi mdi-pencil"></i>
                                                            </button>

                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a target="_blank" href="<?= base_url('assets/uploads/') . $warung['ktp'] ?>" class="btn dropdown-item"> Lihat KTP </a>
                                                                <!-- <a href="<?php  ?>" class="btn btn-sm btn-warning px-3 mb-2"> Edit </a> -->
                                                                <?php if ($warung['is_aktif'] == 0) { ?>
                                                                    <a href="<?php echo site_url('admin/aktifasi_warung/') . $warung['id'] ?>/1" class="btn dropdown-item" onclick="return confirm('Apakah Anda yakin ingin mengaktifkan warung?')"> Aktifkan </a>
                                                                <?php } else { ?>
                                                                    <!-- <a href="<?php echo site_url('admin/aktifasi_warung/') . $warung['id'] ?>/0" class="btn btn-sm btn-danger px-3 mb-2" onclick="return confirm('Apkah Anda yakin ingin menonaktifkan warung?')"> Nonaktifkan </a> -->
                                                                    <button class="btn btn-sm btn-danger px-3 mb-2" id="btn_nonaktif" data-id="<?= $warung['id'] ?>" data-toggle="modal" data-target="#nonaktifModal"> Nonaktifkan </button>
                                                                <?php } ?>
                                                                <?php if ($warung['status'] != 'Sudah diverifikasi') { ?>
                                                                    <a href="<?php echo site_url('admin/approve/') . $warung['username'] ?>" class="btn dropdown-item "> Approve </a>
                                                                    <button class="btn dropdown-item" id="btn_unapprove" data-username="<?= $warung['username'] ?>" data-toggle="modal" data-target="#exampleModal"> Unapprove </button>
                                                                <?php } ?>
                                                                <a href="<?php echo site_url('admin/delete/') . $warung['username'] ?>" class="btn dropdown-item " onclick="return confirm('Apakah Anda yakin ingin menghapus?')"> Hapus </a>
                                                            </div>

                                                        </div>
                                                    </td>
                                                    
                                                </tr>
                                                    <?php $no++;
                                                    endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                        </div>
                        <!-- end container-fluid -->
                    </div> 
                    <!-- end page-content-wrapper -->
                </div>
                <!-- End Page-content -->

                <!-- sample modal content 
                    <div id="exampleModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0" id="exampleModalLabel">Alasan tidak valid</h5>
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
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Unapprove</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> /.modal -->
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