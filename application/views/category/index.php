<section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					<li><a href=""  class="active">All</a></li>
                    <?php foreach ($categories as $category): ?>
    					<li><a href="<?php echo site_url('category/show/').$category['id'] ?>"><?php echo $category['name'] ?></a></li>
                    <?php endforeach; ?>
    				</ul>
    			</div>
    		</div>
    		<div class="row">
            <?php foreach($items as $item): ?>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="<?php echo site_url('item/show/').$item['id'] ?>" class="img-prod"><img class="img-fluid" src="<?php $photos = explode(',',$item['photo']); echo base_url('assets/uploads/').$photos[0]?>" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
						<!-- <?php print_r($item)?> -->
    						<h3><a href="<?php echo site_url('item/show/').$item['id'] ?>"><?php echo $item['name'] ?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span><?php echo "Rp ".number_format($item['price'], 0, ".", ".") ?></span></p>
		    					</div>
	    					</div>
    						<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
			<?php endforeach; ?>
    		</div>
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
    	</div>
    </section>