<!-- ::::::  Start  Footer Section  ::::::  -->
    <footer class="footer">
        <div class="footer__top gray-bg p-tb-100 m-t-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-12">
                        <div class="footer__about">
                            <div class="footer__logo">
                                <a href="index.html" class="footer__logo-link">
                                    <img src="<?php echo base_url('assets_user/') ?>img/logo/logo-color.png" height="50%" width="50%" alt="" class="footer__logo-img">
                                </a>
                            </div>
                            <div class="footer__text">
                                <p>Solusi mudah belanja di warung tanpa harus datang ke warung. Anda hanya perlu menunggu di rumah. Pesanan akan diantarkan.</p>
                            </div>
                            <ul class="footer__address">
                                <!--
                                <li class="footer__address-item"><span>Address:</span> The Barn, Ullenhall, Henley in Arden B578 5C, England.</li>
                                <li class="footer__address-item"><span>Call us: </span> <a href="tel:+(012)-800-456-789-987">+(012) 800 456 789 - 987</a> </li>
                                <li class="footer__address-item"><span>Call us: </span> <a href="mailto:yourname@mail.com">yourname@mail.com</a></li>
                                -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-sm-6 col-12">
                        <div class="footer__menu">
                            <h4 class="footer__nav-title">Menu</h4>
                            <ul class="footer__nav">
                                <li class="footer__list"><a href="<?php echo base_url('') ?>" class="footer__link">Home</a></li>
                                <li class="footer__list"><a href="<?php echo base_url('category/') ?>" class="footer__link">Kategori</a></li>
                                <li class="footer__list"><a href="<?php echo base_url('home/week_sale') ?>" class="footer__link">Obral Mingguan</a></li>
                                <li class="footer__list"><a href="<?php echo base_url('home/rekomendasi') ?>" class="footer__link">Rekomendasi</a></li>
                                <li class="footer__list"><a href="<?php echo base_url('cart/') ?>" class="footer__link">Keranjang</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-sm-6 col-12">
                        <div class="footer__menu">
                            <h4 class="footer__nav-title">Tentang Kami</h4>
                            <ul class="footer__nav">
                                <li class="footer__list"><a href="<?php echo base_url('hubungi/') ?>" class="footer__link">Hubungi Kami</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12 col-12">
                        <div class="footer__menu">
                            <h4 class="footer__nav-title">Follow Us</h4>
                            <ul class="footer__social-nav">
                                <li class="footer__social-list"><a href="#" class="footer__social-link"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="footer__social-list"><a href="#" class="footer__social-link"><i class="fab fa-twitter"></i></a></li>
                                <li class="footer__social-list"><a href="#" class="footer__social-link"><i class="fab fa-youtube"></i></a></li>
                                <li class="footer__social-list"><a href="#" class="footer__social-link"><i class="fab fa-google-plus-g"></i></a></li>
                                <li class="footer__social-list"><a href="#" class="footer__social-link"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <div class="footer__form">
                            <h4 class="footer__nav-title">Join Our Newsletter Now</h4>
                            <form action="#" class="footer__form-box">
                                <input type="email" placeholder="Your email address">
                                <button class="btn btn--submit btn--blue btn--uppercase btn--weight " type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="footer__quick-nav p-t-50">
                            <a class="footer__quick-link" href="<?php echo base_url('') ?>">Home</a>
                            <a class="footer__quick-link" href="<?php echo base_url('category/') ?>">Kategori</a>
                            <a class="footer__quick-link" href="<?php echo base_url('home/week_sale') ?>">Obral Mingguan</a>
                            <a class="footer__quick-link" href="<?php echo base_url('home/rekomendasi') ?>">Rekomendasi</a>
                            <a class="footer__quick-link" href="<?php echo base_url('cart/') ?>">Keranjang</a>
                            <a class="footer__quick-link" href="<?php echo base_url('hubungi/') ?>">Hubungi Kami</a>
                            <a class="footer__quick-link" href="<?php echo base_url('profile') ?>">Akun</a>
                            <a class="footer__quick-link" href="<?php echo base_url('profile/order') ?>">Pesanan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-12">
                        <div class="footer__copyright-text">
                            <?php if($this->session->userdata('role') == ""): ?>
                            <p>Copyright <a target="_blank" href="#">SmartWarung</a>. All Rights Reserved</p>
                            <?php elseif($this->session->userdata('role') == 1): ?>
                            <p>Copyright <a target="_blank" href="https://instagram.com/rafidzil">Rafi Dzil</a>. All Rights Reserved</p>
                            <?php elseif($this->session->userdata('role') == 0): ?>
                            <p>Copyright <a target="_blank" href="https://instagram.com/vitajassinda">Ocha</a>. All Rights Reserved</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="footer__payment">
                            <a href="#" class="footer__payment-link">
                                <!-- <img src="<?php echo base_url('assets_user/') ?>img/company-logo/payment.png" alt="" class="footer__payment-img"> -->
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer> <!-- ::::::  End  Footer Section  ::::::  -->

    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>
    

    <!-- ::::::::::::::All Javascripts Files here ::::::::::::::-->

    <!-- Vendor JS Files -->
    <script src="<?php echo base_url('assets_user/') ?>js/vendor/jquery-3.5.1.min.js"></script>
    <script src="<?php echo base_url('assets_user/') ?>js/vendor/modernizr-3.7.1.min.js"></script>
    <script src="<?php echo base_url('assets_user/') ?>js/vendor/jquery-ui.min.js"></script>
    <script src="<?php echo base_url('assets_user/') ?>js/vendor/bootstrap.bundle.js"></script>

    <!-- Required datatable js -->
    <script src="<?php echo base_url('assets_admin/') ?>libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets_admin/') ?>libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        
    <!-- Buttons examples -->
    <script src="<?php echo base_url('assets_admin/') ?>libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url('assets_admin/') ?>libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url('assets_admin/') ?>libs/jszip/jszip.min.js"></script>
    <script src="<?php echo base_url('assets_admin/') ?>libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url('assets_admin/') ?>libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="<?php echo base_url('assets_admin/') ?>libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url('assets_admin/') ?>libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url('assets_admin/') ?>libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="<?php echo base_url('assets_admin/') ?>libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url('assets_admin/') ?>libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="<?php echo base_url('assets_admin/') ?>js/pages/datatables.init.js"></script>

    <!-- Plugins JS Files -->
    <script src="<?php echo base_url('assets_user/') ?>js/plugin/swiper.min.js"></script>
    <script src="<?php echo base_url('assets_user/') ?>js/plugin/jquery.countdown.min.js"></script>
    <script src="<?php echo base_url('assets_user/') ?>js/plugin/material-scrolltop.js"></script>
    <script src="<?php echo base_url('assets_user/') ?>js/plugin/price_range_script.js"></script>
    <script src="<?php echo base_url('assets_user/') ?>js/plugin/in-number.js"></script>
    <script src="<?php echo base_url('assets_user/') ?>js/plugin/jquery.elevateZoom-3.0.8.min.js"></script>
    <script src="<?php echo base_url('assets_user/') ?>js/plugin/venobox.min.js"></script>

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugin/plugins.min.js"></script> -->

    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="<?php echo base_url('assets_user/') ?>js/main.js"></script>
</body>

</html>