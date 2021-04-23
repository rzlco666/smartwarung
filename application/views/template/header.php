<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SmartWarung</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/animate.css">
    
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/aos.css">

    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/icomoon.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/node_modules') ?>/chart.js/dist/Chart.min.css">

    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 

  </head>
  <body class="goto-here">
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="<?php echo base_url() ?>">smartwarung</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
            <?php if($this->session->userdata('role')!=99): ?>
            <li class="nav-item active"><a href="<?php echo base_url() ?>" class="nav-link">Beranda</a></li>
            <?php endif; ?>

            <!-- all -->
            <?php if($this->session->userdata('role') == ""): ?>
              <li class="nav-item dropdown"><a href="<?php echo site_url('category') ?>" class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item text-info" href="<?php echo site_url('category/') ?>">Semua</a>
                  <?php $categories = $this->categories->get_all();foreach($categories as $category): ?>
                  <a class="dropdown-item <?php if($category['name']=='Other'){echo 'text-success';}; ?>" href="<?php echo site_url('category/show/').$category['id'] ?>"><?php echo $category['name'] ?></a>
                  <?php endforeach; ?>
                </div>
              </li>
              <li class="nav-item cta"><a href="<?php echo site_url('auth/login') ?>" class="nav-link"><span class="icon-user"></span> Login</a></li>
            <!-- endall -->

            <!-- warung -->
            <?php elseif($this->session->userdata('role') == 1): ?>
              <li class="nav-item dropdown"><a href="<?php echo site_url('category') ?>" class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item text-info" href="<?php echo site_url('category/') ?>">Semua</a>
                <?php $categories = $this->categories->get_all();foreach($categories as $category): ?>
                  <a class="dropdown-item <?php if($category['name']=='Other'){echo 'text-success';}; ?>" href="<?php echo site_url('category/show/').$category['id'] ?>"><?php echo $category['name'] ?></a>
                  <?php endforeach; ?>
                </div>
                <li class="nav-item cta cta-colored dropdown"><a href="<?php echo site_url('profile') ?>" class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon-user"></span> <?php echo $this->session->userdata('name') ?></a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="<?php echo site_url('profile') ?>" class="text-danger">Profile</a>
                  <a class="dropdown-item" href="<?php echo site_url('profile/etalase/').$this->session->userdata('username') ?>" class="text-danger">Etalase</a>
                  <a class="dropdown-item" href="<?php echo site_url('item/create/') ?>" class="text-danger">Tambah barang</a>
                  <a class="dropdown-item" href="<?php echo site_url('profile/order') ?>" class="text-danger">Pesanan masuk</a>
                  <a class="dropdown-item" href="<?php echo site_url('auth/logout') ?>" class="text-danger" style="color:red;">Logout</a>
                </div>
              </li>
              <!-- endwarung -->

              <!-- user -->
              <?php elseif($this->session->userdata('role') == 0): ?>
              <li class="nav-item dropdown"><a href="<?php echo site_url('category') ?>" class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item text-info" href="<?php echo site_url('category/') ?>">Semua</a>
                  <?php $categories = $this->categories->get_all();foreach($categories as $category): ?>
                  <a class="dropdown-item <?php if($category['name']=='Other'){echo 'text-success';}; ?>" href="<?php echo site_url('category/show/').$category['id'] ?>"><?php echo $category['name'] ?></a>
                  <?php endforeach; ?>
                </div>
              </li>
              <li class="nav-item cta cta-colored mr-2"><a href="<?php echo site_url('cart') ?>" class="nav-link"><span class="icon-shopping_cart"></span>[<?php echo count($this->carts->get_all($this->session->userdata('username'))) ?>]</a></li>
              <li class="nav-item cta cta-colored dropdown"><a href="<?php echo site_url('profile') ?>" class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon-user"></span> <?php echo $this->session->userdata('name') ?></a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="<?php echo site_url('profile') ?>" class="text-danger">Profile</a>
                <a class="dropdown-item" href="<?php echo site_url('profile/order') ?>" class="text-danger">Pesanan saya</a>
              	<a class="dropdown-item" href="<?php echo site_url('auth/logout') ?>" class="text-danger" style="color:red;">Logout</a>
              </div>
              </li>
            <!-- enduser -->

            <!-- admin -->
            <?php elseif($this->session->userdata('role')==99): ?>
              <li class="nav-item cta cta-colored dropdown"><a href="<?php echo site_url('profile') ?>" class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon-user"></span> <?php echo $this->session->userdata('name') ?></a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="<?php echo site_url('auth/logout') ?>" class="text-danger" style="color:red;">Logout</a>
              </div>
              </li>
            <?php endif; ?>
            <!-- endadmin -->

	        </ul>
	      </div>
	    </div>
    </nav>
    <!-- END nav -->
