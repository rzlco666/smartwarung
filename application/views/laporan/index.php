   <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="#">Home</a></li>
                        <li class="page-breadcrumb__nav active">Laporan</li>
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
                        <h5 class="section-content__title">Laporan</h5>
                        <div class="text-center">
                            <a href="<?=base_url('warung/laporan/')?>" style="padding: 7px 17px; font-size: 17px; border-radius: 7px;" class="btn btn-lg btn-primary"> Semua</a>
                            <a href="<?=base_url('warung/laporan/'.date('Y-m-d').'/Hari')?>" style="padding: 7px 17px; font-size: 17px; border-radius: 7px;" class="btn btn-lg btn-primary"> Hari ini</a>
                            <a href="<?=base_url('warung/laporan/Minggu')?>" style="padding: 7px 17px; font-size: 17px; border-radius: 7px;" class="btn btn-lg btn-primary"> Minggu ini</a>
                            <a href="<?=base_url('warung/laporan/'.date('Y-m').'/Bulan')?>" style="padding: 7px 17px; font-size: 17px; border-radius: 7px;" class="btn btn-lg btn-primary"> Bulan ini</a>
                            <a href="<?=base_url('warung/laporan/'.date('Y').'/Tahun')?>" style="padding: 7px 17px; font-size: 17px; border-radius: 7px;" class="btn btn-lg btn-primary"> Tahun ini</a>
                        </div>
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Laporan Penjualan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Stok</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <br>
                    <table id="datatable-buttons" class="table myTablesss table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Invoice</th>
                                <th>Tanggal</th>
                                <th>Item</th>
                                <th>Stok</th>
                                <th>Kuantitas</th>
                                <th>Harga</th>
                                <th>Ongkir</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; foreach ($laporan as $key) {?>
                            <tr class="text-center">
                                <td><?=$i?></td>
                                <td><?=$key->id?></td>
                                <td><?=$key->date?></td>
                                <td><?=$key->name?></td>
                                <td><?=$key->stock?></td>
                                <td><?=$key->quantity?></td>
                                <td>
                                    <?php 
                                        echo "Rp " . number_format($key->billing, 0, ".", ".");
                                    ?>        
                                </td>
                                <td>
                                    <?php 
                                        echo "Rp " . number_format($key->delivery_fee, 0, ".", ".");
                                    ?>        
                                </td>
                                <td>
                                    <?php 
                                        echo "Rp " . number_format($key->total, 0, ".", ".");
                                    ?>
                                </td>
                            </tr>
                        <?php $i++;}?>
                        </tbody>
                    </table>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <br>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Item</th>
                                <th>Stok</th>
                                <th>Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $o=1; foreach ($laporan_item as $key) {?>
                            <tr class="text-center">
                                <td><?=$o?></td>
                                <td><?=$key->name?></td>
                                <td><?=$key->stock?></td>
                                <td><?=$key->category?></td>
                            </tr>
                        <?php $o++;}?>
                        </tbody>
                    </table>
                    </div>
                </div>
                    <!-- Start Wishlist Table -->
                    <!-- <div class="table-content table-responsive cart-table-content m-t-30">
                        <table>
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
                    </div>-->  <!-- End Wishlist Table -->
                </div>
            </div>
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->