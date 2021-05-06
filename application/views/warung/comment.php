   <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="#">Home</a></li>
                        <li class="page-breadcrumb__nav active">Kritik Saran</li>
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
                        <h5 class="section-content__title">Kritik Saran</h5>
                    </div>
                    <!-- Start Wishlist Table -->
                    <div class="table-content table-responsive cart-table-content m-t-30">
                        <table id="datatable-buttons" class="table myTablesss table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama Pengirim</th>
                                    <th>Username</th>
                                    <th>Kepada</th>
                                    <th>Pesan</th>
                                    <th>Bukti</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($comment as $key) : ?>
                                <tr>
                                    <td class="product-name"><span class="text-info"><?=$key['date']?></span></td>
                                    <td class="product-name"><?=$key['sender_name']?></td>
                                    <td class="product-name"><?=$key['username']?></td>
                                    <td class="product-name"><?=$key['to_whom']?></td>
                                    <td class="product-name"><?=$key['message']?></td>
                                    <td class="product-name"><img src="<?php echo base_url('assets/kritik/'.$key['foto'])?>" width="200" height="auto"></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>  <!-- End Wishlist Table -->
                </div>
            </div>
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->