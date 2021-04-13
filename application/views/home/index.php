    <!-- ::::::  Start  Main Container Section  ::::::  -->
    <main id="main-container" class="main-container m-t-30">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-3 col-xl-3">
                    <!-- menu content -->
                    <div class="header-menu-vertical d-lg-block d-none">
                        <h4 class="menu-title link--icon-left"><i class="far fa-align-left"></i> Semua Kategori</h4>
                        <ul class="menu-content">
                            <?php $categories = $this->categories->get_all();
                                foreach($categories as $category): ?>
                                <li class="menu-item"><a href="<?php echo site_url('category/show/').$category['id'] ?>"><?php echo $category['name'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                        
                    </div>
                    <!-- ::::::  Start Product-Style - Counter Section  ::::::  -->
                    <div class="product product--1 swiper-outside-arrow-hover">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="section-content section-content--border">
                                        <h5 class="section-content__title ">Hot Deals Products</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="swiper-outside-arrow-fix pos-relative">
                                        <div class="product-counter-slider-1grid overflow-hidden m-t-50">
                                            <div class="swiper-wrapper">
                                                <!-- Start Single Counter Product -->
                                                <div class="product__box product__box--counter product__box--border-hover swiper-slide text-center">
                                                    <div class="product__img-box">
                                                        <a href="single-1.html" class="product__img--link">
                                                            <img class="product__img" src="<?php echo base_url('assets_user/') ?>img/product/size-normal/product-home-1-img-1.jpg" alt="">
                                                        </a>

                                                        <div class="product__counter-box">
                                                            <div class="product__counter-item" data-countdown="2021/05/01"></div>
                                                        </div>
                                                        <span class="product__tag product__tag--new">New</span>
                                                        <a href="wishlist.html" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                    </div>
                                                    <div class="product__price m-t-10">
                                                        <span class="product__price-del">$11.90</span>
                                                        <span class="product__price-reg">$10.71</span>
                                                    </div>
                                                    <a href="single-1.html" class="product__link product__link--underline product__link--weight-regular m-t-15">
                                                        SonicFuel Wireless Over-Ear Headphones
                                                    </a>
                                                </div> <!-- End Single Counter Product -->
                                            </div>
                                            <div class="swiper-buttons">
                                                <!-- Add Arrows -->
                                                <div class="swiper-button-next default__nav default__nav--next"><i class="fal fa-chevron-right"></i></div>
                                                <div class="swiper-button-prev default__nav default__nav--prev"><i class="fal fa-chevron-left"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- ::::::  End Product-Style - Counter Section  ::::::  -->

                    <!-- ::::::  Start  Product Style - Segment Section  ::::::  -->
                    <div class="product product--1">
                        <div class="row">
                            <!-- Start Single Segment Area -->
                            <div class="col-12">
                                <div class="swiper-outside-arrow-hover">
                                    <div class="section-content section-content--border">
                                        <h5 class="section-content__title">Produk Pilihan</h5>
                                    </div>

                                    <div class="swiper-outside-arrow-fix pos-relative">
                                        <div class="product-segment-slider-2 overflow-hidden  m-t-50">
                                            <div class="swiper-wrapper">
                                                <!-- Start Single Segment Product -->
                                                <?php for($i=0;$i<9;$i++): ?>
                                                <div class="product__box product__box--segment  swiper-slide">
                                                    <div class="row">
                                                        <div class="col-xl-5 col-lg-12">
                                                            <div class="product__img-box">
                                                            <a href="<?php echo site_url('item/show/').$items[$i]['id'] ?>" class="product__img--link">
                                                                <img class="product__img" src="<?php $photos = explode(',',$items[$i]['photo']); echo base_url('assets/uploads/').$photos[0]?>" alt="">
                                                            </a>
                                                        </div>
                                                        </div>
                                                        <div class="col-xl-7 col-lg-12">
                                                            <div class="product__price m-t-10">
                                                                <?php 
                                                                if($items[$i]['discount']>0){
                                                                    echo "<span class='product__price-del'>Rp " . number_format($items[$i]['price'], 0, ".", ".")."</span> "."<br><span class='product__price-reg'>Rp " . number_format($items[$i]['price']-(($items[$i]['discount']/100)*$items[$i]['price']), 0, ".</span>", ".") ;
                                                                }else{
                                                                    echo "<span class='product__price-reg'>Rp " . number_format($items[$i]['price'], 0, ".</span>", ".") ;
                                                                }
                                                                ?>
                                                            </div>
                                                            <p>
                                                                <?php echo $items[$i]['name'] ?>
                                                            </p>
                                                            <p>
                                                                <?php echo $items[$i]['stock'] ?> Tersedia
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endfor; ?> 
                                                <!-- Start Single Segment Product -->
                                            </div>
                                            <div class="swiper-buttons">
                                                <!-- Add Arrows -->
                                                <div class="swiper-button-next default__nav default__nav--next"><i class="fal fa-chevron-right"></i></div>
                                                <div class="swiper-button-prev default__nav default__nav--prev"><i class="fal fa-chevron-left"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- End Single Segment Area -->
                        </div>
                    </div> <!-- ::::::  Start  Product Style - Segment Section  ::::::  -->

                    <!-- ::::::  Start  Blog News  ::::::  -->
                    <div class="blog blog--2 swiper-outside-arrow-hover">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-content section-content--border d-flex align-items-center justify-content-between">
                                    <h5 class="section-content__title">Latest Blog</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="swiper-outside-arrow-fix pos-relative">
                                    <div class="blog-news blog-news-1grid overflow-hidden  m-t-50">
                                        <div class="swiper-wrapper">
                                            <!-- Single Blog News Item -->
                                            <div class="blog-news__box swiper-slide text-center">
                                                <div class="blog-news__img-box">
                                                    <a href="blog-single-left-sidebar.html" class="blog-news__img--link">
                                                        <img src="<?php echo base_url('assets_user/') ?>img/blog/news/blog-news-home-1-img-1.jpg" alt="" class="blog-news__img">
                                                    </a>
                                                </div>

                                                <div class="blog-news__archive m-t-25">
                                                    <a href="#" class="blog-news__postdate"><i class="far fa-calendar"></i> Oct 29, 2018</a>
                                                    <a href="#" class="blog-news__author"><i class="far fa-user"></i> Jhon Doe</a>
                                                </div>

                                                <a href="blog-single-left-sidebar.html" class="blog-news__link">
                                                    <h5>Vehicula Diam Potenti Imperdiet Placerat Placeat</h5>
                                                </a>
                                            </div> <!-- End Blog News Item -->
                                        </div>
                                        <div class="swiper-buttons">
                                            <!-- Add Arrows -->
                                            <div class="swiper-button-next default__nav default__nav--next"><i class="fal fa-chevron-right"></i></div>
                                            <div class="swiper-button-prev default__nav default__nav--prev"><i class="fal fa-chevron-left"></i></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> <!-- ::::::  End  Blog News   ::::::  -->
                </div>

                <div class="col-lg-9 col-xl-9">
                    <!-- ::::::  Start Hero Section  ::::::  -->
                    <div class="hero hero-slider hero---2">
                        <div class="swiper-wrapper">
                            <!-- Start Hero Image -->
                            <div class="hero-img hero-img--2 swiper-slide" style="background-image: url(<?php echo base_url('assets/images/') ?>/deliverybg.jpg);">
                                <div class="hero__content">
                                    <div class="row">
                                        <div class="col-9 offset-1" align="right">
                                        	<div class="title title--normal title--white title--regular">Gratis Ongkir*</div>
                                            <div class="title title--normal title--white title--thin"></div>
                                            <div class="title title--description title--white">*Untuk transaksi pertama</div>
                                            <a href="single-1.html" class="btn btn--box btn--large btn--blue btn--uppercase btn--weight">Belanja Sekarang</a>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- End Hero Image -->
                            <!-- Start Hero Image -->
                            <div class="hero-img hero-img--2  swiper-slide" style="background-image: url(<?php echo base_url('assets/images/') ?>/warungbg.jpg);">
                                <div class="hero__content">
                                    <div class="row">
                                        <div class="col-9 offset-1">
                                            <div class="title title--normal title--white title--thin">Daftar Warung Terdekat</div>
                                            <div class="title title--description title--white">Semua ada di sini</div>
                                            <a href="single-1.html" class="btn btn--box btn--large btn--blue btn--uppercase btn--weight">Belanja Sekarang</a>
                                        </div>
                                    </div>
                                </div> <!-- End Hero Image -->
                            </div>

                            <!-- Add Pagination -->
                            <div class="swiper-pagination hero__dots hero__dots--2"></div>
                            <!-- Add Arrows -->
                            <div class="swiper-buttons">
                                <!-- Add Arrows -->
                                <div class="swiper-button-next hero__nav hero__nav--next"><i class="far fa-chevron-right"></i></div>
                                <div class="swiper-button-prev hero__nav hero__nav--prev"><i class="far fa-chevron-left"></i></div>
                            </div>
                        </div> <!-- ::::::  End Hero Section  ::::::  -->
                    </div> <!-- ::::::  ENd Hero Section  ::::::  -->

                    <!-- ::::::  Start  Product Style - Default Section [2column]  ::::::  -->
                    <div class="product product--1 swiper-outside-arrow-hover">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-content section-content--border d-md-flex align-items-center justify-content-between">
                                    <h5 class="section-content__title">Electronics Show </h5>
                                    <a href="single-1.html">Show All Products <i class="icon-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="swiper-outside-arrow-fix pos-relative">
                                    <div class="product-default-slider-4grid-2row overflow-hidden  m-t-50">
                                        <div class="swiper-wrapper">
                                            <!-- Start Single Default Product -->
                                            <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                <div class="product__img-box">
                                                    <a href="single-1.html" class="product__img--link">
                                                        <img class="product__img" src="<?php echo base_url('assets_user/') ?>img/product/size-normal/product-home-1-img-1.jpg" alt="">
                                                    </a>

                                                    <a href="#modalAddCart" data-toggle="modal" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Add to cart</a>
                                                    <span class="product__tag product__tag--discount">-12%</span>
                                                    <a href="wishlist.html" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                </div>
                                                <div class="product__price m-t-10">
                                                    <span class="product__price-del">$11.90</span>
                                                    <span class="product__price-reg">$10.71</span>
                                                </div>
                                                <a href="single-1.html" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                    SonicFuel Wireless Over-Ear Headphones
                                                </a>
                                            </div> <!-- End Single Default Product -->
                                            <!-- Start Single Default Product -->
                                            <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                <div class="product__img-box">
                                                    <a href="single-1.html" class="product__img--link">
                                                        <img class="product__img" src="<?php echo base_url('assets_user/') ?>img/product/size-normal/product-home-1-img-2.jpg" alt="">
                                                    </a>

                                                    <a href="#modalAddCart" data-toggle="modal" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Add to cart</a>
                                                    <span class="product__tag product__tag--new">New</span>
                                                    <a href="wishlist.html" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                </div>
                                                <div class="product__price m-t-10">
                                                    <span class="product__price-reg">$10.71</span>
                                                </div>
                                                <a href="single-1.html" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                    SonicFuel Wireless Over-Ear Headphones
                                                </a>
                                            </div> <!-- End Single Default Product -->
                                            <!-- Start Single Default Product -->
                                            <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                <div class="product__img-box">
                                                    <a href="single-1.html" class="product__img--link">
                                                        <img class="product__img" src="<?php echo base_url('assets_user/') ?>img/product/size-normal/product-home-1-img-3.jpg" alt="">
                                                    </a>

                                                    <a href="#modalAddCart" data-toggle="modal" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Add to cart</a>
                                                    <span class="product__tag product__tag--discount">-12%</span>
                                                    <a href="wishlist.html" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                </div>
                                                <div class="product__price m-t-10">
                                                    <span class="product__price-del">$11.90</span>
                                                    <span class="product__price-reg">$10.71</span>
                                                </div>
                                                <a href="single-1.html" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                    SonicFuel Wireless Over-Ear Headphones
                                                </a>
                                            </div> <!-- End Single Default Product -->
                                            <!-- Start Single Default Product -->
                                            <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                <div class="product__img-box">
                                                    <a href="single-1.html" class="product__img--link">
                                                        <img class="product__img" src="<?php echo base_url('assets_user/') ?>img/product/size-normal/product-home-1-img-4.jpg" alt="">
                                                    </a>

                                                    <a href="#modalAddCart" data-toggle="modal" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Add to cart</a>
                                                    <span class="product__tag product__tag--new">New</span>
                                                    <a href="wishlist.html" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                </div>
                                                <div class="product__price m-t-10">
                                                    <span class="product__price-reg">$10.71</span>
                                                </div>
                                                <a href="single-1.html" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                    SonicFuel Wireless Over-Ear Headphones
                                                </a>
                                            </div> <!-- End Single Default Product -->
                                            <!-- Start Single Default Product -->
                                            <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                <div class="product__img-box">
                                                    <a href="single-1.html" class="product__img--link">
                                                        <img class="product__img" src="<?php echo base_url('assets_user/') ?>img/product/size-normal/product-home-1-img-5.jpg" alt="">
                                                    </a>

                                                    <a href="#modalAddCart" data-toggle="modal" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Add to cart</a>
                                                    <span class="product__tag product__tag--discount">-12%</span>
                                                    <a href="wishlist.html" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                </div>
                                                <div class="product__price m-t-10">
                                                    <span class="product__price-del">$11.90</span>
                                                    <span class="product__price-reg">$10.71</span>
                                                </div>
                                                <a href="single-1.html" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                    SonicFuel Wireless Over-Ear Headphones
                                                </a>
                                            </div> <!-- End Single Default Product -->
                                            <!-- Start Single Default Product -->
                                            <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                <div class="product__img-box">
                                                    <a href="single-1.html" class="product__img--link">
                                                        <img class="product__img" src="<?php echo base_url('assets_user/') ?>img/product/size-normal/product-home-1-img-6.jpg" alt="">
                                                    </a>

                                                    <a href="#modalAddCart" data-toggle="modal" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Add to cart</a>
                                                    <span class="product__tag product__tag--new">New</span>
                                                    <a href="wishlist.html" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                </div>
                                                <div class="product__price m-t-10">
                                                    <span class="product__price-reg">$10.71</span>
                                                </div>
                                                <a href="single-1.html" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                    SonicFuel Wireless Over-Ear Headphones
                                                </a>
                                            </div> <!-- End Single Default Product -->
                                            <!-- Start Single Default Product -->
                                            <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                <div class="product__img-box">
                                                    <a href="single-1.html" class="product__img--link">
                                                        <img class="product__img" src="<?php echo base_url('assets_user/') ?>img/product/size-normal/product-home-1-img-7.jpg" alt="">
                                                    </a>

                                                    <a href="#modalAddCart" data-toggle="modal" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Add to cart</a>
                                                    <span class="product__tag product__tag--discount">-12%</span>
                                                    <a href="wishlist.html" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                </div>
                                                <div class="product__price m-t-10">
                                                    <span class="product__price-del">$11.90</span>
                                                    <span class="product__price-reg">$10.71</span>
                                                </div>
                                                <a href="single-1.html" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                    SonicFuel Wireless Over-Ear Headphones
                                                </a>
                                            </div> <!-- End Single Default Product -->
                                            <!-- Start Single Default Product -->
                                            <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                <div class="product__img-box">
                                                    <a href="single-1.html" class="product__img--link">
                                                        <img class="product__img" src="<?php echo base_url('assets_user/') ?>img/product/size-normal/product-home-1-img-8.jpg" alt="">
                                                    </a>

                                                    <a href="#modalAddCart" data-toggle="modal" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Add to cart</a>
                                                    <span class="product__tag product__tag--new">New</span>
                                                    <a href="wishlist.html" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                </div>
                                                <div class="product__price m-t-10">
                                                    <span class="product__price-reg">$10.71</span>
                                                </div>
                                                <a href="single-1.html" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                    SonicFuel Wireless Over-Ear Headphones
                                                </a>
                                            </div> <!-- End Single Default Product -->
                                            <!-- Start Single Default Product -->
                                            <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                <div class="product__img-box">
                                                    <a href="single-1.html" class="product__img--link">
                                                        <img class="product__img" src="<?php echo base_url('assets_user/') ?>img/product/size-normal/product-home-1-img-9.jpg" alt="">
                                                    </a>

                                                    <a href="#modalAddCart" data-toggle="modal" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Add to cart</a>
                                                    <span class="product__tag product__tag--discount">-12%</span>
                                                    <a href="wishlist.html" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                </div>
                                                <div class="product__price m-t-10">
                                                    <span class="product__price-del">$11.90</span>
                                                    <span class="product__price-reg">$10.71</span>
                                                </div>
                                                <a href="single-1.html" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                    SonicFuel Wireless Over-Ear Headphones
                                                </a>
                                            </div> <!-- End Single Default Product -->
                                            <!-- Start Single Default Product -->
                                            <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                <div class="product__img-box">
                                                    <a href="single-1.html" class="product__img--link">
                                                        <img class="product__img" src="<?php echo base_url('assets_user/') ?>img/product/size-normal/product-home-1-img-1.jpg" alt="">
                                                    </a>

                                                    <a href="#modalAddCart" data-toggle="modal" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Add to cart</a>
                                                    <span class="product__tag product__tag--discount">-12%</span>
                                                    <a href="wishlist.html" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                </div>
                                                <div class="product__price m-t-10">
                                                    <span class="product__price-del">$11.90</span>
                                                    <span class="product__price-reg">$10.71</span>
                                                </div>
                                                <a href="single-1.html" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                    SonicFuel Wireless Over-Ear Headphones
                                                </a>
                                            </div> <!-- End Single Default Product -->
                                            <!-- Start Single Default Product -->
                                            <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                <div class="product__img-box">
                                                    <a href="single-1.html" class="product__img--link">
                                                        <img class="product__img" src="<?php echo base_url('assets_user/') ?>img/product/size-normal/product-home-1-img-2.jpg" alt="">
                                                    </a>

                                                    <a href="#modalAddCart" data-toggle="modal" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Add to cart</a>
                                                    <span class="product__tag product__tag--new">New</span>
                                                    <a href="wishlist.html" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                </div>
                                                <div class="product__price m-t-10">
                                                    <span class="product__price-reg">$10.71</span>
                                                </div>
                                                <a href="single-1.html" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                    SonicFuel Wireless Over-Ear Headphones
                                                </a>
                                            </div> <!-- End Single Default Product -->
                                            <!-- Start Single Default Product -->
                                            <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                <div class="product__img-box">
                                                    <a href="single-1.html" class="product__img--link">
                                                        <img class="product__img" src="<?php echo base_url('assets_user/') ?>img/product/size-normal/product-home-1-img-3.jpg" alt="">
                                                    </a>

                                                    <a href="#modalAddCart" data-toggle="modal" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Add to cart</a>
                                                    <span class="product__tag product__tag--discount">-12%</span>
                                                    <a href="wishlist.html" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                </div>
                                                <div class="product__price m-t-10">
                                                    <span class="product__price-del">$11.90</span>
                                                    <span class="product__price-reg">$10.71</span>
                                                </div>
                                                <a href="single-1.html" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                    SonicFuel Wireless Over-Ear Headphones
                                                </a>
                                            </div> <!-- End Single Default Product -->
                                            <!-- Start Single Default Product -->
                                            <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                <div class="product__img-box">
                                                    <a href="single-1.html" class="product__img--link">
                                                        <img class="product__img" src="<?php echo base_url('assets_user/') ?>img/product/size-normal/product-home-1-img-4.jpg" alt="">
                                                    </a>

                                                    <a href="#modalAddCart" data-toggle="modal" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Add to cart</a>
                                                    <span class="product__tag product__tag--new">New</span>
                                                    <a href="wishlist.html" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                </div>
                                                <div class="product__price m-t-10">
                                                    <span class="product__price-reg">$10.71</span>
                                                </div>
                                                <a href="single-1.html" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                    SonicFuel Wireless Over-Ear Headphones
                                                </a>
                                            </div> <!-- End Single Default Product -->
                                            <!-- Start Single Default Product -->
                                            <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                <div class="product__img-box">
                                                    <a href="single-1.html" class="product__img--link">
                                                        <img class="product__img" src="<?php echo base_url('assets_user/') ?>img/product/size-normal/product-home-1-img-5.jpg" alt="">
                                                    </a>

                                                    <a href="#modalAddCart" data-toggle="modal" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Add to cart</a>
                                                    <span class="product__tag product__tag--discount">-12%</span>
                                                    <a href="wishlist.html" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                </div>
                                                <div class="product__price m-t-10">
                                                    <span class="product__price-del">$11.90</span>
                                                    <span class="product__price-reg">$10.71</span>
                                                </div>
                                                <a href="single-1.html" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                    SonicFuel Wireless Over-Ear Headphones
                                                </a>
                                            </div> <!-- End Single Default Product -->
                                            <!-- Start Single Default Product -->
                                            <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                <div class="product__img-box">
                                                    <a href="single-1.html" class="product__img--link">
                                                        <img class="product__img" src="<?php echo base_url('assets_user/') ?>img/product/size-normal/product-home-1-img-6.jpg" alt="">
                                                    </a>

                                                    <a href="#modalAddCart" data-toggle="modal" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Add to cart</a>
                                                    <span class="product__tag product__tag--new">New</span>
                                                    <a href="wishlist.html" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                </div>
                                                <div class="product__price m-t-10">
                                                    <span class="product__price-reg">$10.71</span>
                                                </div>
                                                <a href="single-1.html" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                    SonicFuel Wireless Over-Ear Headphones
                                                </a>
                                            </div> <!-- End Single Default Product -->
                                            <!-- Start Single Default Product -->
                                            <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                <div class="product__img-box">
                                                    <a href="single-1.html" class="product__img--link">
                                                        <img class="product__img" src="<?php echo base_url('assets_user/') ?>img/product/size-normal/product-home-1-img-7.jpg" alt="">
                                                    </a>

                                                    <a href="#modalAddCart" data-toggle="modal" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Add to cart</a>
                                                    <span class="product__tag product__tag--discount">-12%</span>
                                                    <a href="wishlist.html" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                </div>
                                                <div class="product__price m-t-10">
                                                    <span class="product__price-del">$11.90</span>
                                                    <span class="product__price-reg">$10.71</span>
                                                </div>
                                                <a href="single-1.html" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                    SonicFuel Wireless Over-Ear Headphones
                                                </a>
                                            </div> <!-- End Single Default Product -->
                                            <!-- Start Single Default Product -->
                                            <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                <div class="product__img-box">
                                                    <a href="single-1.html" class="product__img--link">
                                                        <img class="product__img" src="<?php echo base_url('assets_user/') ?>img/product/size-normal/product-home-1-img-8.jpg" alt="">
                                                    </a>

                                                    <a href="#modalAddCart" data-toggle="modal" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Add to cart</a>
                                                    <span class="product__tag product__tag--new">New</span>
                                                    <a href="wishlist.html" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                </div>
                                                <div class="product__price m-t-10">
                                                    <span class="product__price-reg">$10.71</span>
                                                </div>
                                                <a href="single-1.html" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                    SonicFuel Wireless Over-Ear Headphones
                                                </a>
                                            </div> <!-- End Single Default Product -->
                                            <!-- Start Single Default Product -->
                                            <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                <div class="product__img-box">
                                                    <a href="single-1.html" class="product__img--link">
                                                        <img class="product__img" src="<?php echo base_url('assets_user/') ?>img/product/size-normal/product-home-1-img-9.jpg" alt="">
                                                    </a>

                                                    <a href="#modalAddCart" data-toggle="modal" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Add to cart</a>
                                                    <span class="product__tag product__tag--discount">-12%</span>
                                                    <a href="wishlist.html" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                </div>
                                                <div class="product__price m-t-10">
                                                    <span class="product__price-del">$11.90</span>
                                                    <span class="product__price-reg">$10.71</span>
                                                </div>
                                                <a href="single-1.html" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                    SonicFuel Wireless Over-Ear Headphones
                                                </a>
                                            </div> <!-- End Single Default Product -->
                                        </div>
                                        <div class="swiper-buttons">
                                            <!-- Add Arrows -->
                                            <div class="swiper-button-next default__nav default__nav--next"><i class="fal fa-chevron-right"></i></div>
                                            <div class="swiper-button-prev default__nav default__nav--prev"><i class="fal fa-chevron-left"></i></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> <!-- ::::::  End  Product Style - Default Section [2column]  ::::::  -->

                    <!-- ::::::  Start banner Section  ::::::  -->
                    <div class="banner banner--1">
                        <div class="row">
                            <div class="col-12">
                                <div class="banner__box">
                                    <a href="single-1.html" class="banner__link">
                                        <img src="<?php echo base_url('assets_user/') ?>img/banner/banner-home-4-img-1.jpg" alt="" class="banner__img">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- ::::::  End banner Section  ::::::  -->

                    <!-- ::::::  Start  Product Style - Default Section  ::::::  -->
                    <div class="product product--1 swiper-outside-arrow-hover">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-content section-content--border d-flex  align-items-center justify-content-between">
                                    <h5 class="section-content__title">Warung Terdekat </h5>
                                    <a href="single-1.html">Lihat semua <i class="icon-chevron-right"></i></a>
                                </div>

                                <div class="swiper-outside-arrow-fix pos-relative">
                                    <div class="product-default-slider-4grid overflow-hidden  m-t-50">
                                        <div class="swiper-wrapper">
                                            <!-- Start Single Default Product -->
                                            <?php $count = count($warungs);for($i=0;$i<4;$i++): ?>
                                            <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                <div class="product__img-box">
                                                    <a href="<?php echo site_url('profile/show/').$warungs[$i]['username'] ?>" class="product__img--link">
                                                        <img class="product__img" src="<?php $photos = explode(',',$warungs[$i]['photo']); echo base_url('assets/uploads/').$photos[0]?>" alt="">
                                                    </a>
                                                    <span class="product__tag product__tag--new">Dekat</span>
                                                </div>
                                                <div class="product__price m-t-10">
                                                    <a href="<?php echo site_url('profile/show/').$warungs[$i]['username'] ?>"><span class="product__price-reg"><?php echo $warungs[$i]['name'] ?></span></a>
                                                </div>
                                                <p class="product__link product__link--underline product__link--weight-light m-t-15">
                                                    <?php 

                                                    $phrase = $warungs[$i]['address'];
                                                    echo implode(' ', array_slice(str_word_count($phrase, 2), 0, 5));

                                                    ?>
                                                </p>
                                            </div>
                                            <?php endfor; ?>
                                            <!-- End Single Default Product -->
                                        </div>
                                        <div class="swiper-buttons">
                                            <!-- Add Arrows -->
                                            <div class="swiper-button-next default__nav default__nav--next"><i class="fal fa-chevron-right"></i></div>
                                            <div class="swiper-button-prev default__nav default__nav--prev"><i class="fal fa-chevron-left"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- ::::::  End  Product Style - Default Section  ::::::  -->
                </div>
                
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- ::::::  Start CMS Section  ::::::  -->
                    <div class="cms cms--1">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-12">
                                <!-- Start Single CMS box -->
                                <div class="cms__content">
                                    <div class="cms__icon">
                                        <img class="cms__icon-img" src="<?php echo base_url('assets_user/') ?>img/icon/cms/icon1.png" alt="">
                                    </div>
                                    <div class="cms__text">
                                        <h6 class="cms__title">Pengiriman Cepat</h6>
                                        <span class="cms__des">Antar langsung pesananmu</span>
                                    </div>
                                </div>
                            </div> <!-- End Single CMS box -->
                            <!-- Start Single CMS box -->
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="cms__content">
                                    <div class="cms__icon">
                                        <img class="cms__icon-img" src="<?php echo base_url('assets_user/') ?>img/icon/cms/icon2.png" alt="">
                                    </div>
                                    <div class="cms__text">
                                        <h6 class="cms__title">Pembayaran Aman</h6>
                                        <span class="cms__des">Bisa bayar ditempat</span>
                                    </div>
                                </div>
                            </div> <!-- End Single CMS box -->
                            <!-- Start Single CMS box -->
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="cms__content">
                                    <div class="cms__icon">
                                        <img class="cms__icon-img" src="<?php echo base_url('assets_user/') ?>img/icon/cms/icon3.png" alt="">
                                    </div>
                                    <div class="cms__text">
                                        <h6 class="cms__title">Belanja Dengan Aman</h6>
                                        <span class="cms__des">Tinggal order tanpa ke warung</span>
                                    </div>
                                </div>
                            </div> <!-- End Single CMS box -->
                            <!-- Start Single CMS box -->
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="cms__content">
                                    <div class="cms__icon">
                                        <img class="cms__icon-img" src="<?php echo base_url('assets_user/') ?>img/icon/cms/icon4.png" alt="">
                                    </div>
                                    <div class="cms__text">
                                        <h6 class="cms__title">Pusat Bantuan 24/7</h6>
                                        <span class="cms__des">Tanya kapan saja</span>
                                    </div>
                                </div>
                            </div> <!-- End Single CMS box -->
                        </div>
                    </div> <!-- ::::::  End CMS Section  ::::::  -->
                </div>
            </div>
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->