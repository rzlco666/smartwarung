   <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="#">Home</a></li>
                        <li class="page-breadcrumb__nav active">Detail Produk</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->

    <!-- ::::::  Start  Main Container Section  ::::::  -->
    <main id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <!-- Start Product Details Gallery -->
                <div class="col-12">
                    <div class="product-details">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery-box m-b-60">
                                <?php $photos = explode(',', $item['photo']);
                                foreach ($photos as $photo) : ?>
                                    <div class="product-image--large overflow-hidden">
                                        <img class="img-fluid" id="img-zoom" src="<?php echo base_url('assets/uploads/') . $photo ?>" data-zoom-image="<?php echo base_url('assets/uploads/') . $photo ?>" alt="">
                                    </div>
                                    <div class="pos-relative m-t-30">
                                        <div id="gallery-zoom" class="product-image--thumb product-image--thumb-horizontal overflow-hidden swiper-outside-arrow-hover m-lr-30">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <a class="zoom-active" data-image="<?php echo base_url('assets/uploads/') . $photo ?>" data-zoom-image="<?php echo base_url('assets/uploads/') . $photo ?>">
                                                        <img class="img-fluid" src="<?php echo base_url('assets/uploads/') . $photo ?>" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-buttons">
                                            <!-- Add Arrows -->
                                            <div class="swiper-button-next gallery__nav gallery__nav--next"><i class="fal fa-chevron-right"></i></div>
                                            <div class="swiper-button-prev gallery__nav gallery__nav--prev"><i class="fal fa-chevron-left"></i></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product-details-box">
                                    <h5 class="section-content__title"><?php echo $item['name'] ?></h5>
                                    <span class="text-reference">Warung: <a href="<?php echo site_url('profile/show/') . $warung['username'] ?>"><?php echo $warung['name'] ?></a></span>
                                    <div class="review-box">
                                        <ul class="product__review m-t-10 m-b-15">
                                            <li class="product__review--fill"><i class="icon-star"></i> <?php echo round($rating['rating'], 1) ?></li>
                                        </ul>
                                    </div>
                                    <div class="product__price">
                                        <?php
                                        if ($item['discount'] > 0) {
                                            echo "<span class='product__price-del'>Rp " . number_format($item['price'], 0, ".", ".") . "</span> " . "<span class='product__price-reg'>Rp " . number_format($item['price'] - (($item['discount'] / 100) * $item['price']), 0, ".</span>", ".");
                                        } else {
                                            echo "<span class='product__price-reg'>Rp " . number_format($item['price'], 0, ".</span>", ".");
                                        }
                                        ?>
                                    </div>
                                    <div class="product__desc m-t-25 m-b-30">
                                        <p><?php echo $item['description'] ?> </p>
                                    </div>
                                    <div class="product-var p-t-30">
                                        <div class="product-size product-var__item">
                                            <span class="product-var__text">Stok</span>
                                            <p><?php echo $item['stock'] ?> tersedia</p>
                                        </div>
                                        <div class="product-color product-var__item">
                                            <button type="button" style="background-color: white; color: orange;" class="btn--white" data-toggle="modal" data-target="#priceListModal">
                                                Bandingkan Harga Produk Serupa
                                            </button>
                                        </div>
                                        <?php if ($this->session->userdata('role') == '0') : ?>
                                        <div class="product-quantity product-var__item">
                                        <form id="target" action="<?php echo site_url('cart/store/') . $item['id'] ?>" method="post">
                                            <span class="product-var__text">Jumlah</span>
                                            <div class="product-quantity-box">
                                                <div class="quantity">
                                                    <input type="number" id="quantity" name="quantity" min="1" max="100" step="1" value="1">
                                                </div>
                                                    <input type="submit" class="btn btn--box btn--small btn--blue btn--uppercase btn--weight m-l-20" value="Tambahkan ke keranjang">
                                                <!-- <a href="#modalAddCart" data-toggle="modal" data-dismiss="modal" class="btn btn--box btn--small btn--blue btn--uppercase btn--weight m-l-20">Tambahkan ke keranjang</a> -->
                                            </div>
                                        </form>
                                        </div>
                                        <?php else : ?>
                                        <div class="product-quantity product-var__item">
                                        <form id="target" action="<?php echo site_url('cart/store/') . $item['id'] ?>" method="post">
                                            <span class="product-var__text">Jumlah</span>
                                            <div class="product-quantity-box">
                                                <div class="quantity">
                                                    <input type="number" id="quantity" name="quantity" min="1" max="100" step="1" value="1">
                                                </div>
                                                    <button type="button" class="btn btn--box btn--small btn--blue btn--uppercase btn--weight m-l-20" onclick="pop()">Tambahkan ke keranjang</button>
                                                    <script type="text/javascript">
                                                        function pop() {
                                                        alert("Anda harus login terlebih dahulu");
                                                        window.open("<?php echo base_url('auth/login') ?>");
                                                        }
                                                    </script>
                                                <!-- <a href="#modalAddCart" data-toggle="modal" data-dismiss="modal" class="btn btn--box btn--small btn--blue btn--uppercase btn--weight m-l-20">Tambahkan ke keranjang</a> -->
                                            </div>
                                        </form>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="product-links ">
                                        <div class="product-social m-tb-30">
                                            <span>Share</span>
                                            <ul class="product-social-link">
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                                <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div><!-- End Product Details Gallery -->
                
                <!-- Start Product Details Tab -->
                <div class="col-12">
                    <div class="product product--1 border-around product-details-tab-area">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-content--border">
                                    <ul class="tablist tablist--style-black tablist--style-title tablist--style-gap-70 nav">
                                        <li><a class="nav-link active" data-toggle="tab" href="#product-desc">Deskripsi Lengkap</a></li>
                                        <li><a class="nav-link" data-toggle="tab" href="#product-dis">Warung</a></li>
                                        <li><a class="nav-link" data-toggle="tab" href="#product-review">Reviews</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12">
                            <div class="product-details-tab-box m-t-50">
                                <div class="tab-content">
                                    <!-- Start Tab - Product Description -->
                                    <div class="tab-pane show active" id="product-desc">
                                        <div class="para__content">
                                            <p class="para__text"><?php echo $item['description'] ?> </p>
                                        </div>    
                                    </div>  <!-- End Tab - Product Description -->

                                    <!-- Start Tab - Product Details -->
                                    <div class="tab-pane" id="product-dis">
                                        <div class="product-dis__content">
                                            <a href="<?php echo site_url('profile/show/') . $warung['username'] ?>" class="product-dis__img m-b-30"><img height="20%" width="20%" src="<?php echo base_url('assets/uploads/') ?><?php echo $warung['photo'] ?>" alt=""></a>
                                            <span>Nama Warung : <a href="<?php echo site_url('profile/show/') . $warung['username'] ?>"><?php echo $warung['name'] ?></a></span>
                                        </div>
                                    </div>  <!-- End Tab - Product Details -->
                                     <!-- Start Tab - Product Review -->
                                    <div class="tab-pane " id="product-review">
                                        <!-- Start - Review Comment -->
                                        <ul class="comment">
                                        <?php if ($reviews == null) : ?>
                                        <h6>Belum ada ulasan.</h6>
                                        <?php endif ?>
                                        <?php foreach ($reviews as $review) : ?>
                                            <!-- Start - Review Comment list-->
                                            <li class="comment__list">
                                                <div class="comment__wrapper">
                                                    <div class="comment__img">
                                                        <?php
                                                        $tamp = $review['photo'];
                                                        if (empty($tamp)) {
                                                        ?>
                                                            <img src="<?php echo base_url('assets_user/') ?>img/user/image-1.png" alt="">
                                                        <?php
                                                        }else{
                                                        ?>
                                                            <img height="20%" width="20%" src="<?php echo base_url('assets/uploads/') ?><?php echo $review['photo'] ?>" alt="">
                                                        <?php
                                                        }
                                                        ?> 
                                                    </div>
                                                    <div class="comment__content">
                                                        <div class="comment__content-top">
                                                            <div class="comment__content-left">
                                                                <h6 class="comment__name"><?php echo $review['name'] ?></h6>
                                                                <ul class="product__review">
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="para__content">
                                                            <p class="para__text"><?php echo $review['review'] ?> </p>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                            </li> <!-- End - Review Comment list-->
                                        <?php endforeach ?>
                                        </ul>  <!-- End - Review Comment -->

                                        <!--<a href="#modalReview" data-toggle="modal" class="btn btn--box btn--small btn--blue btn--uppercase btn--weight m-t-30">Write a review</a> -->
                                    </div>  <!-- Start Tab - Product Review -->
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>  <!-- End Product Details Tab -->

                <div class="col-12">
                    <!-- ::::::  Start  Product Style - Default Section  ::::::  -->
                    <div class="product product--1 swiper-outside-arrow-hover">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-content section-content--border d-flex align-items-center justify-content-between">
                                    <h5 class="section-content__title">Produk lain di <a href="<?php echo site_url('profile/show/') . $warung['username'] ?>"><?php echo $warung['name'] ?></a> : </h5>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="swiper-outside-arrow-fix pos-relative">
                                    <div class="product-default-slider-5grid overflow-hidden  m-t-50">
                                        <div class="swiper-wrapper">
                                            <?php foreach ($list_warung as $key) { ?>
                                            <!-- Start Single Default Product -->
                                            <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                <div class="product__img-box">
                                                    <a href="<?php echo site_url('item/show/') . $key->id ?>" class="product__img--link">
                                                        <img class="product__img" src="<?php $photos = explode(',', $key->photo);echo base_url('assets/uploads/') . $photos[0] ?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="product__price m-t-10">
                                                    <?php echo "<span class='product__price-reg'>Rp " . number_format($key->price, 0, ".</span>", ".") ?>
                                                </div>
                                                <a href="<?php echo site_url('item/show/') . $key->id ?>" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                    <?php echo $key->name ?></a>
                                                </a>
                                            </div> 
                                            <!-- End Single Default Product -->
                                            <?php } ?>
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
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->
    
    <!-- Start Modal Review cart -->
    <div class="modal fade" id="modalReview" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title text-center">WRITE YOUR REVIEW</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-6">
                                <div class="modal-review-img">
                                    <img class="img-fluid  border-around" src="<?php echo base_url('assets_user/') ?>img/product/size-large/product-home-1-lg-img-1.jpg" alt="">
                                </div>
                                <span class="modal__product-title m-t-25">SonicFuel Wireless Over-Ear Headphones</span>
                                <div class="product__desc m-t-15">
                                    <p>The ATH-S700BT offers clear, full-bodied audio reproduction with Bluetooth® wireless operation. The headphones are equipped with a mic, and music and volume controls, allowing you to ...</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6>Write Your Review</h6>
                                <div class="review-box">
                                    <span>Quality</span>
                                    <ul class="product__review">
                                        <li class="product__review--fill"><i class="icon-star"></i></li>
                                        <li class="product__review--fill"><i class="icon-star"></i></li>
                                        <li class="product__review--fill"><i class="icon-star"></i></li>
                                        <li class="product__review--fill"><i class="icon-star"></i></li>
                                        <li class="product__review--blank"><i class="icon-star"></i></li>
                                    </ul>
                                </div>
                                <form action="#" method="post" class="form-box">
                                    <div class="form-box__single-group">
                                        <label for="form-message">Title for your review*</label>
                                        <input type="text" id="form-message">
                                    </div>
                                    <div class="form-box__single-group">
                                        <label for="form-review">Your review*</label>
                                        <textarea id="form-review" rows="5"></textarea>
                                    </div>
                                    <div class="form-box__single-group">
                                        <label for="form-name">Your name*</label>
                                        <input type="text" id="form-name">
                                    </div>
                                    <div class="from-box__buttons d-flex justify-content-between d-flex-warp m-t-25 align-items-center">
                                        <div class="from-box__left">
                                            <span>* Required fields</span>
                                        </div>
                                        <div class="form-box-right">
                                            <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight" type="submit">Send</button>
                                            or
                                            <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Modal Quickview cart -->

    <!-- Modal -->
