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
                                    <h4 class="page-title mb-1">Keterangan Nonaktif Pembeli</h4>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin')?>">Admin</a></li>
                                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/user')?>">Pembeli</a></li>
                                    <li class="breadcrumb-item active">Keterangan Nonaktif Pembeli</li>
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
                                            <form action="<?php echo site_url('admin/aktifasi_pembeli/').$item['username']. '/0' ?>" method="post" enctype='multipart/form-data'>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Nama Pembeli</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" value="<?php echo $item['name'] ?>" readonly="readonly">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">No. Hp</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" value="<?php echo $item['phone'] ?>" readonly="readonly">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Email</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" value="<?php echo $item['email'] ?>" readonly="readonly">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Alasan Tidak Aktif</label>
                                                <div class="col-md-10">
                                                    <textarea id="elm1" name="alasan" placeholder="Alasan tidak aktif"></textarea>
                                                </div>
                                            </div>

                                            <div class="mt-4 text-right">
                                                <a class="btn btn-outline-danger waves-effect waves-light" href="<?php echo base_url(); ?>admin/user" class="btn btn-warning">Batal</a>
                                                <button class="btn btn-primary waves-effect waves-light" type="submit">Nonaktif</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->

                        </div>
                        <!-- end container-fluid -->
                    </div> 
                    <!-- end page-content-wrapper -->
                </div>
                <!-- End Page-content -->