        <!-- ::::::  Start Mobile Header Section  ::::::  -->
        <div class="header__mobile mobile-header--1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Start Header Mobile Top area -->
                        <div class="header__mobile-top">
                            <div class="mobile-header__logo">
                                <a href="<?php echo base_url('') ?>" class="mobile-header__logo-link">
                                    <img src="<?php echo base_url('assets_user/') ?>img/logo/logo-color.png" height="50%" width="50%" alt="" class="mobile-header__logo-img">
                                </a>
                            </div>
                            <div class="header__wishlist-box">
                                <!-- Start Header Wishlist Box -->
                                        <div class="header__wishlist pos-relative">
                                            <?php if($this->session->userdata('role') == ""): ?>

                                            <?php elseif($this->session->userdata('role') == 1): ?>

                                            <?php elseif($this->session->userdata('role') == 0): ?>
                                            <div class="user-info user-set-role">
                                                <a class="user-set-role__button" href="#" data-toggle="dropdown" aria-haspopup="true"><i class="icon-eye"></i> </a>
                                                <ul class="expand-dropdown-menu dropdown-menu">
                                                    <li><a href="#">Harga dapat berubah sewaktu-waktu.</a></li>
                                                </ul>
                                            </div>

                                            <?php endif; ?>
                                        </div> <!-- End Header Wishlist Box -->
                                <!-- Start Header Wishlist Box -->
                                <div class="header__wishlist pos-relative m-l-10">
                                    <a href="wishlist.html" class="header__wishlist-link">
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
                                                    <li><a href="<?php echo base_url('profile/') ?>">Akun</a></li>
                                                    <li><a href="<?php echo base_url('profile/order') ?>">Pesanan</a></li>
                                                    <li><a href="<?php echo base_url('auth/logout') ?>">Logout</a></li>
                                                </ul>
                                            </div>

                                            <?php elseif($this->session->userdata('role') == 1): ?>
                                            <div class="user-info user-set-role">
                                                <a class="user-set-role__button" href="#" data-toggle="dropdown" aria-haspopup="true"><i class="icon-user"></i> </a>
                                                <ul class="expand-dropdown-menu dropdown-menu">
                                                    <li><a href="#">Hello, <?php echo $this->session->userdata('name') ?></a></li>
                                                    <li><a href="<?php echo base_url('profile') ?>">Akun</a></li>
                                                    <li><a href="<?php echo site_url('profile/etalase/').$this->session->userdata('username') ?>">Etalase</a></li>
                                                    <li><a href="<?php echo site_url('item/create/') ?>">Tambah Barang</a></li>
                                                    <li><a href="<?php echo site_url('profile/order') ?>">Pesanan Masuk</a></li>
                                                    <li><a href="<?php echo base_url('auth/logout') ?>">Logout</a></li>
                                                </ul>
                                            </div>

                                        <?php endif; ?>
                                    </a>
                                </div> <!-- End Header Wishlist Box -->

                                <!-- Start Header Add Cart Box -->
                                <div class="header-add-cart pos-relative m-l-15">
                                    <?php if($this->session->userdata('role') == ""): ?>
                                    <a href="cart" class="header__wishlist-link">
                                        <i class="icon-shopping-cart"></i>
                                        <span class="wishlist-item-count pos-absolute"><?php echo count($this->carts->get_all($this->session->userdata('username'))) ?></span>
                                    </a>

                                    <?php elseif($this->session->userdata('role') == 0): ?>
                                    <a href="cart" class="header__wishlist-link">
                                        <i class="icon-shopping-cart"></i>
                                        <span class="wishlist-item-count pos-absolute"><?php echo count($this->carts->get_all($this->session->userdata('username'))) ?></span>
                                    </a>

                                    <?php endif; ?>
                                </div> <!-- End Header Add Cart Box -->

                                <a href="#offcanvas-mobile-menu" class="offcanvas-toggle m-l-20"><i class="icon-menu"></i></a>

                            </div>
                        </div> <!-- End Header Mobile Top area -->

                        <!-- Start Header Mobile Middle area -->
                        <div class="header__mobile-middle header__top--style-1 p-tb-10">
                            <form class="header__search-form" action="<?php echo base_url("home/pencarian/")?>">
                                <div class="header__search-category header__search-category--mobile">
                                    <select class="bootstrap-select">
                                        <option value="0">Semua</option>
                                        <?php $categories = $this->categories->get_all();
                                            foreach($categories as $category): ?>
                                                <option value="<?php echo $category['id'] ?>">
                                                <?php echo $category['name'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="header__search-input header__search-input--mobile">
                                    <input type="search" name="nama" placeholder="Masukkan kata pencarian">
                                    <button class="btn btn--submit btn--blue btn--uppercase btn--weight" type="submit"><i class="fal fa-search"></i></button>
                                </div>
                            </form>
                        </div> <!-- End Header Mobile Middle area -->

                    </div>
                </div>
            </div>
        </div> <!-- ::::::  Start Mobile Header Section  ::::::  -->

        <!-- ::::::  Start Mobile-offcanvas Menu Section  ::::::  -->
        <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
            <button class="offcanvas__close offcanvas-close">&times;</button>
            <div class="offcanvas-inner">
                
                <div class="offcanvas-menu m-b-30">
                    <h4>Menu</h4>
                    <?php if($this->session->userdata('role') == ""): ?>
                            <ul>
                                <!--Start Single Nav link-->
                                <li>
                                    <a href="<?php echo base_url('') ?>">Home</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li>
                                    <a href="<?php echo base_url('category/') ?>">Kategori</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li>
                                    <a href="<?php echo base_url('home/week_sale') ?>">Obral Mingguan</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li>
                                    <a href="<?php echo base_url('home/rekomendasi') ?>">Rekomendasi</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li>
                                    <a href="<?php echo base_url('cart/') ?>">Keranjang</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li>
                                     <a href="<?php echo base_url('hubungi/') ?>">Hubungi Kami</a>
                                </li> <!-- End Single Nav link-->
                            </ul>
                    <?php elseif($this->session->userdata('role') == 0): ?>
                            <ul>
                                <!--Start Single Nav link-->
                                <li>
                                    <a href="<?php echo base_url('') ?>">Home</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li>
                                    <a href="<?php echo base_url('category/') ?>">Kategori</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li>
                                    <a href="<?php echo base_url('home/week_sale') ?>">Obral Mingguan</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li>
                                    <a href="<?php echo base_url('home/rekomendasi') ?>">Rekomendasi</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li>
                                    <a href="<?php echo base_url('cart/') ?>">Keranjang</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li>
                                     <a href="<?php echo base_url('hubungi/') ?>">Hubungi Kami</a>
                                </li> <!-- End Single Nav link-->
                            </ul>
                            <?php elseif($this->session->userdata('role') == 1): ?>
                            <ul>
                                <?php  if($this->session->userdata('username') == $user['username']): ?>
                                <!--Start Single Nav link-->
                                <li>
                                    <a href="<?php echo base_url('') ?>">Home</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li>
                                    <a href="<?php echo base_url('warung/mywarung') ?>">Dashboard</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li>
                                    <a href="<?php echo base_url('profile/') ?>">Profile</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li>
                                    <a href="<?php echo base_url('profile/order/') ?>">Pesanan Masuk</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li>
                                    <a href="<?php echo base_url('warung/bank/').$user['username'] ?>">Bank</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li>
                                    <a href="<?php echo base_url('profile/comment/') ?>">Kritik Saran</i></a>
                                </li> <!-- End Single Nav link-->
                                <?php else: ?>
                                <!--Start Single Nav link-->
                                <li>
                                    <a href="<?php echo base_url('profile/show/').$user['username'] ?>">Profile</i></a>
                                </li> <!-- End Single Nav link-->
                                <?php endif ?>
                                <!--Start Single Nav link-->
                                <li>
                                     <a href="<?php echo base_url('profile/etalase/').$user['username'] ?>">Etalase</a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li>
                                     <a href="<?php echo base_url('warung/laporan/') ?>">Pembukuan</a>
                                </li> <!-- End Single Nav link-->
                            </ul>
                            <?php endif; ?>
                </div>
                <div class="offcanvas-buttons m-b-30">
                    <?php if($this->session->userdata('role') == ""): ?>
                    <a href="<?php echo base_url('auth/login') ?>" class="user"><i class="icon-user"></i></a>
                    <a href="<?php echo base_url('auth/login') ?>"><i class="icon-shopping-cart"></i></a>
                    <?php elseif($this->session->userdata('role') == 0): ?>
                    <a href="<?php echo base_url('profile/') ?>" class="user"><i class="icon-user"></i></a>
                    <a href="<?php echo base_url('cart/') ?>"><i class="icon-shopping-cart"></i></a>
                    <?php elseif($this->session->userdata('role') == 1): ?>
                    <a href="<?php echo base_url('profile/') ?>" class="user"><i class="icon-user"></i></a>
                    <?php endif; ?>
                </div>
                <div class="offcanvas-social">
                    <span>Stay With Us</span>
                    <ul>
                        <li>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-google-plus-g"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div> <!-- ::::::  End Mobile-offcanvas Menu Section  ::::::  -->