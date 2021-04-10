<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category">
                    <?php include APPPATH.'views/admin/menu.php'; ?>
                </ul>
            </div>
        </div>
        <div class="row">
            <!-- content -->
            <div class="container">
                <?php if($this->session->flashdata('errors') != ''): ?>
                <div class="alert alert-danger text-center" role="alert">
                <?php echo $this->session->flashdata('errors'); ?>
                </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('success')!= ''): ?>
                <div class="alert alert-success text-center" role="alert">
                <?php echo $this->session->flashdata('success') ?>
                </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-12 ftco-animate">
                        <div class="cart-list">
                            <h3 class="text-center">Daftar Invoice Menunggu Diverifikasi</h3>
                            <table class="table">
                                <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>Pembeli</th>
                                    <th>Warung</th>
                                    <th>Total</th>
                                    <th>Bukti Bayar</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no=1;foreach($orders as $key): ?>
                                <tr class="text-center">
                                    <td class="">
                                    <?=$no;?>
                                    </td>
                                    <td class="" style="width: 25%">
                                        <?=$key->user?>
                                    </td>
                                    <td class="" style="width: 25%"><?=$key->warung?></td>
                                    <td class="" style="width: 25%"><?=$key->total?></td>
                                    <td class="" style="width: 25%"><a href="<?=base_url()?>assets/bukti_trf/<?=$key->proof_of_payment?>" target="_blank">Bukti Bayar</a></td>
                                    <td class="" style="width: 25%">
                                        <a class="btn btn-success btn-sm" href="<?=base_url()?>admin/verif_payment/<?=$key->id?>/1">Valid</a>
                                        <a class="btn btn-danger btn-sm" href="<?=base_url()?>admin/verif_payment/<?=$key->id?>/2">Tidak Valid</a>
                                    </td>
                                </tr><!-- END TR-->
                                <?php $no++; endforeach; ?>
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