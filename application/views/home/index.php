	<section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image: url(<?php echo base_url('assets/images/') ?>/deliverybg.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-md-12 ftco-animate text-center">
	              <h1 class="mb-2">Gratis Ongkir*</h1>
	              <h2 class="subheading mb-4">*Untuk transaksi pertama</h2>
	              <p><a href="#asd" class="btn btn-primary">Mulai Belanja</a></p>
	            </div>

	          </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image: url(<?php echo base_url('assets/images/') ?>/warungbg.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-sm-12 ftco-animate text-center">
	              <h1 class="mb-2">Daftar Warung Terdekat</h1>
	              <h2 class="subheading mb-4">Semua ada di sini</h2>
	              <p><a href="#asd" class="btn btn-primary">Mulai Belanja</a></p>
	            </div>

	          </div>
	        </div>
	      </div>
	    </div>
    </section>
	<section class="ftco-section" id="asd">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Obral Minggu ini</h2>
			<h5 class="alert alert-info"><?php echo date("d M Y",strtotime($week_sale[0]['date_week_sale']))." s/d ".date("d M Y",strtotime("+7 days",strtotime($week_sale[0]['date_week_sale']))); ?></h5>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
				<?php for($i=0;$i<4;$i++): ?>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="<?php echo site_url('item/show/').$week_sale[$i]['id'] ?>" class="img-prod"><img class="img-fluid" src="<?php $photos = explode(',',$week_sale[$i]['photo']); echo base_url('assets/uploads/').$photos[0]?>" alt="">
    						<!-- <span class="status">30%</span> -->
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#"><?php echo $week_sale[$i]['name'] ?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="mr-2">
									<?php 
                                            if($week_sale[$i]['discount']>0){
                                                echo "<del>Rp " . number_format($week_sale[$i]['price'], 0, ".", ".")."</del> "."Rp " . number_format($week_sale[$i]['price']-(($week_sale[$i]['discount']/100)*$week_sale[$i]['price']), 0, ".", ".") ;
                                            }else{
                                                echo "Rp " . number_format($week_sale[$i]['price'], 0, ".", ".") ;
                                            }
                                            ?>
									</span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
    						</div>
    					</div>
    				</div>
				</div>
				<?php endfor; ?>
    		</div>
    	</div>
				<div class="text-center">
					<a class="btn btn-primary" href="<?=base_url('home/week_sale')?>">Lihat Obral Minggu ini</a>
				</div>
	</section>

    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Warung Terdekat</h2>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
				<?php $count = count($warungs);for($i=0;$i<4;$i++): ?>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
						<a href="<?php echo site_url('profile/show/').$warungs[$i]['username'] ?>" class="img-prod">
						<img class="img-fluid" src="<?php $photos = explode(',',$warungs[$i]['photo']); echo base_url('assets/uploads/').$photos[0]?>" alt="">
    						<span class="status">TERDEKAT!</span>
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3>
								<a href="<?php echo site_url('profile/show/').$warungs[$i]['username'] ?>">
									<?php echo $warungs[$i]['name'] ?>
								</a>
							</h3>
    						<div class="d-flex">
	    					</div>
    					</div>
    				</div>
				</div>
				<?php endfor; ?>
    		</div>
    	</div>
    </section>
<!-- kamar mandi, laundry, kebersihan, makanan,   -->
		<section class="ftco-section ftco-category mt-5 ftco-no-pt">
			<div class="container mt-7">
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-6 order-md-last align-items-stretch d-flex">
								<div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(<?php echo base_url('assets/images/category.jpg') ?>);">
									<div class="heading-section text text-center">
										<h1 style="font-weight: bold;">Kategori</h1>
										<p><a href="<?php echo site_url('category/') ?>" class="btn btn-sm btn-primary">Shop now</a></p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(<?php echo base_url('assets/images/toiletry-drive3.png') ?>);">
									<div class="text px-3 py-1">
										<h2 class="mb-0"><a href="<?php echo site_url('category/show/4') ?>">Kamar Mandi</a></h2>
									</div>
								</div>
								<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(<?php echo base_url('assets/images/100-1003769_laundry-clothes-png-laundry-image-png.png') ?>);">
									<div class="text px-3 py-1">
										<h2 class="mb-0"><a href="<?php echo site_url('category/show/3') ?>">Laundry</a></h2>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(<?php echo base_url('assets/images/cleaning-tools-png-4.png') ?>);">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="<?php echo site_url('category/show/1') ?>">Kebersihan</a></h2>
							</div>		
						</div>
						<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(<?php echo base_url('assets/images/category-1.jpg') ?>);">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="<?php echo site_url('category/show/2') ?>">Makanan</a></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Produk Pilihan</h2>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
				<?php for($i=0;$i<4;$i++): ?>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="<?php echo site_url('item/show/').$items[$i]['id'] ?>" class="img-prod"><img class="img-fluid" src="<?php $photos = explode(',',$items[$i]['photo']); echo base_url('assets/uploads/').$photos[0]?>" alt="">
    						<!-- <span class="status">30%</span> -->
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#"><?php echo $items[$i]['name'] ?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="mr-2">
									<?php 
                                            if($items[$i]['discount']>0){
                                                echo "<del>Rp " . number_format($items[$i]['price'], 0, ".", ".")."</del> "."Rp " . number_format($items[$i]['price']-(($items[$i]['discount']/100)*$items[$i]['price']), 0, ".", ".") ;
                                            }else{
                                                echo "Rp " . number_format($items[$i]['price'], 0, ".", ".") ;
                                            }
                                            ?>
									</span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
    						</div>
    					</div>
    				</div>
				</div>
				<?php endfor; ?>
    		</div>
    	</div>
    </section>
	<?php $this->load->view('home/comment');?>