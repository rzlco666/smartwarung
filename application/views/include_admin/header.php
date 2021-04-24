    <body data-topbar="colored">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="<?php echo base_url() ?>" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="<?php echo base_url('assets_admin/') ?>images/logo-sm-dark2.png" alt="" height="25">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?php echo base_url('assets_admin/') ?>images/logo-dark2.png" alt="" height="40">
                                </span>
                            </a>

                            <a href="<?php echo base_url() ?>" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?php echo base_url('assets_admin/') ?>images/logo-sm-light2.png" alt="" height="25">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?php echo base_url('assets_admin/') ?>images/logo-light2.png" alt="" height="40">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="mdi mdi-backburger"></i>
                        </button>

                        <!-- App Search-->
                        <form class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="mdi mdi-magnify"></span>
                            </div>
                        </form>
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ml-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                                aria-labelledby="page-header-search-dropdown">
                    
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <?php if($this->session->userdata('role')==99): ?>
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="<?php echo base_url('assets_admin/') ?>images/widget-img.png" alt="Header Avatar">
                                <span class="d-none d-sm-inline-block ml-1"><?php echo ucwords($this->session->userdata('name')) ?></span>
                                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a class="dropdown-item" href="<?php echo site_url('auth/logout') ?>"><i class="mdi mdi-logout font-size-16 align-middle mr-1"></i> Logout</a>
                            </div>
                        </div>
                        <?php endif; ?>
            
                    </div>
                </div>

            </header>