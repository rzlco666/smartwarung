   <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="#">Home</a></li>
                        <li class="page-breadcrumb__nav active">Etalase <?php echo $user['name']; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->

    <!-- ::::::  Start  Main Container Section  ::::::  -->
    <main id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content">
                        <?php if ($this->session->userdata('username') == $user['username']) : ?>
                            <a href="<?php echo site_url('item/create/') ?>" style="padding: 7px 17px; font-size: 17px; border-radius: 7px;" class="btn btn-lg btn-primary">Tambah barang</a>
                        <?php endif; ?>
                        <div class="text-center">
                            <a href="<?=base_url('profile/etalase/'.$user['username'])?>" style="padding: 7px 17px; font-size: 17px; border-radius: 7px;" class="btn btn-lg btn-primary"> Semua</a>
                            <?php foreach ($categories as $category) : ?>
                                <a style="padding: 7px 17px; font-size: 17px; border-radius: 7px;" class="btn btn-lg btn-primary" href="<?php echo site_url('profile/etalase_warung/') . $category['id'] ?>"><?php echo $category['name'] ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php if($this->session->flashdata('errors') != ''): ?>
                    <br>
                    <div class="alert alert-danger text-center" role="alert">
                      <?php echo $this->session->flashdata('errors'); ?>
                    </div>
                    <?php endif; ?>
                    <?php if($this->session->flashdata('success')!= ''): ?>
                    <br>
                    <div class="alert alert-success text-center" role="alert">
                      <?php echo $this->session->flashdata('success') ?>
                    </div>
                    <?php endif; ?>
                    <br>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>No</th>
                                <th>&nbsp;</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Discount</th>
                                <?php if ($user['username'] == $this->session->userdata('username') or $this->session->userdata('role') == 99) : ?>
                                <th>Show/Hide</th>
                                <th>Aksi</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; foreach ($items as $item) {?>
                            <tr class="text-center">
                                <td><?=$i?></td>
                                <td><img height="100px" class="product-dis__img m-b-30" src="<?php echo base_url('assets/uploads/') ?><?php echo $item['photo'] ?>" alt=""></td>
                                <td><a href="<?php echo site_url('item/show/') . $item['id'] ?>" class="h4 text-info"><?php echo $item['name'] ?></a>
                                                <p><?php $phrase = $item['description'];
                                                            echo implode(' ', array_slice(str_word_count($phrase, 2), 0, 5)); ?> ...</p></td>
                                <td>
                                    <?php
                                        if ($item['discount'] > 0) {
                                            echo "<span class='product__price-del'>Rp " . number_format($item['price'], 0, ".", ".") . "</span> " . "<span class='product__price-reg'>Rp " . number_format($item['price'] - (($item['discount'] / 100) * $item['price']), 0, ".</span>", ".");
                                        } else {
                                            echo "<span class='product__price-reg'>Rp " . number_format($item['price'], 0, ".</span>", ".");
                                        }
                                        ?>
                                </td>
                                <td><?php echo $item['stock']; ?></td>
                                <td><?php echo $item['discount']; ?>%</td>
                                <?php if ($user['username'] == $this->session->userdata('username') or $this->session->userdata('role') == 99) : ?>
                                <td>
                                    <?php if ($item['hide'] == 1) {
                                                    echo "Tidak Tampil";
                                                } else {
                                                    echo "Tampil";
                                                } ?>
                                </td>
                                <td>
                                        <?php if ($item['hide'] == 1) { ?>
                                            <a onclick="return confirm('Apakah Anda yakin akan menampilkan produk?');" href="<?php echo site_url('item/hide/0/') . $item['id'] ?>" class="btn btn-dark"> Unhide </a>
                                        <?php } else { ?>
                                            <a onclick="return confirm('Apakah Anda yakin akan menyembunyikan produk?');" href="<?php echo site_url('item/hide/1/') . $item['id'] ?>" class="btn btn-secondary"> Hide </a>
                                        <?php } ?>
                                        &nbsp;
                                        <a href="<?php echo site_url('item/edit/') . $item['id'] ?>" class="btn btn-warning"> Edit </a>
                                        &nbsp;
                                        <a onclick="return confirm('Apakah Anda yakin akan menghapus produk?');" href="<?php echo site_url('item/delete/') . $item['id'] ?>" class="btn btn-danger"> x </a>
                                </td>
                                <?php endif; ?>
                            </tr>
                        <?php $i++;}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->