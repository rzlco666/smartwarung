<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs" style="color: black;"><span class="mr-2"><a href="<?php echo base_url(); ?>" style="color: black;">Home</a></span> <span style="color: black;">Profile</span></p>
                <h1 class="mb-0 bread" style="color: black;"><?php echo $user['name']; ?></h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category">
                    <?php include APPPATH . 'views/profile/menu.php'; ?>
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
                            <table class="table" id="dataTable">
                                <thead class="thead-primary">
                                    <tr class="text-center">
                                        <?php if ($user['username'] == $this->session->userdata('username') or $this->session->userdata('role') == 99) : ?>
                                            <th>&nbsp;</th>
                                        <?php endif; ?>
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
                                    <?php foreach ($items as $item) : ?>
                                        <tr class="text-center">
                                            <?php if ($user['username'] == $this->session->userdata('username') or $this->session->userdata('role') == 99) : ?>
                                                <td class=""><a class="btn btn-sm btn-danger px-2" onclick="return confirm('Apakah Anda yakin akan menghapus?');" href="<?php echo site_url('item/delete/') . $item['id'] ?>"><span class="ion-ios-close"></span></a></td>
                                            <?php endif; ?>

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
                                            if($item['discount']>0){
                                                echo "<del>Rp " . number_format($item['price'], 0, ".", ".")."</del> "."Rp " . number_format($item['price']-(($item['discount']/100)*$item['price']), 0, ".", ".") ;
                                            }else{
                                                echo "Rp " . number_format($item['price'], 0, ".", ".") ;
                                            }
                                            ?></td>

                                            <td class="price"><?php echo $item['stock']; ?></td>
                                            <td class="price"><?php echo $item['discount']; ?></td>
                        </div>
                        </td>
                        <?php if ($user['username'] == $this->session->userdata('username') or $this->session->userdata('role') == 99) : ?>
                                            <td class="price"><?php if($item['hide']==1){echo "Tidak Tampil";}else{echo "Tampil";}?>
                            <td class="total">
                                <?php if($item['hide']==1){ ?>
                                <a href="<?php echo site_url('item/hide/0/') . $item['id'] ?>" class="btn btn-sm btn-dark px-3"> Unhide </a>
                                <?php }else{ ?>
                                <a href="<?php echo site_url('item/hide/1/') . $item['id'] ?>" class="btn btn-sm btn-secondary px-3"> Hide </a>
                                <?php } ?>
                                <a href="<?php echo site_url('item/edit/') . $item['id'] ?>" class="btn btn-sm btn-warning px-3"> Edit </a>
                            </td>
                        <?php endif; ?>
                        </tr><!-- END TR-->
                    <?php endforeach; ?>
                    </tbody>
                    </table>
                    </div>
                </div>
                <div class="offset-sm-5 col-sm-4 mt-5">
                    <?php if ($this->session->userdata('username') == $user['username']) : ?>
                        <a href="<?php echo site_url('item/create/') ?>" class="btn btn-primary px-3">Tambah barang</a>
                    <?php endif; ?>
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