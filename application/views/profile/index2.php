   <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="#">Home</a></li>
                        <li class="page-breadcrumb__nav active">Warung</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->

    <!-- ::::::  Start  Main Container Section  ::::::  -->
    <main id="main-container" class="main-container">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <!-- Start Leftside - Sidebar -->
                <div class="col-lg-3">

                    <div class="sidebar">

                        <!-- ::::::  Start banner Section  ::::::  -->
                        <div class="sidebar__widget banner">
                            <div class="row">
                                <div class="col-12">
                                    <div class="banner__box">
                                        <a href="single-1.html" class="banner__link">
                                            <?php if($user['photo'] == null): ?>
                                            <img src="<?php echo base_url('assets_user/') ?>img/banner/banner-shop-1-img-2.jpg"  alt="" class="banner__img">
                                            <?php else: ?>
                                            <img src="<?php $photos = explode(',',$user['photo']); echo base_url('assets/uploads/').$photos[0] ?>"  alt="" class="banner__img">
                                                <?php if($this->session->userdata('username')==$user['username']): ?>
                                                    <a class="btn btn-sm btn-primary py-2 px-5 text-black" style="margin-left: 20%" data-toggle="modal" data-target="#modal-photo">Ganti foto profile</a>
                                                <?php endif ?>
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- ::::::  End banner Section  ::::::  -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar__widget gray-bg">
                            <div class="sidebar__box">
                                <h5 class="sidebar__title"><?php echo $user['name'] ?></h5>
                            </div>
                            <ul class="sidebar__menu-collapse">
                                 <!-- Start Single Menu Collapse List -->
                                <li class="sidebar__menu-collapse-list">
                                    <div class="accordion">
                                        <p>Phone    : <?php echo $user['phone'] ?></p>
                                        <p>E-mail   : <?php echo $user['email'] ?></p>
                                        <?php if($this->session->userdata('username')==$user['username']): ?>
                                            <?php if($this->session->userdata('role') == 1): ?>
                                                <p id="status" class="col-md-4 text-center"></p>
                                            <?php endif; ?>
                                            <a class="btn btn-sm btn-warning py-2 px-3 text-dark" href="<?php echo site_url('profile/edit/').$user['username'] ?>">Ubah profile</a>
                                            
                                            <a class="btn btn-sm btn-secondary py-2 px-3 text-white" data-toggle="modal" data-target="#modal-password">Ganti password</a>

                                        <?php endif; ?>
                                            <?php if($user['role']==1): ?>
                                                    <p id="address">E-mail   : </p>
                                            <?php endif; ?>
                                    </div>
                                </li>  <!-- End Single Menu Collapse List -->
                            </ul>
                        </div>  <!-- End Single Sidebar Widget -->

                    </div>
                </div>  <!-- End Left Sidebar -->

                 <!-- Start Rightside - Content -->
                <div class="col-lg-9">
                    <h1 class="sidebar__title">Etalase Warung</h1>

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
                            <span>There Are 13 Products.</span>
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
                                <?php foreach ($items as $item) : ?>
                                <!-- Start Single Default Product -->
                                <div class="product__box product__box--default product__box--border-hover text-center float-left float-3">
                                    <div class="product__img-box">
                                        <a href="<?php echo site_url('item/show/').$item['id'] ?>" class="product__img--link">
                                            <img class="product__img" src="<?php $photos = explode(',', $item['photo']);echo base_url('assets/uploads/') . $photos[0] ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="product__price m-t-10">
                                        <?php 
                                            if($item['discount']>0){
                                                echo "<span class='product__price-del'>Rp " . number_format($item['price'], 0, ".", ".")."</span> "."<span class='product__price-reg'>Rp " . number_format($item['price']-(($item['discount']/100)*$item['price']), 0, ".</span>", ".") ;
                                            }else{
                                                echo "<span class='product__price-reg'>Rp " . number_format($item['price'], 0, ".</span>", ".") ;
                                            }
                                        ?>
                                    </div>
                                    <a href="<?php echo site_url('item/show/').$item['id'] ?>" class="product__link product__link--underline product__link--weight-light m-t-15">
                                        <?php echo $item['name'] ?>
                                    </a>
                                </div> <!-- End Single Default Product -->
                                <?php endforeach; ?>  
                            </div>
                            <div class="tab-pane shop-list" id="sort-list">
                                <?php foreach ($items as $item) : ?>
                                <!-- Start Single List Product -->
                                <div class="product__box product__box--list">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="product__img-box">
                                                <a href="<?php echo site_url('item/show/').$item['id'] ?>" class="product__img--link">
                                                    <img class="product__img" src="<?php $photos = explode(',', $item['photo']);echo base_url('assets/uploads/') . $photos[0] ?>" alt="">
                                                </a>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-8 pos-relative">
                                            <div class="border-right pos-absolute"></div>
                                            <div class="product__price">
                                                <?php 
                                                    if($item['discount']>0){
                                                        echo "<span class='product__price-del'>Rp " . number_format($item['price'], 0, ".", ".")."</span> "."<span class='product__price-reg'>Rp " . number_format($item['price']-(($item['discount']/100)*$item['price']), 0, ".</span>", ".") ;
                                                    }else{
                                                        echo "<span class='product__price-reg'>Rp " . number_format($item['price'], 0, ".</span>", ".") ;
                                                    }
                                                ?>
                                            </div>
                                            <a href="<?php echo site_url('item/show/').$item['id'] ?>" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                <?php echo $item['name'] ?>
                                            </a>
                                            <div class="product__desc m-t-25 m-b-30">
                                                <p><?php echo $item['description'] ?></p>
                                                <p>Potongan : <?php echo $item['discount'] ?>%</p>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- Start Single List Product -->
                                <?php endforeach; ?>
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

                    <!-- ::::::  Start banner Section  ::::::  -->
                    <div class="banner">
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <div class="banner__box">
                                    <h1 class="sidebar__title">Alamat Warung</h1>
                                    <div id="map" class="mb-3" style="width: 100%;height:300px;"></div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- ::::::  End banner Section  ::::::  -->

                </div>  <!-- Start Rightside - Content -->
                
            </div>
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->