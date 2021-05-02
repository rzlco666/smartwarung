<?php
$numbering = ['First', 'Second', 'Third', 'Fourth', 'Five'];
include APPPATH . 'views/admin/style_card.php'; ?>
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs" style="color: black;"><span class="mr-2"><a href="<?php echo base_url(); ?>" style="color: black;">Home</a></span> <span style="color: black;">Profile</span></p>
                <h1 class="mb-0 bread" style="color: black;"><?php echo $user['username']; ?></h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category">
                    <?php include APPPATH . 'views/profile/menu.php'; ?>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <div class="row m-2">
                        <!-- <div class="col-md-3">
                    <div class="card-counter primary">
                        <i class="fa fa-code-fork"></i>
                        <span class="count-numbers"><?= $total_warung ?></span>
                        <span class="count-name">Warung</span>
                    </div>
                </div> -->

                        <div class="col-md-4 col-sm-12">
                            <div class="card-counter danger">
                                <i class="fa fa-ticket"></i>
                                <span class="count-numbers"><?= $total_transaction ?></span>
                                <span class="count-name">Invoices</span>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="card-counter success">
                                <i class="fa fa-database"></i>
                                <span class="count-numbers"><?= $total_item ?></span>
                                <span class="count-name">Item</span>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="card-counter info">
                                <i class="fa fa-users"></i>
                                <span class="count-numbers"><?= $total_user ?></span>
                                <span class="count-name">Pembeli</span>
                            </div>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-lg-6 col-sm-12">
                            <div class="card">
                                <div class="card-header">Item terlaku di SmartWarung</div>
                                <div class="card-body d-flex flex-column">
                                    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <?php $no = 0;
                                            foreach ($item_terlaku_all as $key) { ?>
                                                <div class="carousel-item <?php if ($no == 0) {
                                                                                echo 'active';
                                                                            } ?>">
                                                    <img class="d-block w-100" src="<?= base_url('assets/uploads/' . $key->photo) ?>" alt="<?= $numbering[$no] ?> slide">
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <h5><?= $key->name ?></h5>
                                                    </div>
                                                </div>
                                            <?php $no++;
                                            } ?>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="card">
                                <div class="card-header">Item Terlaku di Warung Anda</div>
                                <div class="card-body">
                                    <?php foreach ($item_terlaku as $key) { ?>
                                        <div class="p-2 bd-highlight row">
                                            <div class="col-sm-9"><?= $key->name ?></div>
                                            <div class="col-sm-3"><?= $key->total ?></div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('.carousel').carousel({
            interval: 5000
        });
    });
</script>