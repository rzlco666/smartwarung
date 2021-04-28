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
                                    <h4 class="page-title mb-1">Keterangan Pesanan Tidak Valid</h4>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin')?>">Admin</a></li>
                                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/orders')?>">Pesanan</a></li>
                                    <li class="breadcrumb-item active">Keterangan Pesanan Tidak Valid</li>
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
                                            <form action="<?php echo site_url('admin/verif_payment/').$item['id']. '/0' ?>" method="post" enctype='multipart/form-data'>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Invoice ID</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" value="<?php echo $item['id'] ?>" readonly="readonly">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Pembeli</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" value="<?php echo $item['user'] ?>" readonly="readonly">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Warung</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" value="<?php echo $item['warung'] ?>" readonly="readonly">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Tujuan</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" value="<?php echo $item['destination'] ?>" readonly="readonly">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Total</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" value="<?php echo 'Rp ' . number_format($item['total'], 0, '.', '.'); ?>" readonly="readonly">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Alasan Tidak Valid</label>
                                                <div class="col-md-10">
                                                    <textarea id="elm1" name="alasan" placeholder="Alasan tidak valid"></textarea>
                                                </div>
                                            </div>

                                            <div class="mt-4 text-right">
                                                <a class="btn btn-outline-danger waves-effect waves-light" href="<?php echo base_url(); ?>admin/orders" class="btn btn-warning">Batal</a>
                                                <button class="btn btn-primary waves-effect waves-light" type="submit">Tidak Valid</button>
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