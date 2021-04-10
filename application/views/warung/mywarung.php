
<?php include APPPATH . 'views/admin/style_card.php'; ?>
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
                        <span class="count-numbers"><?=$total_warung?></span>
                        <span class="count-name">Warung</span>
                    </div>
                </div> -->

                <div class="col-md-4 col-sm-12">
                <div class="card-counter danger">
                    <i class="fa fa-ticket"></i>
                    <span class="count-numbers"><?=$total_transaction?></span>
                    <span class="count-name">Invoices</span>
                </div>
                </div>

                <div class="col-md-4 col-sm-12">
                <div class="card-counter success">
                    <i class="fa fa-database"></i>
                    <span class="count-numbers"><?=$total_item?></span>
                    <span class="count-name">Item</span>
                </div>
                </div>

                <div class="col-md-4 col-sm-12">
                <div class="card-counter info">
                    <i class="fa fa-users"></i>
                    <span class="count-numbers"><?=$total_user?></span>
                    <span class="count-name">Pembeli</span>
                </div>
                </div>
                </div>
                <div class="row m-2">
                    <div class="col-lg-6 col-sm-12">
                        <div class="card">
                            <div class="card-header">Pembeli Tersering</div>
                            <div class="card-body d-flex flex-column">
                                <?php foreach ($pembeli_tersering as $key) {?>
                                    <div class="p-2 bd-highlight row">
                                        <div class="col-sm-9"><?=$key->user?></div>
                                        <div class="col-sm-3"><?=$key->total?></div>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="card">
                            <div class="card-header">Item Terlaku</div>
                            <div class="card-body">
                                <?php foreach ($item_terlaku as $key) {?>
                                    <div class="p-2 bd-highlight row">
                                        <div class="col-sm-9"><?=$key->name?></div>
                                        <div class="col-sm-3"><?=$key->total?></div>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
			</div>
		</div>
	</div>
</section>