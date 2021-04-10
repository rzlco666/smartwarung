<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url() ?>" style="color:black" >Home</a></span> <span style="color:black">Cart</span></p>
            <h1 class="mb-0 bread" style="color:black">My Cart</h1>
          </div>
        </div>
      </div>
    </div>

<section class="ftco-section ftco-cart">
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
        <div class="row">
        <form action="<?php echo site_url('cart/update/') ?>" method="post" id="target">
        <div class="col-md-12 ftco-animate">
            <div class="cart-list">
                <table class="table" id="dataTable">
                    <thead class="thead-primary">
                        <tr class="text-center">
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>Nama Warung</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $total=0;$discount=0;foreach($carts as $item): ?>
                        <tr class="text-center">
                        <td class="product-remove"><a onclick="return confirm('Apakah Anda yakin akan menghapus?');" href="<?php echo site_url('cart/delete/').$item['item'] ?>"><span class="ion-ios-close"></span></a></td>
                        
                        <td class="image-prod"><div class="img mb-1" style="background-image:url(<?php $photos = explode(',',$item['photo']); echo base_url('assets/uploads/').$photos[0]?>);"></div>
                    </td>
                    
                    <td class="product-name">
                        <h5><?php echo $item['name'] ?></h5>
                        <p><?php echo $item['description'] ?></p>
                        <a href="<?php echo site_url('profile/show/').$item['warung_username'] ?>"><?php echo $item['warung_name'] ?></a>
                        </td>
                        
                        <td class="price"><?php echo "Rp ".number_format($item['price'], 0, ".", ".") ?></td>
                        
                        <td class="quantity">
                            <div class="input-group mb-3">
                            <input type="number" name="quantity[]" class="quantity form-control input-number" value="<?php echo $item['quantity'] ?>" min="1" max="<?php echo $item['stock'] ?>">
                        </div>
                        </td>
                        
                        <td class="total">
                        <?php 
                            if($item['discount']>0){
                                echo "<del>Rp " . number_format($item['price'], 0, ".", ".")."</del> "."Rp " . number_format($item['price']-(($item['discount']/100)*$item['price']), 0, ".", ".") ;
                                $total += ($item['price']-(($item['discount']/100)*$item['price']))*$item['quantity'];
                                $discount += (($item['discount']/100)*$item['price'])*$item['quantity'];
                            }else{
                                echo "Rp " . number_format($item['price'], 0, ".", ".") ;
                                $total += $item['price']*$item['quantity']; 
                                $discount += 0;
                            }
                        ?>
                        </td>
                        </tr><!-- END TR-->
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row justify-content-end">
        <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
            <p class="mr-5"><input type="submit" class="mr-auto btn btn-sm btn-warning py-3 px-4" value="Perbarui keranjang"></p>
        </div>
        </form>
        <div class="offset-lg-4 col-lg-4 mt-5 cart-wrap ftco-animate">
            <div class="cart-total mb-3">
                <h3>Total Keranjang</h3>
                <hr>
                <p class="d-flex total-price">
                    <span>Discount</span>
                    <span><?php echo "<del>Rp ".number_format($discount, 0, ".", ".")."</del>" ?></span>
                </p>
                <p class="d-flex total-price">
                    <span>Total</span>
                    <span><?php echo "Rp ".number_format($total, 0, ".", ".") ?></span>
                </p>
            </div>
            <p class="mr-5"><a href="<?php echo site_url('invoice/create') ?>" class="mr-auto btn btn-primary py-3 px-4">Beli sekarang</a></p>
        </div>
    </div>
    </div>
</section>