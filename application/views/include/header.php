<body>

    <!-- ::::::  Start  Header Section  ::::::  -->
    <header>
        <!-- ::::::  Start Large Header Section  ::::::  -->
        <div class="header header--1">

            <!-- Start Header Middle area -->
            <div class="header__middle header__top--style-1 p-tb-30">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="header__logo">
                                <a href="<?php echo base_url('') ?>" class="header__logo-link">
                                    <img src="<?php echo base_url('assets_user/') ?>img/logo/logo-color.png" height="50%" width="50%" alt="" class="header__logo-img">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row align-items-center">
                                <div class="col-lg-10">
                                    <form class="header__search-form" action="#">
                                        <div class="header__search-category">
                                            <select class="bootstrap-select" name="poscats">
                                                <option value="0">Semua kategori</option>
                                                <?php $categories = $this->categories->get_all();
                                                foreach($categories as $category): ?>
                                                <option value="<?php echo $category['id'] ?>">
                                                    <?php echo $category['name'] ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="header__search-input">
                                            <input type="search" placeholder="Masukkan kata pencarian">
                                            <button class="btn btn--submit btn--blue btn--uppercase btn--weight " type="submit">Telusuri</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-2">
                                    <div class="header__wishlist-box">
                                        <!-- Start Header Wishlist Box -->
                                        <div class="header__wishlist pos-relative">
                                            <?php if($this->session->userdata('role') == ""): ?>
                                            <div class="user-info user-set-role">
                                                <a class="user-set-role__button" href="#" data-toggle="dropdown" aria-haspopup="true"><i class="icon-user"></i> </a>
                                                <ul class="expand-dropdown-menu dropdown-menu">
                                                    <li><a href="<?php echo base_url('auth/login') ?>">Login</a></li>
                                                </ul>
                                            </div>

                                            <?php elseif($this->session->userdata('role') == 0): ?>
                                            <div class="user-info user-set-role">
                                                <a class="user-set-role__button" href="#" data-toggle="dropdown" aria-haspopup="true"><i class="icon-user"></i> </a>
                                                <ul class="expand-dropdown-menu dropdown-menu">
                                                    <li><a href="#">Hello, <?php echo $this->session->userdata('name') ?></a></li>
                                                    <li><a href="<?php echo base_url('profile') ?>">Akun</a></li>
                                                    <li><a href="<?php echo base_url('profile/order') ?>">Pesanan</a></li>
                                                    <li><a href="<?php echo base_url('auth/logout') ?>">Logout</a></li>
                                                </ul>
                                            </div>

                                            <?php endif; ?>
                                        </div> <!-- End Header Wishlist Box -->

                                        <!-- Start Header Add Cart Box -->
                                        <div class="header-add-cart pos-relative m-l-40">
                                            <!-- <a href="#offcanvas-add-cart__box" class="offcanvas-toggle"> -->
                                            <a href="<?php echo base_url('cart') ?>">    
                                                <i class="icon-shopping-cart"></i>
                                                <span class="wishlist-item-count pos-absolute"><?php echo count($this->carts->get_all($this->session->userdata('username'))) ?></span>
                                            </a>
                                        </div> <!-- End Header Add Cart Box -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Header Middle area -->