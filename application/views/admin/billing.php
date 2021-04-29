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
                                    <h4 class="page-title mb-1">Pendapatan Warung</h4>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin')?>">Admin</a></li>
                                    <li class="breadcrumb-item active">Pendapatan Warung</li>
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

                                            <div class="card-title-desc">
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#transfer" role="tab" aria-controls="home" aria-selected="true">
                                                            <i class="mdi mdi-credit-card-outline font-size-18 mr-1 align-middle"></i> <span class="d-none d-md-inline-block">Transfer</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#cash" role="tab" aria-controls="profile" aria-selected="false">
                                                            <i class="mdi mdi-cash-usd-outline font-size-18 mr-1 align-middle"></i> <span class="d-none d-md-inline-block">Cash</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <?php
                                            if ($this->session->flashdata('error') != '') {
                                                echo '<div class="alert alert-primary" role="alert">';
                                                echo $this->session->flashdata('error');
                                                echo '</div>';
                                            }
                                            ?>

                                            <?php
                                            if ($this->session->flashdata('success') != '') {
                                                echo '<div class="alert alert-success" role="alert">';
                                                echo $this->session->flashdata('success');
                                                echo '</div>';
                                            }
                                            ?>

                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="transfer" role="tabpanel" aria-labelledby="home-tab">
                                                    <table id="datatable-buttons" class="table myTablesss table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Warung</th>
                                                                <th>Total Pendapatan</th>
                                                                <th>Status</th>
                                                                <th>Bukti</th>
                                                                <th>Tanggal</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 1;
                                                            foreach ($billings as $warung) : ?>
                                                            <tr>
                                                                <td><?= $no ?></td>
                                                                <td><a href="<?php echo site_url('profile/show/') . $warung['username'] ?>" class=""><?php echo $warung['username'] ?></a></td>
                                                                <td><?php echo "Rp " . number_format($warung['total'], 0, ".", ".") ?></td>
                                                                <td>
                                                                    <?php if ($warung['status'] == 'Sudah ditransfer') {
                                                                            echo '<span class="badge text-white  bg-success">' . $warung['status'] . '</span>';
                                                                        } elseif ($warung['status'] == '') {
                                                                            echo '<span class="badge text-white  bg-danger">' . 'Belum ditransfer' . '</span>';
                                                                        } else{
                                                                            echo '<span class="badge text-white  bg-danger">' . $warung['status'] . '</span>';
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php if ($warung['bukti'] != "") { ?>
                                                                        <a href="<?= base_url() ?>assets/bukti_trf_admin/<?= $warung['bukti'] ?>" target="_blank">Bukti Bayar</a>
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <p>
                                                                        <?php 
                                                                        echo date("d M Y",strtotime($warung['date']))
                                                                        ?>
                                                                    </p>
                                                                    <p>
                                                                        <?php 
                                                                        echo 'Jam : '.date("H:i",strtotime($warung['date']))
                                                                        ?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <?php if ($warung['status'] != "Sudah ditransfer") { ?>
                                                                        <a href="<?php echo site_url('admin/transfer_warung/') . $warung['id'] .'/'.$warung['username']?>" class="btn btn-outline-secondary btn-sm" onclick="return confirm('Apakah Anda yakin ingin transfer ke warung?')"><i class="mdi mdi-bank-transfer-out"></i> Transfer</a>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                            <?php $no++;
                                                            endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="tab-pane fade" id="cash" role="tabpanel" aria-labelledby="profile-tab">
                                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Warung</th>
                                                                <th>Total Pendapatan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 1;
                                                            foreach ($billings_cash as $warung) : ?>
                                                            <tr>
                                                                <td><?= $no ?></td>
                                                                <td><a href="<?php echo site_url('profile/show/') . $warung['username'] ?>" class=""><?php echo $warung['username'] ?></a></td>
                                                                <td><?php echo "Rp " . number_format($warung['total'], 0, ".", ".") ?></td>
                                                            </tr>
                                                            <?php $no++;
                                                            endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
            
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
