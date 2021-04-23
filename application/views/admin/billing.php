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
                            <div class="text-center">
                                <a href="<?= base_url('admin/billing/') ?>" class="btn btn-primary"> Semua</a>
                                <a href="<?= base_url('admin/billing/' . date('Y-m-d') . '/Hari') ?>" class="btn btn-primary"> Hari ini</a>
                                <a href="<?= base_url('admin/billing/Minggu') ?>" class="btn btn-primary"> Minggu ini</a>
                                <a href="<?= base_url('admin/billing/' . date('Y-m') . '/Bulan') ?>" class="btn btn-primary"> Bulan ini</a>
                                <a href="<?= base_url('admin/billing/' . date('Y') . '/Tahun') ?>" class="btn btn-primary"> Tahun ini</a>
                            </div>
                            <div class="text-center m-3">
                                <!-- <h3>Pembukuan Periode <?= $type ?></h3> -->
                            </div>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cash</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Transer</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <br>
                                    <table class="table myTablesss">
                                    <thead class="thead-primary">
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Nama Warung</th>
                                                <th>Total Pendapatan</th>
                                                <!-- <th>Aksi</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($billings_cash as $warung) : ?>
                                                <tr class="text-center">
                                                    <!-- <td class="image-prod"><div class="img" style="width:100px;background-image:url(<?php $photos = explode(',', $warung['photo']);
                                                                                                                                            echo base_url('assets/uploads/') . $photos[0] ?>);"></div></td> -->
                                                    <td style="width: 5%;"><?= $no ?></td>
                                                    <td class="" style="width: 25%">
                                                        <a href="<?php echo site_url('profile/show/') . $warung['username'] ?>" class=""><?php echo $warung['username'] ?></a>
                                                        <p><?php ?></p>
                                                    </td>

                                                    <td class="" style="width: 25%">
                                                        <p>
                                                            <?php echo "Rp " . number_format($warung['total'], 0, ".", ".") ?>
                                                        </p>
                                                    </td>
                                                </tr><!-- END TR-->
                                            <?php $no++;
                                            endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <br>
                                    <table class="table myTablesss">
                                        <thead class="thead-primary">
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Nama Warung</th>
                                                <th>Total Pendapatan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($billings as $warung) : ?>
                                                <tr class="text-center">
                                                    <!-- <td class="image-prod"><div class="img" style="width:100px;background-image:url(<?php $photos = explode(',', $warung['photo']);
                                                                                                                                            echo base_url('assets/uploads/') . $photos[0] ?>);"></div></td> -->
                                                    <td style="width: 5%;"><?= $no ?></td>
                                                    <td class="" style="width: 25%">
                                                        <a href="<?php echo site_url('profile/show/') . $warung['username'] ?>" class=""><?php echo $warung['username'] ?></a>
                                                        <p><?php ?></p>
                                                    </td>

                                                    <td class="" style="width: 25%">
                                                        <p>
                                                            <?php echo "Rp " . number_format($warung['total'], 0, ".", ".") ?>
                                                        </p>
                                                    </td>

                                                    <td class="" style="width: 10%">
                                                        <a data-warung="<?= $warung['username'] ?>" id="btn-modal" target="#exampleModal" data-toggle="modal" class="btn btn-sm btn-info px-3 mb-2"> Transfer</a>
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
                </div>
            </div>
            <!-- endcontent -->
        </div>
    </div>
</section>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Transfer Bank</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="<?= base_url('admin/send_transfer') ?>">
                    <input type="hidden" id="input-warung" name="input_warung">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pilih Bank</label>
                        <select class="form-control" id="input-bank" name="input_bank">
                            <option value="" selected disabled></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Send Transfer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(document).on('click', '#btn-modal', function() {
            event.preventDefault();
            // $(this).
        });
        $('.myTablesss').DataTable({
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
	});
    });
</script>