<div class="modal fade" id="priceListModal" tabindex="-1" role="dialog" aria-labelledby="priceListModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="priceListModalTitle">Perbandingkan Harga Produk Serupa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <?php foreach ($list_like as $key) { ?>
                        <div class="col-md-6 col-lg-6 ftco-animate">
                            <div class="product text-center">
                                <a href="<?php echo site_url('item/show/') . $key->id ?>" class="img-prod"><img width="50%" height="50%" class="img-fluid" src="<?php $photos = explode(',', $key->photo);
                                    echo base_url('assets/uploads/') . $photos[0] ?>" alt="">
                                    <!-- <span class="status">30%</span> -->
                                    <div class="overlay"></div>
                                </a>
                                <div class="text py-3 pb-4 px-3 text-center">
                                    <h3><a href="<?php echo site_url('item/show/') . $key->id ?>"><?php echo $key->name ?></a></h3>
                                        <p><?=$key->warung?></p>
                                        <div class="pricing">
                                            <p class="price text-center"><span class="mr-2"><?php echo "Rp " . number_format($key->price, 0, ".", ".") ?></span></p>
                                        </div>
                                    <div class="bottom-area d-flex px-3 text-center">
                                        <!-- <p class=""><span class="text-info text-center"><?php echo "Rp " . number_format($key->price, 0, ".", ".") ?></span></p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
