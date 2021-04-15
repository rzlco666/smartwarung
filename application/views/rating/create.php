<link rel="stylesheet" href="<?php echo base_url('assets_user/css/plugin/star-rating.css')?>">
   <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="#">Home</a></li>
                        <li class="page-breadcrumb__nav active">Ulasan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->

    <!-- ::::::  Start  Main Container Section  ::::::  -->
    <main id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="modal-review-img">
                        <img height="75%" width="75%" class="img-fluid  border-around" src="<?php $photos = explode(',',$item['photo']);echo base_url('assets/uploads/').$photos[0]?>" alt="">
                    </div>
                    <span class="modal__product-title m-t-25"><?php echo $item['name'] ?></span>
                    <div class="product__price m-t-10">
                        <?php
                            if ($item['discount'] > 0) {
                                echo "<span class='product__price-del'>Rp " . number_format($item['price'], 0, ".", ".") . "</span> " . "<span class='product__price-reg'>Rp " . number_format($item['price'] - (($item['discount'] / 100) * $item['price']), 0, ".</span>", ".");
                            } else {
                                echo "<span class='product__price-reg'>Rp " . number_format($item['price'], 0, ".</span>", ".");
                            }
                        ?>
                    </div>
                    <div class="product__desc m-t-15">
                    <p><?php echo $item['description'] ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <h6>Tuliskan Ulasan Anda</h6>
                    <form action="<?php echo site_url('rating/store/').$item['id'] ?>" class="form-box" method="POST">
                        <div class="review-box">
                            <span>Kualitas*</span>
                                <span class="gl-star-rating">
                                    <select name="rating" id="glsr-prebuilt" class="star-rating-prebuilt">
                                        <option value="">Select a rating</option>
                                        <option value="5">Bintang 5</option>
                                        <option value="4">Bintang 4</option>
                                        <option value="3">Bintang 3</option>
                                        <option value="2">Bintang 2</option>
                                        <option value="1">Bintang 1</option>
                                    </select>
                                    <span class="gl-star-rating--stars">
                                        <span data-value="1" class=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="gl-emote" style="pointer-events: none;"><circle class="gl-emote-bg" fill="#FFA98D" cx="12" cy="12" r="10"></circle><path fill="#393939" d="M12 14.6c1.48 0 2.9.38 4.15 1.1a.8.8 0 01-.79 1.39 6.76 6.76 0 00-6.72 0 .8.8 0 11-.8-1.4A8.36 8.36 0 0112 14.6zm4.6-6.25a1.62 1.62 0 01.58 1.51 1.6 1.6 0 11-2.92-1.13c.2-.04.25-.05.45-.08.21-.04.76-.11 1.12-.18.37-.07.46-.08.77-.12zm-9.2 0c.31.04.4.05.77.12.36.07.9.14 1.12.18.2.03.24.04.45.08a1.6 1.6 0 11-2.34-.38z"></path></svg></span>
                                        <span data-value="2" class=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="gl-emote" style="pointer-events: none;"><circle class="gl-emote-bg" fill="#FFC385" cx="12" cy="12" r="10"></circle><path fill="#393939" d="M12 14.8c1.48 0 3.08.28 3.97.75a.8.8 0 11-.74 1.41A8.28 8.28 0 0012 16.4a9.7 9.7 0 00-3.33.61.8.8 0 11-.54-1.5c1.35-.48 2.56-.71 3.87-.71zM15.7 8c.25.31.28.34.51.64.24.3.25.3.43.52.18.23.27.33.56.7A1.6 1.6 0 1115.7 8zM8.32 8a1.6 1.6 0 011.21 2.73 1.6 1.6 0 01-2.7-.87c.28-.37.37-.47.55-.7.18-.22.2-.23.43-.52.23-.3.26-.33.51-.64z"></path></svg></span>
                                        <span data-value="3" class=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="gl-emote" style="pointer-events: none;"><circle class="gl-emote-bg" fill="#FFD885" cx="12" cy="12" r="10"></circle><path fill="#393939" d="M15.33 15.2a.8.8 0 01.7.66.85.85 0 01-.68.94h-6.2c-.24 0-.67-.26-.76-.7-.1-.38.17-.81.6-.9zm.35-7.2a1.6 1.6 0 011.5 1.86A1.6 1.6 0 1115.68 8zM8.32 8a1.6 1.6 0 011.21 2.73A1.6 1.6 0 118.33 8z"></path></svg></span>
                                        <span data-value="4" class=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="gl-emote" style="pointer-events: none;"><circle class="gl-emote-bg" fill="#FFD885" cx="12" cy="12" r="10"></circle><path fill="#393939" d="M15.45 15.06a.8.8 0 11.8 1.38 8.36 8.36 0 01-8.5 0 .8.8 0 11.8-1.38 6.76 6.76 0 006.9 0zM15.68 8a1.6 1.6 0 011.5 1.86A1.6 1.6 0 1115.68 8zM8.32 8a1.6 1.6 0 011.21 2.73A1.6 1.6 0 118.33 8z"></path></svg></span>
                                        <span data-value="5" class=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="gl-emote" style="pointer-events: none;"><circle class="gl-emote-bg" fill="#FFD885" cx="12" cy="12" r="10"></circle><path fill="#393939" d="M16.8 14.4c.32 0 .59.2.72.45.12.25.11.56-.08.82a6.78 6.78 0 01-10.88 0 .78.78 0 01-.05-.87c.14-.23.37-.4.7-.4zM15.67 8a1.6 1.6 0 011.5 1.86A1.6 1.6 0 1115.68 8zM8.32 8a1.6 1.6 0 011.21 2.73A1.6 1.6 0 118.33 8z"></path></svg></span>
                                    </span>
                                </span>
                        </div>
                        <div class="form-box__single-group">
                            <label for="form-review">Ulasan anda*</label>
                            <textarea name="review" id="description" placeholder="Tuliskan ulasan anda tentang produk" rows="5"></textarea>
                        </div>
                        <div class="from-box__buttons d-flex justify-content-between d-flex-warp m-t-25 align-items-center">
                            <div class="from-box__left">
                                <span>* Wajib diisi</span>
                            </div>
                            <div class="form-box-right">
                                <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight" type="submit">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->

<script src="<?php echo base_url('assets_user/js/plugin/star-rating.js?ver=4.1.3')?>"></script>
    <script>
        var destroyed = false;
        var starratingPrebuilt = new StarRating('.star-rating-prebuilt', {
            prebuilt: true,
            maxStars: 5,
        });
        var starrating = new StarRating('.star-rating', {
            stars: function (el, item, index) {
                el.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><rect class="gl-star-full" width="19" height="19" x="2.5" y="2.5"/><polygon fill="#FFF" points="12 5.375 13.646 10.417 19 10.417 14.665 13.556 16.313 18.625 11.995 15.476 7.688 18.583 9.333 13.542 5 10.417 10.354 10.417"/></svg>';
            },
        });
        var starratingOld = new StarRating('.star-rating-old');
        document.querySelector('.toggle-star-rating').addEventListener('click', function () {
            if (!destroyed) {
                starrating.destroy();
                starratingOld.destroy();
                starratingPrebuilt.destroy()
                destroyed = true;
            } else {
                starrating.rebuild();
                starratingOld.rebuild();
                starratingPrebuilt.rebuild()
                destroyed = false;
            }
        });
    </script>