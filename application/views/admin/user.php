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
                                    <h4 class="page-title mb-1">Daftar Pembeli</h4>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin')?>">Admin</a></li>
                                    <li class="breadcrumb-item active">Daftar Pembeli</li>
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
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td>
                                                        <img style="width:100px;" class="img-thumbnail img-fluid" src="<?php $photos = explode(',', $user['photo']); echo base_url('assets/uploads/'); if ($user['photo'] != null) { echo $photos[0]; } else { echo 'no-photo.png'; }; ?>">
                                                    </td>
                                                    <td><?= $user["username"] ?></td>
                                                    <td><a href="<?php echo site_url('profile/show/') . $user['username'] ?>" class=""><?php echo $user['name'] ?></a></td>
                                                    <td><p><?php echo $user['phone']; ?></td>
                                                    <td>
                                                        <?php if ($user['is_aktif_cust'] == 1) { 
                                                                echo '<span class="badge text-white bg-success">Aktif</span>';
                                                              } else {
                                                                echo '<span class="badge text-white  bg-danger">Nonaktif</span>';
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <?php if ($user['is_aktif_cust'] == 0) { ?>
                                                                <a class="btn btn-outline-secondary btn-sm" href="<?php echo site_url('admin/aktifasi_cust/') . $user['username'] ?>/1" data-toggle="tooltip" data-placement="top" title="Aktifkan" onclick="return confirm('Apkah Anda yakin ingin mengaktifkan warung?')">
                                                                    <span class="mdi mdi-pencil"></span>
                                                                </a>
                                                            <?php } else { ?>
                                                                <button class="btn btn-outline-secondary btn-sm" id="btn_nonaktif" data-id="<?= $user['username'] ?>" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Nonaktifkan"><span class="mdi mdi-pencil"></span></button>
                                                            <?php } ?>
                                                            <a class="btn btn-outline-secondary btn-sm" onclick="return confirm('Apakah Anda yakin akan menghapus?');" href="<?php echo site_url('admin/delete/') . $user['username'] ?>" data-toggle="tooltip" data-placement="top" title="Ubah">
                                                                <span class="mdi mdi-trash-can"></span>
                                                            </a>
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