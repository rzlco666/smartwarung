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
                            <h3 class="text-center">Kritik Saran</h3>
                            <table class="table">
                                <thead class="thead-primary">
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>Tanggal</th>
                                        <th>Nama Pengirim</th>
                                        <th>Username</th>
                                        <th>Kepada</th>
                                        <th>Pesan</th>
                                        <th>Bukti</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($comment as $key) : ?>
                                        <tr class="text-center">

                                            <td class="">
                                                <?= $key['id_comment']; ?>
                                            </td>
                                            <td class="" style="width: 15%">
                                                <?= $key['date'] ?>
                                            </td>
                                            <td class="" style="width: 20%">
                                                <?= $key['sender_name'] ?>
                                            </td>
                                            <td class="" style="width: 20%">
                                                <?php echo $key['username'] ?>
                                            </td>
                                            <td class="" style="width: 15%">
                                                <?php echo $key['to_whom'] ?>
                                            </td>
                                            <td class="" style="width: 30%">
                                                <?php echo $key['message'] ?>
                                            </td>
                                            <td class="" style="width: 30%">
                                                <img src="<?php echo base_url('assets/kritik/' . $key['foto']) ?>" width="200" height="auto">
                                            </td>
                                        </tr><!-- END TR-->
                                    <?php endforeach; ?>
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