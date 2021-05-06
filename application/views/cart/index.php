   <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="#">Home</a></li>
                        <li class="page-breadcrumb__nav active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->

    <!-- ::::::  Start  Main Container Section  ::::::  -->
    <main id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content">
                        <h5 class="section-content__title">Item keranjang anda</h5>
                    </div>
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
                    <!-- Start Cart Table -->
                    <div class="table-content cart-table-content m-t-30">
                        <form action="<?php echo site_url('cart/update/') ?>" method="post" id="target">
                        <table id="datatable">
                            <thead class="gray-bg" >
                                <tr>
                                    <th>Foto Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Harga Satuan</th>
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total=0;$discount=0;
                                foreach($carts as $item): ?>
                                <tr>
                                    <td class="product-thumbnail">
                                        <img class="img-fluid" src="<?php $photos = explode(',',$item['photo']); echo base_url('assets/uploads/').$photos[0]?>" alt="">
                                    </td>
                                    <td class="product-name">
                                        <p><?php echo $item['name'] ?></p>
                                        <a style="color: blue;" href="<?php echo site_url('profile/show/').$item['warung_username'] ?>"><?php echo $item['warung_name'] ?></a>
                                    </td>
                                    <td class="product-price-cart"><span class="amount"><?php echo "Rp ".number_format($item['price'], 0, ".", ".") ?></span></td>
                                    <td class="product-quantities">
                                        <div class="quantity d-inline-block">
                                            <input type="number" name="quantity[]" class="quantity form-control input-number" value="<?php echo $item['quantity'] ?>" min="1" max="<?php echo $item['stock'] ?>">
                                        </div>
                                    </td>
                                    <td class="product-subtotal">
                                        <?php 
                                            if($item['discount']>0){
                                                echo "<del>Rp " . number_format($item['price'], 0, ".", ".")."</del> <br> "."Rp " . number_format($item['price']-(($item['discount']/100)*$item['price']), 0, ".", ".") ;
                                                $total += ($item['price']-(($item['discount']/100)*$item['price']))*$item['quantity'];
                                                $discount += (($item['discount']/100)*$item['price'])*$item['quantity'];
                                            }else{
                                                echo "Rp " . number_format($item['price'], 0, ".", ".") ;
                                                $total += $item['price']*$item['quantity']; 
                                                $discount += 0;
                                            }
                                        ?>
                                    </td>
                                    <td class="product-remove">
                                        <a onclick="return confirm('Apakah Anda yakin akan menghapus?');" href="<?php echo site_url('cart/delete/').$item['item'] ?>"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>  <!-- End Cart Table -->
                     <!-- Start Cart Table Button -->
                    <div class="cart-table-button m-t-10">
                        <div class="cart-table-button--left">
                            <a href="category" class="btn btn--box btn--large btn--gray btn--uppercase btn--weight m-t-20">LANJUTKAN BELANJA</a>
                        </div>
                        <div class="cart-table-button--right">
                            <input type="submit" class="btn btn--box btn--large btn--blue btn--uppercase btn--weight m-t-20" value="PERBARUI KERANJANG BELANJA">
                        </div>
                    </div>  <!-- End Cart Table Button -->
                </div>
                
            </div>
            <div class="row">
                <!--
                <div class="col-lg-4 col-md-6">
                    <div class="sidebar__widget gray-bg m-t-40">
                        <div class="sidebar__box">
                            <h5 class="sidebar__title">Estimate Shipping And Tax</h5>
                        </div>
                        <span>Enter your destination to get a shipping estimate.</span>
                        <form action="#" method="post" class="form-box">
                            <div class="form-box__single-group">
                                <label for="form-country">* Country</label>
                                <select id="form-country">
                                    <option value="BD" selected>Bangladesh</option>
                                    <option value="US">USA</option>
                                    <option value="UK">UK</option>
                                    <option value="TR">Turkey</option>
                                    <option value="CA">Canada</option>
                                </select>
                            </div>
                            <div class="form-box__single-group">
                                <label for="form-state">* Region / State</label>
                                <select id="form-state">
                                    <option value="Dha" selected>Dhaka</option>
                                    <option value="Kha">Khulna</option>
                                    <option value="Raj">Rajshahi</option>
                                    <option value="Syl">Sylet</option>
                                    <option value="Chi">Chittagong</option>
                                </select>
                            </div>
                            <div class="form-box__single-group">
                                <label for="form-zipcode">* Zip/Postal Code</label>
                                <input type="text" id="form-zipcode">
                            </div>
                            <div class="from-box__buttons m-t-25">
                                <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight" type="submit">GET A QUOTE</button>
                            </div>
                        </form>
                    </div>
                </div>
                -->
                <!--
                <div class="col-lg-4 col-md-6">
                    <div class="sidebar__widget gray-bg m-t-40">
                        <div class="sidebar__box">
                            <h5 class="sidebar__title">Use Coupon Code</h5>
                        </div>
                        <span>Enter your coupon code if you have one.</span>
                        <form action="#" method="post" class="form-box">
                            <div class="form-box__single-group">
                                <label for="form-coupon">*Enter Coupon Code</label>
                                <input type="text" id="form-coupon">
                            </div>
                            <div class="from-box__buttons m-t-25">
                                <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight" type="submit">Apply Coupon</button>
                            </div>
                        </form>
                    </div>
                </div>
                -->
                <div class="col-lg-4 col-md-6">
                    
                </div>
                <div class="col-lg-4 col-md-6">
                    
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="sidebar__widget gray-bg m-t-40">
                        <div class="sidebar__box">
                            <h5 class="sidebar__title">Total Keranjang</h5>
                        </div>
                        <h6 class="total-cost">Total diskon<span><?php echo "<del>Rp ".number_format($discount, 0, ".", ".")."</del>" ?></span></h6>
                        <h4 class="grand-total m-tb-25">Total Akhir <span><?php echo "Rp ".number_format($total, 0, ".", ".") ?></span></h4>
                        <a href="<?php echo site_url('invoice/create') ?>" class="btn btn--box btn--small btn--blue btn--uppercase btn--weight">LANJUTKAN KE PEMBAYARAN</a>
                    </div>
                </div>
            </div>
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->