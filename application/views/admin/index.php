            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    
                    <!-- Page-Title -->
                    <div class="page-title-box">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="page-title mb-1">Dashboard</h4>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end page title end breadcrumb -->

                    <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="card">
                                        <div class="card-body">
                                        <div class="row">
                                                <div class="col-6">
                                                    <h5>Welcome,</h5>
                                                    <p class="text-muted"><?php echo ucwords($this->session->userdata('name')) ?></p>

                                                    <div class="mt-4">
                                                        <a href="<?php echo site_url('auth/logout') ?>" class="btn btn-primary btn-sm">Logout <i class="mdi mdi-arrow-right ml-1"></i></a>
                                                    </div>
                                                </div>

                                                <div class="col-5 ml-auto">
                                                    <div>
                                                        <img src="<?php echo base_url('assets_admin/') ?>images/widget-img.png" alt="" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="header-title mb-4">Total Transaksi</h5>
                                            <div class="media">
                                                <div class="media-body">
                                                    <p class="text-muted mb-2">Jumlah uang transaksi</p>
                                                    <?php foreach ($total_transaksi as $key) {
                                                        echo "<h4>Rp " . number_format($key->total, 0, ".</h4>", ".");
                                                    }?>
                                                </div>
                                                <div dir="ltr" class="ml-2">
                                                    <input data-plugin="knob" data-width="56" data-height="56" data-linecap=round data-displayInput=false
                                                    data-fgColor="#3051d3" value="100" data-skin="tron" data-angleOffset="56"
                                                    data-readOnly=true data-thickness=".17" />
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="media">
                                                <div class="media-body">
                                                    <h5 class="mb-0"> *<span class="font-size-14 text-muted ml-1">Jumlah termasuk ongkir</span></h5>
                                                </div>

                                                <div class="align-self-end ml-2">
                                                    <a href="<?php echo site_url('admin/orders/') ?>" class="btn btn-primary btn-sm">Selengkapnya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="col-xl-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="header-title mb-4">Grafik Penjualan</h5>
                                            <div id="tahunan-sale-chart" class="apex-charts" dir="ltr"></div>
                                        </div>
                                    </div>
                                </div>
        
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-header bg-transparent p-3">
                                            <h5 class="header-title mb-0">Statistik Penjualan</h5>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <div class="media my-2">
                                                    
                                                    <div class="media-body">
                                                        <p class="text-muted mb-2">Jumlah Warung</p>
                                                        <h5 class="mb-0"><?=$total_warung?></h5>
                                                    </div>
                                                    <div class="icons-lg ml-2 align-self-center">
                                                        <i class="uim uim-layer-group"></i>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media my-2">
                                                    <div class="media-body">
                                                        <p class="text-muted mb-2">Total Invoice</p>
                                                        <h5 class="mb-0"><?=$total_transaction?></h5>
                                                    </div>
                                                    <div class="icons-lg ml-2 align-self-center">
                                                        <i class="uim uim-analytics"></i>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media my-2">
                                                    <div class="media-body">
                                                        <p class="text-muted mb-2">Jumlah Produk</p>
                                                        <h5 class="mb-0"><?=$total_item?></h5>
                                                    </div>
                                                    <div class="icons-lg ml-2 align-self-center">
                                                        <i class="uim uim-ruler"></i>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media my-2">
                                                    <div class="media-body">
                                                        <p class="text-muted mb-2">Jumlah Pembeli</p>
                                                        <h5 class="mb-0"><?=$total_user?></h5>
                                                    </div>
                                                    <div class="icons-lg ml-2 align-self-center">
                                                        <i class="uim uim-box"></i>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="header-title mb-4">Pembeli Tersering</h5>
                                            <div class="table-responsive">
                                                <table class="table table-centered table-hover mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Nama Pembeli</th>
                                                            <th scope="col">Total Transaksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                         <?php foreach ($pembeli_tersering as $key) {?>
                                                        <tr>
                                                            <td><?=$key->user?></td>
                                                            <td><?=$key->total?></td>
                                                        </tr>
                                                        <?php }?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="header-title mb-4">Warung Terlaku</h5>
                                            <div class="table-responsive">
                                                <table class="table table-centered table-hover mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Nama Warung</th>
                                                            <th scope="col">Total Transaksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($warung_terlaku as $key) {?>
                                                        <tr>
                                                            <td><?=$key->warung?></td>
                                                            <td><?=$key->total?></td>
                                                        </tr>
                                                        <?php }?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="float-right ml-2">
                                                <a href="<?php echo site_url('admin/orders/') ?>">Selengkapnya</a>
                                            </div>
                                            <h5 class="header-title mb-4">Transaksi Terbaru</h5>

                                            <div class="table-responsive">
                                                <table class="table table-centered table-hover mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Pembeli</th>
                                                            <th scope="col">Warung</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Total</th>
                                                            <th scope="col">Tanggal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1;
                                                        foreach ($orders as $key) : ?>
                                                        <tr>
                                                            <th scope="row">
                                                                <a href="#"><?= $no; ?></a>
                                                            </th>
                                                            <td><?= $key->user ?></td>
                                                            <td><?= $key->warung ?></td>
                                                            <td>
                                                                <div class="badge badge-soft-primary"><?= $key->status ?></div>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                    echo "Rp " . number_format($key->total, 0, ".", ".");
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php 
                                                                    echo date("d M Y",strtotime($key->date))
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <?php $no++;
                                                        endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="header-title mb-4">Total Pendapatan Warung (Pesanan Selesai)</h5>
                                            <div id="column_chartt" class="apex-charts" dir="ltr"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="header-title mb-4">Status Transaksi</h5>
                                            <div id="pie_chartt" class="apex-charts" dir="ltr"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="header-title mb-4">Warung Terlaku (Pesanan Selesai)</h5>
                                            <div id="column_chart_datalabell" class="apex-charts" dir="ltr"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="header-title mb-4">Pembeli Tersering (Pesanan Selesai)</h5>
                                            <div id="bar_chartt" class="apex-charts" dir="ltr"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                        </div> <!-- container-fluid -->
                    </div>
                    <!-- end page-content-wrapper -->
                </div>
                <!-- End Page-content -->