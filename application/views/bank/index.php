   <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="#">Home</a></li>
                        <li class="page-breadcrumb__nav active">Bank</li>
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
                        <a href="<?= site_url('warung/create_bank') ?>" style="padding: 7px 17px; font-size: 17px; border-radius: 7px;" class="btn btn-lg btn-primary">Tambah Bank</a>
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
                    <!-- Start Wishlist Table -->
                    <div class="table-content table-responsive cart-table-content m-t-30">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Bank</th>
                                    <th>Account Number Bank</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($bank as $key) : ?>
                                <tr>
                                    <td class="product-name"><span class="text-info"><?php echo $key['bank'] ?></span></td>
                                    <td class="product-name"><?php echo $key['account_number']; ?></td>
                                    <td class="product-name">
                                        <a href="<?php echo site_url('warung/edit_bank/') . $key['id_bank_account'] ?>" class="btn btn-warning"> Edit </a>
                                        &nbsp;
                                        <a class="btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus?');" href="<?php echo site_url('warung/delete_bank/') . $key['id_bank_account'] ?>">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>  <!-- End Wishlist Table -->
                </div>
            </div>
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->