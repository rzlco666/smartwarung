<style type="text/css">
    .card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  }  

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }  

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
  }
</style>  
   <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="#">Home</a></li>
                        <li class="page-breadcrumb__nav active">Dashboard <?php echo $user['name']; ?></li>
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
                                        <a href="#" class="banner__link">
                                            <?php if($user['photo'] == null): ?>
                                            <a href="<?php echo base_url('assets/images/no-photo.png') ?>" class="image-popup"><img src="<?php echo base_url('assets/images/no-photo.png') ?>" class="img-fluid" ></a>
                                            <?php else: ?>
                                                <a href="<?php $photos = explode(',',$user['photo']); echo base_url('assets/uploads/').$photos[0] ?>" class="image-popup mb-3"><img style="width:100%;margin-bottom:10px" src="<?php $photos = explode(',',$user['photo']); echo base_url('assets/uploads/').$photos[0] ?>" class="img-fluid" ></a>
                                                <?php if($this->session->userdata('username')==$user['username']): ?>
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
                            <ul class="sidebar__catagories list-space--small">
                                 <!-- Start Single Menu Collapse List -->
                                <li class="sidebar__menu-collapse-list">
                                    <div class="accordion">
                                        <a href="#" class="accordion__title">Phone    : <?php echo $user['phone'] ?> </a>
                                    </div>
                                </li>  <!-- End Single Menu Collapse List -->
                                <!-- Start Single Menu Collapse List -->
                                <li class="sidebar__menu-collapse-list">
                                    <div class="accordion">
                                        <a href="#" class="accordion__title">E-mail   : <?php echo $user['email'] ?> </a>
                                    </div>
                                </li>  <!-- End Single Menu Collapse List -->
                            </ul>
                        </div>  <!-- End Single Sidebar Widget -->
                          
                    </div>
                </div>  <!-- End Left Sidebar -->

                 <!-- Start Rightside - Content -->
                <div class="col-lg-9">
                    <div class="blog">
                        <div class="row">
                            <!-- Start Single Blog Grid -->
                            <div class="col-md-4">
                                <div class="blog__type-grid">
                                    <div class="blog__img">
                                        <div class="card-counter danger">
                                            <i class="fa fa-ticket"></i>
                                            <span class="count-numbers"><?= $total_transaction ?></span>
                                            <span class="count-name">Total Invoices</span>
                                        </div>
                                    </div>
                                </div> 
                            </div> <!-- End Single Blog Grid -->
                            <!-- Start Single Blog Grid -->
                            <div class="col-md-4">
                                <div class="blog__type-grid">
                                    <div class="blog__img">
                                        <div class="card-counter success">
                                            <i class="fa fa-database"></i>
                                            <span class="count-numbers"><?= $total_item ?></span>
                                            <span class="count-name">Total Item</span>
                                        </div>
                                    </div>
                                </div> 
                            </div> <!-- End Single Blog Grid -->
                            <!-- Start Single Blog Grid -->
                            <div class="col-md-4">
                                <div class="blog__type-grid">
                                    <div class="blog__img">
                                        <div class="card-counter info">
                                            <i class="fa fa-users"></i>
                                            <span class="count-numbers"><?= $total_user ?></span>
                                            <span class="count-name">Total Pembeli</span>
                                        </div>
                                    </div>
                                </div> 
                            </div> <!-- End Single Blog Grid -->
                            <!-- Start Single Blog Grid -->
                            <div class="col-md-6">
                                <div class="blog__type-grid">
                                    <div class="blog__img">
                                        <div class="card">
                                            <div class="card-header">Item Terlaku di SmartWarung</div>
                                            <div class="card-body">
                                                    <div class="p-2 bd-highlight row">
                                                        <div class="col-sm-9"><b>Nama Barang</b></div>
                                                        <div class="col-sm-3"><b>Terjual</b></div>
                                                    </div>
                                                <?php foreach ($item_terlaku_all as $key) { ?>
                                                    <div class="p-2 bd-highlight row">
                                                        <div class="col-sm-9"><?= $key->name ?></div>
                                                        <div class="col-sm-3"><?= $key->total ?></div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div> <!-- End Single Blog Grid -->
                            <!-- Start Single Blog Grid -->
                            <div class="col-md-6">
                                <div class="blog__type-grid">
                                    <div class="blog__img">
                                        <div class="card">
                                            <div class="card-header">Item Terlaku di <?php echo $user['name'] ?></div>
                                            <div class="card-body">
                                                    <div class="p-2 bd-highlight row">
                                                        <div class="col-sm-9"><b>Nama Barang</b></div>
                                                        <div class="col-sm-3"><b>Terjual</b></div>
                                                    </div>
                                                <?php foreach ($item_terlaku as $key) { ?>
                                                    <div class="p-2 bd-highlight row">
                                                        <div class="col-sm-9"><?= $key->name ?></div>
                                                        <div class="col-sm-3"><?= $key->total ?></div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div> <!-- End Single Blog Grid -->
                            <!-- Start Single Blog Grid -->
                            <div class="col-md-6">
                                <div class="blog__type-grid">
                                    <div class="card">
                                        <div class="card-header">Foto Item terlaku di SmartWarung</div>
                                        <div class="card-body d-flex flex-column">
                                            <div class="blog__slider overflow-hidden pos-relative">
                                                <div class="swiper-wrapper">
                                                    <?php $no = 0;
                                                    foreach ($item_terlaku_all as $key) { ?>
                                                        <div class="swiper-slide">
                                                            <div class="d-block w-100"><img class="d-block w-100" src="<?= base_url('assets/uploads/' . $key->photo) ?>" alt=""></div>
                                                            <br><h5 align="center"><?= $key->name ?></h5>
                                                        </div>
                                                    <?php $no++;
                                                    } ?>
                                                </div>
                                                <div class="swiper-buttons">
                                                    <!-- Add Arrows -->
                                                    <div class="swiper-button-next inner__nav inner__nav--next"><i class="far fa-chevron-right"></i></div>
                                                    <div class="swiper-button-prev inner__nav inner__nav--prev"><i class="far fa-chevron-left"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div> <!-- End Single Blog Grid -->
                            <!-- Start Single Blog Grid -->
                            <div class="col-md-6">
                                <div class="blog__type-grid">
                                    <div class="card">
                                        <div class="card-header">Foto Item terlaku di <?php echo $user['name'] ?></div>
                                        <div class="card-body d-flex flex-column">
                                            <div class="blog__slider overflow-hidden pos-relative">
                                                <div class="swiper-wrapper">
                                                    <?php $no = 0;
                                                    foreach ($item_terlaku as $key) { ?>
                                                        <div class="swiper-slide">
                                                            <div class="d-block w-100"><img class="d-block w-100" src="<?= base_url('assets/uploads/' . $key->photo) ?>" alt=""></div>
                                                            <br><h5 align="center"><?= $key->name ?></h5>
                                                        </div>
                                                    <?php $no++;
                                                    } ?>
                                                </div>
                                                <div class="swiper-buttons">
                                                    <!-- Add Arrows -->
                                                    <div class="swiper-button-next inner__nav inner__nav--next"><i class="far fa-chevron-right"></i></div>
                                                    <div class="swiper-button-prev inner__nav inner__nav--prev"><i class="far fa-chevron-left"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div> <!-- End Single Blog Grid -->
                        </div>
                    </div>
                </div>  <!-- Start Rightside - Content -->
                
            </div>
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->