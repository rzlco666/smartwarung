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
                            <h3 class="text-center">Daftar Invoice Menunggu Diverifikasi</h3>
                            <table class="table myTablesss">
                                <thead class="thead-primary">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>ID</th>
                                        <th>Pembeli</th>
                                        <th>Warung</th>
                                        <th>Total</th>
                                        <th>Bukti Bayar</th>
                                        <th>Status</th>
                                        <th>Alasan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    // print_r($orders);
                                    foreach ($orders as $key) : ?>
                                        <tr class="text-center">
                                            <td class="">
                                                <?= $no; ?>
                                            </td>
                                            <td class="">
                                                <?= $key->id; ?>
                                            </td>
                                            <td class="">
                                                <?= $key->user ?>
                                            </td>
                                            <td class=""><?= $key->warung ?></td>
                                            <td class=""><?= $key->total ?></td>
                                            <td class="">
                                                <?php if ($key->proof_of_payment != "") { ?>
                                                    <a href="<?= base_url() ?>assets/bukti_trf/<?= $key->proof_of_payment ?>" target="_blank">Bukti Bayar</a>
                                                <?php } ?>
                                            </td>
                                            <td class="">
                                                <?php if ($key->status == "Menunggu verif pembayaran") { ?>
                                                    Menunggu verif pembayaran
                                                    <?php } elseif ($key->status == "Dibatalkan") {
                                                        echo '<span class="badge text-white  bg-danger">' . $key->status . '</span>';
                                                    } else {
                                                    echo '<span class="badge text-white bg-success">Valid</span>';
                                                } ?>
                                            </td>
                                            <td class=""><?= $key->not_valid ?></td>
                                            <td class="">
                                                <div class="btn-group">
                                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-bars" aria-hidden="true"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="btn dropdown-item" href="<?= base_url() ?>admin/verif_payment/<?= $key->id ?>/1">Valid</a>
                                                        <button id="btn_unapprove" data-toggle="modal" data-id="<?= $key->id ?>" class="btn dropdown-item">Tidak Valid</button>
                                                    </div>
                                                </div>
                                                <!-- <?php if ($key->status == "Menunggu verif pembayaran") { ?>
                                                    <a class="btn btn-success btn-sm" href="<?= base_url() ?>admin/verif_payment/<?= $key->id ?>/1">Valid</a>
                                                    <button id="btn_unapprove" data-toggle="modal" data-id="<?= $key->id ?>" class="btn btn-danger btn-sm">Tidak Valid</button>
                                                <?php } ?> -->

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
                <h5 class="modal-title" id="exampleModalLabel">Validasi Form</h5>
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
        $(document).on('click', "#btn_unapprove", function() {
            var _uswarung = $("#btn_unapprove").attr("data-id");
            $('#form_unapprove').attr('action', "<?= base_url('admin/verif_payment/') ?>" + _uswarung + "/2");
            $("#exampleModal").modal('show');
        });
    });
</script>