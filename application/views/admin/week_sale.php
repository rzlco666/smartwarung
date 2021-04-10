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
                        <div class="text-center">
                            <a href="<?php echo site_url('admin/generate_week_sale/') ?>" class="btn btn-primary">Generate Obral Mingguan</a>&nbsp
                            <a href="<?php echo site_url('admin/add_week_sale/') ?>" class="btn btn-primary">Tambah Barang Obral Mingguan</a>
                        </div>
                        <div class="cart-list">
                            <table class="table" id="dataTable">
                                <thead class="thead-primary">
                                    <tr class="text-center">
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Discount</th>
                                        <th>Total Discount</th>
                                        <th>Periode</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($items as $item) : ?>
                                        <tr class="text-center">
                                            <td class=""><a class="btn btn-sm btn-danger px-2" onclick="return confirm('Apakah Anda yakin akan menghapus?');" href="<?php echo site_url('admin/delete_week_sale/') . $item['id'] ?>"><span class="ion-ios-close"></span></a></td>

                                            <td class="image-prod">
                                                <div class="img" style="background-image:url(<?php $photos = explode(',', $item['photo']);
                                                                                                echo base_url('assets/uploads/') . $photos[0] ?>);"></div>
                                            </td>

                                            <td class="product-name">
                                                <a href="<?php echo site_url('item/show/') . $item['id'] ?>" class="h4"><?php echo $item['name'] ?></a>
                                                <p><?php echo $item['description'] ?></p>
                                            </td>

                                            <td class="price">

                                                <?php
                                                if ($item['discount'] > 0) {
                                                    echo "<del>Rp " . number_format($item['price'], 0, ".", ".") . "</del> " . "Rp " . number_format($item['price'] - (($item['discount'] / 100) * $item['price']), 0, ".", ".");
                                                } else {
                                                    echo "Rp " . number_format($item['price'], 0, ".", ".");
                                                }
                                                ?></td>

                                            <td class="price"><?php echo $item['discount']; ?></td>
                                            <td class="price"><?php echo "Rp " . number_format(($item['discount'] / 100) * $item['price'], 0, ".", "."); ?></td>
                                            <td class="price"><?php echo date("d M Y",strtotime($item['date_week_sale']))." s/d ".date("d M Y",strtotime("+7 days",strtotime($item['date_week_sale']))); ?></td>
                        </div>
                        </td>
                        <td class="total">
                            <a href="<?php echo site_url('admin/edit_week_sale/') . $item['id'] ?>" class="btn btn-sm btn-warning px-3"> Edit </a>
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
    <div class="row mt-5">
        <div class="col text-center">
            <div class="block-27">
            </div>
        </div>
    </div>
    </div>
</section>