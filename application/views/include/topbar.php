            <!-- Start Header Menu Area -->
            <div class="header-menu">
                <div class="container">
                    <div class="row col-12">
                        <nav>
                            <?php if($this->session->userdata('role') == ""): ?>
                            <ul class="header__nav">
                                <!--Start Single Nav link-->
                                <li class="header__nav-item pos-relative">
                                    <a href="<?php echo base_url('') ?>" class="header__nav-link">Home</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li class="header__nav-item pos-relative">
                                    <a href="<?php echo base_url('category/') ?>" class="header__nav-link">Kategori</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li class="header__nav-item pos-relative">
                                    <a href="<?php echo base_url('home/week_sale') ?>" class="header__nav-link">Obral Mingguan</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li class="header__nav-item pos-relative">
                                    <a href="<?php echo base_url('home/rekomendasi') ?>" class="header__nav-link">Rekomendasi</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li class="header__nav-item pos-relative">
                                    <a href="<?php echo base_url('cart/') ?>" class="header__nav-link">Keranjang</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li class="header__nav-item pos-relative">
                                     <a href="<?php echo base_url('hubungi/') ?>" class="header__nav-link">Hubungi Kami</a>
                                </li> <!-- End Single Nav link-->
                            </ul>
                            <?php elseif($this->session->userdata('role') == 0): ?>
                            <ul class="header__nav">
                                <!--Start Single Nav link-->
                                <li class="header__nav-item pos-relative">
                                    <a href="<?php echo base_url('') ?>" class="header__nav-link">Home</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li class="header__nav-item pos-relative">
                                    <a href="<?php echo base_url('category/') ?>" class="header__nav-link">Kategori</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li class="header__nav-item pos-relative">
                                    <a href="<?php echo base_url('home/week_sale') ?>" class="header__nav-link">Obral Mingguan</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li class="header__nav-item pos-relative">
                                    <a href="<?php echo base_url('home/rekomendasi') ?>" class="header__nav-link">Rekomendasi</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li class="header__nav-item pos-relative">
                                    <a href="<?php echo base_url('cart/') ?>" class="header__nav-link">Keranjang</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li class="header__nav-item pos-relative">
                                     <a href="<?php echo base_url('hubungi/') ?>" class="header__nav-link">Hubungi Kami</a>
                                </li> <!-- End Single Nav link-->
                            </ul>
                            <?php elseif($this->session->userdata('role') == 1): ?>
                            <ul class="header__nav">
                                <?php  if($this->session->userdata('username') == $user['username']): ?>
                                <!--Start Single Nav link-->
                                <li class="header__nav-item pos-relative">
                                    <a href="<?php echo base_url('') ?>" class="header__nav-link">Home</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li class="header__nav-item pos-relative">
                                    <a href="<?php echo base_url('warung/mywarung') ?>" class="header__nav-link">Dashboard</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li class="header__nav-item pos-relative">
                                    <a href="<?php echo base_url('profile/') ?>" class="header__nav-link">Profile</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li class="header__nav-item pos-relative">
                                    <a href="<?php echo base_url('profile/order/') ?>" class="header__nav-link">Pesanan Masuk</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li class="header__nav-item pos-relative">
                                    <a href="<?php echo base_url('warung/bank/').$user['username'] ?>" class="header__nav-link">Bank</i></a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li class="header__nav-item pos-relative">
                                    <a href="<?php echo base_url('profile/comment/') ?>" class="header__nav-link">Kritik Saran</i></a>
                                </li> <!-- End Single Nav link-->
                                <?php else: ?>
                                <!--Start Single Nav link-->
                                <li class="header__nav-item pos-relative">
                                    <a href="<?php echo base_url('profile/show/').$user['username'] ?>" class="header__nav-link">Profile</i></a>
                                </li> <!-- End Single Nav link-->
                                <?php endif ?>
                                <!--Start Single Nav link-->
                                <li class="header__nav-item pos-relative">
                                     <a href="<?php echo base_url('profile/etalase/').$user['username'] ?>" class="header__nav-link">Etalase</a>
                                </li> <!-- End Single Nav link-->
                                <!--Start Single Nav link-->
                                <li class="header__nav-item pos-relative">
                                     <a href="<?php echo base_url('warung/laporan/') ?>" class="header__nav-link">Pembukuan</a>
                                </li> <!-- End Single Nav link-->
                            </ul>
                            <?php endif; ?>
                        </nav>
                    </div>
                </div>
            </div> <!-- End Header Menu Area -->
        </div> <!-- ::::::  End Large Header Section  ::::::  -->