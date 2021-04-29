<style type="text/css">
    #hidden_div {
    display: none;
}
</style>

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
                                    <h4 class="page-title mb-1">Transfer Pendapatan Warung</h4>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin')?>">Admin</a></li>
                                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/billing')?>">Pendapatan Warung</a></li>
                                    <li class="breadcrumb-item active">Transfer Pendapatan Warung</li>
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
                                            <?= form_open_multipart('admin/proses_transfer/' . $item['id']) ?>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Nama Warung</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" value="<?php echo $item['username'] ?>" readonly="readonly">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Jumlah Transfer</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" value="<?php echo "Rp " . number_format($item['total'], 0, ".", ".") ?>" readonly="readonly">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Bank Tersedia</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" name="bank_tujuan" id="bank_to_select" onchange="showDiv('hidden_div', this)" required placeholder="Nama Bank">
                                                        <option value="" disabled selected>Pilih Bank Tersedia</option>
                                                        <?php foreach ($bank as $key) {?>
                                                        <option value="<?=$key->bank?>"><?=$key->bank?></option>
                                                        
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" id="pilih_bank_show">Nomer Rekening</label>
                                                <div class="col-md-10" id="hidden_div">
                                                    <input class="form-control" type="text" value="<?=$key->account_number.' A/N '.$key->account_name?>" readonly="readonly">
                                                </div>
                                                <?php }?>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Bukti Transfer</label>
                                                <div class="col-md-10">
                                                    <div class="custom-file">
                                                        <input name="file" type="file" class="custom-file-input" id="validationCustomFile" required>
                                                        <label class="custom-file-label" for="validationCustomFile">Upload bukti transfer...</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-4 text-right">
                                                <a class="btn btn-outline-danger waves-effect waves-light" href="<?php echo base_url(); ?>admin/billing" class="btn btn-warning">Batal</a>
                                                <button class="btn btn-primary waves-effect waves-light" type="submit">Upload</button>
                                            </div>
                                            <?= form_close() ?>
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

<script type="text/javascript">
    function showDiv(divId, element)
{
    <?php foreach ($bank as $key2) {?>
    document.getElementById(divId).style.display = element.value == '<?=$key->bank?>' ? 'block' : 'none';
    <?php }?>
}
</script>