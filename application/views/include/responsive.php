        <!-- ::::::  Start Mobile Header Section  ::::::  -->
        <div class="header__mobile mobile-header--1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Start Header Mobile Top area -->
                        <div class="header__mobile-top">
                            <div class="mobile-header__logo">
                                <a href="index.html" class="mobile-header__logo-link">
                                    <img src="<?php echo base_url('assets_user/') ?>img/logo/logo-color.png" height="50%" width="50%" alt="" class="mobile-header__logo-img">
                                </a>
                            </div>
                            <div class="header__wishlist-box">
                                <!-- Start Header Wishlist Box -->
                                <div class="header__wishlist pos-relative">
                                    <a href="wishlist.html" class="header__wishlist-link">
                                        <?php if($this->session->userdata('role') == ""): ?>
                                            <div class="user-info user-set-role">
                                                <a class="user-set-role__button" href="#" data-toggle="dropdown" aria-haspopup="true"><i class="icon-user"></i> </a>
                                                <ul class="expand-dropdown-menu dropdown-menu">
                                                    <li><a href="auth/login">Login</a></li>
                                                </ul>
                                            </div>

                                            <?php elseif($this->session->userdata('role') == 0): ?>
                                            <div class="user-info user-set-role">
                                                <a class="user-set-role__button" href="#" data-toggle="dropdown" aria-haspopup="true"><i class="icon-user"></i> </a>
                                                <ul class="expand-dropdown-menu dropdown-menu">
                                                    <li><a href="#">Hello, <?php echo $this->session->userdata('name') ?></a></li>
                                                    <li><a href="profile">Akun</a></li>
                                                    <li><a href="profile/order">Pesanan</a></li>
                                                    <li><a href="auth/logout">Logout</a></li>
                                                </ul>
                                            </div>

                                        <?php endif; ?>
                                    </a>
                                </div> <!-- End Header Wishlist Box -->

                                <!-- Start Header Add Cart Box -->
                                <div class="header-add-cart pos-relative m-l-20">
                                    <a href="cart" class="header__wishlist-link">
                                        <i class="icon-shopping-cart"></i>
                                        <span class="wishlist-item-count pos-absolute"><?php echo count($this->carts->get_all($this->session->userdata('username'))) ?></span>
                                    </a>
                                </div> <!-- End Header Add Cart Box -->

                                <a href="#offcanvas-mobile-menu" class="offcanvas-toggle m-l-20"><i class="icon-menu"></i></a>

                            </div>
                        </div> <!-- End Header Mobile Top area -->

                        <!-- Start Header Mobile Middle area -->
                        <div class="header__mobile-middle header__top--style-1 p-tb-10">
                            <form class="header__search-form" action="#">
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
                                    <input type="search" placeholder="Masukkan kata pencarian">
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
                    <ul>
                        <li>
                            <a href="#"><span>Home</span></a>
                            <ul class="sub-menu">
                                <li><a href="index.html"><span class="menu-text">Home 1</span></a></li>
                                <li><a href="index-2.html"><span class="menu-text">Home 2</span></a></li>
                                <li> <a href="index-3.html"><span class="menu-text">Home 3</span></a></li>
                                <li><a href="index-4.html"><span class="menu-text">Home 4</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span>Pages</span></a>
                            <ul class="sub-menu">
                                <li><a href="about.html">About</a></li>
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="compare.html">Compare</a></li>
                                <li><a href="empty-cart.html">Empty Cart</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                                <li><a href="my-account.html">My Account</a></li>
                                <li><a href="login.html">Login</a></li>
                                <li><a href="404-page.html">404 Page</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span>Shop</span></a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="#">Shop Grid</a>
                                    <ul class="sub-menu">
                                        <li><a href="shop-1.html">Shop Default</a></li>
                                        <li><a href="shop-4-grid.html">Shop 4grid</a></li>
                                        <li><a href="shop-5-grid.html">Shop 5grid</a></li>
                                        <li><a href="shop-grid-left-sidebar.html">Shop Left Sidebar</a></li>
                                        <li><a href="shop-grid-right-sidebar.html">Shop Right Sidebar</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="sub-menu">
                                <li>
                                    <a href="#">Shop List</a>
                                    <ul class="sub-menu">
                                        <li><a href="shop-list.html">Shop List</a></li>
                                        <li><a href="shop-list-left-sidebar.html">Shop Left Sidebar</a></li>
                                        <li><a href="shop-list-right-sidebar.html">Shop Right Sidebar</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="sub-menu">
                                <li>
                                    <a href="#">Product Single</a>
                                    <ul class="sub-menu">
                                        <li><a href="single-1.html">Single</a></li>
                                        <li><a href="single-variable.html">Variable</a></li>
                                        <li><a href="single-left-tab.html">Left Tab</a></li>
                                        <li><a href="single-right-tab.html">Right Tab</a></li>
                                        <li><a href="single-slider.html">Single Slider</a></li>
                                        <li><a href="single-gallery-left.html">Gallery Left</a></li>
                                        <li><a href="single-gallery-right.html">Gallery Right</a></li>
                                        <li><a href="single-sticky-left.html">Sticky Left</a></li>
                                        <li><a href="single-sticky-right.html">Sticky Right</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span>Blogs</span></a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="#">Blog Grid</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-grid-left-sidebar.html"> Blog Grid Left Sidebar</a></li>
                                        <li><a href="blog-grid-right-sidebar.html"> Blog Grid Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Blog List</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-list-left-sidebar.html"> Blog List Left Sidebar</a></li>
                                        <li><a href="blog-list-right-sidebar.html"> Blog List Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Blog Single</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-single-left-sidebar.html"> Blog Single Left Sidebar</a></li>
                                        <li><a href="blog-single-right-sidebar.html"> Blog Single Right Sidebar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul>
                </div>
                <div class="offcanvas-buttons m-b-30">
                    <a href="my-account.html" class="user"><i class="icon-user"></i></a>
                    <a href="wishlist.html"><i class="icon-heart"></i></a>
                    <a href="cart.html"><i class="icon-shopping-cart"></i></a>
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