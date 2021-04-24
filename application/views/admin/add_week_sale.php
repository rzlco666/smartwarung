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
                                    <h4 class="page-title mb-1">Tambah Barang Week Sale</h4>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin')?>">Admin</a></li>
                                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/week_sale')?>">Barang Week Sale</a></li>
                                    <li class="breadcrumb-item active">Add Barang Week Sale</li>
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
                                            <form action="<?php echo site_url('admin/save_week_sale/')?>" method="post" enctype='multipart/form-data'>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Nama Barang</label>
                                                <div class="col-md-10">
                                                    <select id="select_barang" name="name" class="form-control">
                                                        <option value="" selected disabled>Pilih Barang</option>
                                                        <?php foreach ($item as $key) {?>
                                                        <option value="<?=$key->id?>"><?=$key->name?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Discount(%)</label>
                                                <div class="col-md-10">
                                                    <input type="number" min="0" class="form-control" name="discount" placeholder="Discount">
                                                </div>
                                            </div>

                                            <div class="mt-4 text-right">
                                                <a class="btn btn-outline-danger waves-effect waves-light" href="<?php echo base_url(); ?>admin/week_sale" class="btn btn-warning">Batal</a>
                                                <button class="btn btn-primary waves-effect waves-light" type="submit">Tambah</button>
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

<!-- Select2 JS --> 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
$(document).ready(function(){
 
 // Initialize select2
 $("#select_barang").select2();
});
</script>