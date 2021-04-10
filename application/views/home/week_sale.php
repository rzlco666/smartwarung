<section class="ftco-section">
    	<div class="container">
			<h3 class="text-center">Obral Minggu ini</h3>
			<h5 class="text-center alert alert-info"><?php echo date("d M Y",strtotime($week_sale[0]['date_week_sale']))." s/d ".date("d M Y",strtotime("+7 days",strtotime($week_sale[0]['date_week_sale']))); ?></h5>
    		<!-- <div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					<li><a href=""  class="active">All</a></li>
                    <?php foreach ($categories as $category): ?>
    					<li><a href="<?php echo site_url('category/show/').$category['id'] ?>"><?php echo $category['name'] ?></a></li>
                    <?php endforeach; ?>
    				</ul>
    			</div>
    		</div> -->
    		<div class="row">
            <?php for($i=0;$i<count($week_sale);$i++): ?>
    			<div class="col-md-6 col-lg-4 ftco-animate">
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