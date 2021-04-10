<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 ftco-animate">
                <form action="<?php echo site_url('warung/save_bank') ?>" class="billing-form" method="post" enctype='multipart/form-data'>
                    <h3 class="mb-4 billing-heading">Tambah Bank</h3>
                    <div class="row align-items-end">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="firstname">Nama Bank</label>
                                <select class="form-control" name="name" placeholder="Nama Bank">
                                    <option></option>
                                    <option value="BCA">BCA</option>
                                    <option value="BRI">BRI</option>
                                    <option value="BNI">BNI</option>
                                    <option value="MANDIRI">MANDIRI</option>
                                    <option value="BTPN">BTPN</option>
                                    <option value="BPD JABAR">BPD JABAR</option>
                                </select>
                                <?php echo form_error('name', '<small class="text-danger error">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12 pb-3">
                            <label for="username">Nama Rekening</label>
                            <input type="text" class="form-control" name="nama_rek" placeholder="Nama Rekening">
                            <?php echo form_error('nama_rek', '<small class="text-danger error">', '</small>'); ?>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12 pb-3">
                            <label for="username">Nomor Rekening</label>
                            <input type="text" class="form-control" name="nomor" placeholder="Nomor Rekening">
                            <?php echo form_error('nomor', '<small class="text-danger error">', '</small>'); ?>
                        </div>
                        <div class="w-100"></div>
                        <div class="offset-md-4 col-md-2 mt-4">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary px-5 text-center d-block" value="Tambahkan">
                            </div>
                        </div>
                    </div>
                </form><!-- END -->
            </div>
        </div>
    </div>
</section> <!-- .section -->