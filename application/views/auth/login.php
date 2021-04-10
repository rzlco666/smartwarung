<section class="ftco-section">
    <div class="container">
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
        <div class="row justify-content-center">
            <div class="col-xl-12 ftco-animate">
                <form action="<?php echo site_url('auth/verif') ?>" class="billing-form" method="post">
                <h3 class="mb-4 billing-heading text-center">Login</h3>
                <div class="row align-items-end">
                    <div class="offset-md-3 col-md-6">
                        <div class="form-group">
                            <label >Username</label>
                            <input type="text" class="form-control" name="username" placeholder="">
                        </div>
                    </div>
                    <div class="w-100"></div>
                        <div class="offset-md-3 col-md-6">
                        <div class="form-group">
                            <label for="phone">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="">
                        </div>
                        </div>
                    </div>
                <div class="w-100"></div>
                <div class="offset-md-5 col-md-2">
                    <div class="form-group form-row d-inline">
                        <div class="col">
                            <input type="submit" class="btn btn-primary px-5 text-center d-block" value="Login">
                        </div>
                        <!-- <div class="col">
                            <a class="text-center d-block" href="<?php echo base_url('auth/register') ?>">Daftar</a>
                            <span class="text-center d-block"> atau</span>
                            <a class="text-center d-block" href="<?php echo base_url('auth/register') ?>">Daftar sebagai Warung</a>
                        </div> -->
                    </div>
                </div>
                <div class="w-100"></div>
                <div class="offset-md-3 col-md-6">
                    <div class="container">
                        <div class="row">
                            <div class="offset-sm-2 col-sm-2">
                                <a class="text-center d-block" href="<?php echo base_url('auth/register') ?>">Daftar</a>
                            </div>
                            <div class="col-sm-1">
                                <span class="text-center d-block"> atau</span>
                            </div>
                            <div class="ml-3 col-sm-5">
                                <a class="text-center d-block" href="<?php echo base_url('auth/register_warung') ?>">Daftar sebagai Warung</a>
                            </div>

                        </div>
                    </div>
                </div>
            </form><!-- END -->
            </div>
            </div>
        </div>
    </div>
</section> <!-- .section -->