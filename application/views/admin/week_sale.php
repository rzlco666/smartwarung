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
                                    <h4 class="page-title mb-1">Obral Mingguan</h4>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin')?>">Admin</a></li>
                                    <li class="breadcrumb-item active">Obral Mingguan</li>
                                    </ol>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end page title end breadcrumb -->

                    <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">

                                            <p class="card-title-desc">
                                                <a href="<?php echo site_url('admin/add_week_sale/') ?>" class="btn btn-primary waves-effect waves-light">Tambah Barang</a>
                                                <a href="<?php echo site_url('admin/generate_week_sale/') ?>" class="btn btn-outline-primary waves-effect waves-light">Generate Obral Mingguan</a>
                                            </p>

                                            <?php
                                            if ($this->session->flashdata('error') != '') {
                                                echo '<div class="alert alert-primary" role="alert">';
                                                echo $this->session->flashdata('error');
                                                echo '</div>';
                                            }
                                            ?>

                                            <?php
                                            if ($this->session->flashdata('success_ubah') != '') {
                                                echo '<div class="alert alert-success" role="alert">';
                                                echo $this->session->flashdata('success_ubah');
                                                echo '</div>';
                                            }
                                            ?>
            
                                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>&nbsp;</th>
                                                    <th>Nama Barang</th>
                                                    <th>Harga</th>
                                                    <th>Disc.(%)</th>
                                                    <th>Total Disc.</th>
                                                    <th>Periode</th>
                                                    <th>Aksi</th>
                                                </tr>
                                                </thead>
            
            
                                                <tbody>
                                                    <?php $no=1; foreach ($items as $item) : ?>
                                                <tr>
                                                    <td><?=$no?></td>
                                                    <td>
                                                        <img class="img-thumbnail img-fluid" src="<?php $photos = explode(',', $item['photo']);echo base_url('assets/uploads/') . $photos[0] ?>">
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo site_url('item/show/') . $item['id'] ?>"><h4><?php echo $item['name'] ?></h4></a>
                                                        <p>
                                                            <?php 
                                                                $phrase = $item['description'];
                                                                echo implode(' ', array_slice(str_word_count($phrase, 2), 0, 2));
                                                            ?>    
                                                        </p>
                                                        <p>
                                                            ID : <?=$item['id']?>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($item['discount'] > 0) {
                                                            echo "<del class='text-muted'>Rp " . number_format($item['price'], 0, ".", ".") . "</del> <br>" . "<p class='text-primary'>Rp " . number_format($item['price'] - (($item['discount'] / 100) * $item['price']), 0, ".</p>", ".");
                                                        } else {
                                                            echo "Rp " . number_format($item['price'], 0, ".", ".");
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $item['discount']."%"; ?></td>
                                                    <td><?php echo "<p class='text-primary'>Rp " . number_format(($item['discount'] / 100) * $item['price'], 0, ".</p>", "."); ?></td>
                                                    <td><?php echo date("d M Y",strtotime($item['date_week_sale']))." - ".date("d M Y",strtotime("+7 days",strtotime($item['date_week_sale']))); ?></td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <a class="btn btn-outline-secondary btn-sm" href="<?php echo site_url('admin/edit_week_sale/') . $item['id'] ?>" data-toggle="tooltip" data-placement="top" title="Ubah">
                                                                <span class="mdi mdi-pencil"></span>
                                                            </a>
                                                            <a class="btn btn-outline-secondary btn-sm" onclick="return confirm('Apakah Anda yakin akan menghapus?');" href="<?php echo site_url('admin/delete_week_sale/') . $item['id'] ?>" data-toggle="tooltip" data-placement="top" title="Hapus">
                                                                <span class="mdi mdi-trash-can"></span>
                                                            </a>
                                                        </div>      
                                                    </td>
                                                </tr>
                                                    <?php $no++; endforeach; ?>
                                                </tbody>
                                            </table>
            
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                        </div>
                        <!-- end container-fluid -->
                    </div> 
                    <!-- end page-content-wrapper -->
                </div>
                <!-- End Page-content -->