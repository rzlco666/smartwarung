   <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="#">Home</a></li>
                        <li class="page-breadcrumb__nav active">Hasil Pencarian</li>
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
                    <h1 class="sidebar__title">Hasil Pencarian</h1>

                    <?php if($this->session->flashdata('errors') != ''): ?>
                    <div class="alert alert-danger text-center" role="alert">
                      <?php echo $this->session->flashdata('errors'); ?>
                    </div>
                    <?php endif; ?>
                    <?php if($this->session->flashdata('success')!= ''): ?>
                    <div class="alert alert-success text-center" role="alert">
                      <?php echo $this->session->flashdata('success') ?>
                    </div>
                    <?php endif; ?>

                    <!-- ::::::  Start Sort Box Section  ::::::  -->
                    <div class="sort-box m-tb-30">
                        <!-- Start Sort Left Side -->
                        <div class="sort-box__left">
                            <div class="sort-box__tab">
                                <ul class="sort-box__tab-list nav">
                                    <li><a class="sort-nav-link active" data-toggle="tab" href="#sort-grid"><i class="icon-grid"></i>  </a></li>
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
                                <!-- Start Single Default Product -->
                                <?php foreach($hasil as $hasil): ?>
                                <div class="product__box product__box--default product__box--border-hover text-center float-left float-4">
                                    <div class="product__img-box">
                                        <a href="<?php echo site_url('item/show/').$hasil['id'] ?>" class="product__img--link">
                                            <img class="product__img" src="<?php $photos = explode(',',$hasil['photo']); echo base_url('assets/uploads/').$photos[0]?>" alt="">
                                        </a>
                                    </div>
                                    <div class="product__price m-t-10">
                                        <?php 
                                            if($hasil['discount']>0){
                                                echo "<span class='product__price-del'>Rp " . number_format($hasil['price'], 0, ".", ".")."</span> "."<span class='product__price-reg'>Rp " . number_format($hasil['price']-(($hasil['discount']/100)*$hasil['price']), 0, ".</span>", ".") ;
                                            }else{
                                                echo "<span class='product__price-reg'>Rp " . number_format($hasil['price'], 0, ".</span>", ".") ;
                                            }
                                        ?>
                                    </div>
                                    <a href="single-1.html" class="product__link product__link--underline product__link--weight-light m-t-15">
                                        <?php echo $hasil['name'] ?>
                                    </a>
                                </div> <!-- End Single Default Product -->
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
                </div>  <!-- Start Rightside - Content -->
            </div>
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->