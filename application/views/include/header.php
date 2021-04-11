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
                                <a href="index.html" class="header__logo-link">
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
                                                <option value="0">All categories</option>
                                                <option value="12">
                                                    Fashion
                                                </option>
                                                <option value="27">
                                                    Women
                                                </option>
                                                <option value="30">
                                                    Dresses
                                                </option>
                                            </select>
                                        </div>
                                        <div class="header__search-input">
                                            <input type="search" placeholder="Enter your search key">
                                            <button class="btn btn--submit btn--blue btn--uppercase btn--weight " type="submit">Telusuri</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-2">
                                    <div class="header__wishlist-box">
                                        <!-- Start Header Wishlist Box -->
                                        <div class="header__wishlist pos-relative">
                                            <div class="user-info user-set-role">
                                                <a class="user-set-role__button" href="#" data-toggle="dropdown" aria-haspopup="true"><i class="icon-user"></i> </a>
                                                <ul class="expand-dropdown-menu dropdown-menu">
                                                    <li><a href="my-account.html">My account</a></li>
                                                    <li><a href="wishlist.html">My wishlist</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                    <li><a href="login.html">Sign in</a></li>
                                                </ul>
                                            </div>
                                        </div> <!-- End Header Wishlist Box -->

                                        <!-- Start Header Add Cart Box -->
                                        <div class="header-add-cart pos-relative m-l-40">
                                            <a href="#offcanvas-add-cart__box" class="offcanvas-toggle">
                                                <i class="icon-shopping-cart"></i>
                                                <span class="wishlist-item-count pos-absolute">3</span>
                                            </a>
                                        </div> <!-- End Header Add Cart Box -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Header Middle area -->