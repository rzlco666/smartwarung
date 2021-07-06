   <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="#">Home</a></li>
                        <li class="page-breadcrumb__nav active">Obral Mingguan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->

    <!-- ::::::  Start  Main Container Section  ::::::  -->
    <main id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                 <!-- Start Rightside - Content -->
                <div class="col-12">
                    <h1 class="sidebar__title">Obral Minggu Ini (<?php echo date("d M Y",strtotime($week_sale[0]['date_week_sale']))." s/d ".date("d M Y",strtotime("+7 days",strtotime($week_sale[0]['date_week_sale']))); ?>)</h1>

                    <!-- ::::::  Start Sort Box Section  ::::::  -->
                    <div class="sort-box m-tb-30">
                        <!-- Start Sort Left Side -->
                        <div class="sort-box__left">
                            <div class="sort-box__tab">
                                <ul class="sort-box__tab-list nav">
                                    <li><a class="sort-nav-link active" data-toggle="tab" href="#sort-grid"><i class="icon-grid"></i>  </a></li>
                                    <li><a class="sort-nav-link" data-toggle="tab" href="#sort-list"><i class="icon-list"></i></a></li>
                                </ul>
                            </div>
                            <span>There Are 5 Products.</span>
                        </div> <!-- Start Sort Left Side -->

                        <div class="sort-box__right">
                            <span>Sort By:</span>
                            <div class="sort-box__option">
                                <label class="select-sort__arrow">
                                    <select name="select-sort" class="select-sort">
                                        <option value="1">Relevance</option>
                                        <option value="2">Name, A to Z</option>
                                        <option value="3"> Name, Z to A </option>
                                        <option value="4"> Price, low to high</option>
                                        <option value="5">Price, high to low</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div> <!-- ::::::  Start Sort Box Section  ::::::  -->

                    <div class="product-tab-area">
                        <div class="tab-content ">
                            <div class="tab-pane show active clearfix" id="sort-grid">
                                <!-- Start Single Default Product -->
                                <?php for($i=0;$i<count($week_sale);$i++): ?>
                                <div class="product__box product__box--default product__box--border-hover text-center float-left float-4">
                                    <div class="product__img-box">
                                        <a href="<?php echo site_url('item/show/').$week_sale[$i]['id'] ?>" class="product__img--link">
                                            <img class="product__img" src="<?php $photos = explode(',',$week_sale[$i]['photo']); echo base_url('assets/uploads/').$photos[0]?>" alt="">
                                        </a>

                                        <div class="product__counter-box">
                                            <div class="product__counter-item" data-countdown="<?php echo date('Y/m/d',strtotime('+7 days',strtotime($week_sale[0]['date_week_sale']))); ?>"></div>
                                        </div>
                                    </div>
                                    <div class="product__price m-t-10">
                                        <?php 
                                            if($week_sale[$i]['discount']>0){
                                                echo "<span class='product__price-del'>Rp " . number_format($week_sale[$i]['price'], 0, ".", ".")."</span> "."<span class='product__price-reg'>Rp " . number_format($week_sale[$i]['price']-(($week_sale[$i]['discount']/100)*$week_sale[$i]['price']), 0, ".</span>", ".") ;
                                                }else{
                                                    echo "Rp " . number_format($week_sale[$i]['price'], 0, ".", ".") ;
                                                }
                                        ?>
                                    </div>
                                    <a href="<?php echo site_url('item/show/').$week_sale[$i]['id'] ?>" class="product__link product__link--underline product__link--weight-light m-t-15">
                                        <?php echo $week_sale[$i]['name'] ?>
                                    </a>
                                </div> <!-- End Single Default Product -->
                                <?php endfor; ?>
                            </div>
                            <div class="tab-pane shop-list" id="sort-list">
                                <!-- Start Single List Product -->
                                <?php for($i=0;$i<count($week_sale);$i++): ?>
                                <div class="product__box product__box--list">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="product__img-box">
                                                <a href="<?php echo site_url('item/show/').$week_sale[$i]['id'] ?>" class="product__img--link">
                                                    <img class="product__img" src="<?php $photos = explode(',',$week_sale[$i]['photo']); echo base_url('assets/uploads/').$photos[0]?>" alt="">
                                                </a>
                                                <div class="product__counter-box">
                                                    <div class="product__counter-item" data-countdown="<?php echo date('Y/m/d',strtotime('+7 days',strtotime($week_sale[0]['date_week_sale']))); ?>"></div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-8 pos-relative">
                                            <div class="border-right pos-absolute"></div>
                                            <div class="product__price">
                                                <?php 
                                                    if($week_sale[$i]['discount']>0){
                                                        echo "<span class='product__price-del'>Rp " . number_format($week_sale[$i]['price'], 0, ".", ".")."</span> "."<span class='product__price-reg'>Rp " . number_format($week_sale[$i]['price']-(($week_sale[$i]['discount']/100)*$week_sale[$i]['price']), 0, ".</span>", ".") ;
                                                        }else{
                                                            echo "Rp " . number_format($week_sale[$i]['price'], 0, ".", ".") ;
                                                        }
                                                ?>
                                            </div>
                                            <a href="<?php echo site_url('item/show/').$week_sale[$i]['id'] ?>" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                <?php echo $week_sale[$i]['name'] ?>
                                            </a>
                                        </div>
                                    </div>
                                </div> <!-- Start Single List Product -->
                                <?php endfor; ?>                                
                            </div>
                        </div>
                    </div>

                    <div class="page-pagination">
                        <span>Showing 1-12 of 13 item(s)</span>
                        <ul class="page-pagination__list">
                            <li class="page-pagination__item">
                              <a class="page-pagination__link btn btn--gray"  href="#"><i class="icon-chevron-left"></i> Previous</a>
                            </li>
                            <li class="page-pagination__item"><a class="page-pagination__link active btn btn--gray"  href="#">1</a></li>
                            <li class="page-pagination__item"><a class="page-pagination__link btn btn--gray"  href="#">2</a></li>
                            <li class="page-pagination__item">
                              <a class="page-pagination__link btn btn--gray"  href="#">Next<i class="icon-chevron-right"></i></a>
                            </li>
                          </ul>
                    </div>
                </div>  <!-- Start Rightside - Content -->
            </div>
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->