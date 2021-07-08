   <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="#">Home</a></li>
                        <li class="page-breadcrumb__nav active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->

    <!-- ::::::  Start  Main Container Section  ::::::  -->
    <main id="main-container" class="main-container">
        <form action="<?php echo site_url('invoice/store') ?>" method="POST">
        <input type="text" name="cart_id" value="<?php echo $carts[0]['id'] ?>" hidden>
        <div class="container">
            <div class="row">
                <!-- Start Client Shipping Address -->
                <div class="col-lg-7">
                    <div class="section-content">
                        <h5 class="section-content__title">Alamat Pengiriman</h5>
                    </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-box__single-group">
                                    <div id="map" style="width: 100%;height: 400px;"></div>
                                </div>
                            </div>
                            <input type="text" name="warung" hidden id="warung" value="<?php echo $warungs['username'] ?>">
                            <div class="col-md-12">
                                <div class="form-box__single-group">
                                    <label for="form-first-name">Asal</label>
                                    <input id="origin-input" type="text" class="form-control" name="origin" value="<?php echo $warungs['address'] ?>" readonly>
                                    <input id="origin-place_id" type="text" class="form-control" name="origin-place_id" placeholder="Asal" value="<?php echo $warungs['place_id'] ?>" hidden>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-box__single-group">
                                    <label for="form-last-name">Tujuan</label>
                                    <input id="destination-input" type="text" class="form-control" name="destination" placeholder="Tujuan">
                                    <input id="destination-place_id" type="text" class="form-control" name="destination-place_id" placeholder="Tujuan" hidden>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-box__single-group">
                                    <label for="form-company-name">Jarak (Dalam Kilometer)</label>
                                    <input id="distance" type="text" class="form-control" name="distance" placeholder="Jarak" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-box__single-group">
                                    <label for="form-country">Pembayaran</label>
                                    <select class="form-control" name="method" id="method">
                                        <option value="COD">COD</option>
                                        <option value="Transfer">Transfer</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                </div> <!-- End Client Shipping Address -->
                
                <!-- Start Order Wrapper -->
                <div class="col-lg-5">
                    <div class="your-order-section">
                        <div class="section-content">
                            <h5 class="section-content__title">Total Keranjang</h5>
                        </div>
                        <div class="your-order-box gray-bg m-t-40 m-b-30">
                            <div class="your-order-product-info">
                                <div class="your-order-top d-flex justify-content-between">
                                    <h6 class="your-order-top-left">Produk</h6>
                                    <h6 class="your-order-top-right">Total</h6>
                                </div>
                                <ul class="your-order-middle">
                                    <li class="d-flex justify-content-between">
                                        <?php $total = 0;$discount=0;
                                        foreach ($carts as $item): ?>
                                            <span class="your-order-middle-left"><?php echo $item['name'] ?> X <?php echo $item['quantity'] ?></span>
                                            <input type="number" name="item[]" hidden value="<?php echo $item['item_id'] ?>">
                                            <input type="number" name="price[]" hidden value="<?php 
                                                if($item['discount']>0){
                                                    echo $item['price']-(($item['discount']/100)*$item['price']);
                                                }else{
                                                    echo $item['price'];
                                                }
                                                ?>">
                                            <input type="number" name="quantity[]" hidden value="<?php echo $item['quantity'] ?>">
                                            <span class="your-order-middle-right"><?php echo "Rp " . number_format($item['price']*$item['quantity'], 0, ".", ".") ?></span>
                                            <?php 
                                            if($item['discount']>0){
                                                $total += ($item['price']-(($item['discount']/100)*$item['price']))*$item['quantity'];
                                                $discount += (($item['discount']/100)*$item['price'])*$item['quantity'];
                                            }else{
                                                $total += $item['price']*$item['quantity']; 
                                                $discount+=0;
                                            }
                                            ?>
                                        <?php endforeach;?>
                                    </li>
                                </ul>
                                <div class="your-order-total d-flex justify-content-between">
                                    <h6 class="your-order-bottom-left">Diskon</h6>
                                    <span class="your-order-bottom-right"><?php echo "<del>Rp ".number_format($discount, 0, ".", ".")."</del>" ?></span>
                                </div>
                                <div class="your-order-bottom d-flex justify-content-between">
                                    <h6 class="your-order-bottom-left">Ongkos Kirim</h6>
                                    <input type="number" name="delivery_fee" hidden id="delivery_fee">
                                    <span class="your-order-bottom-right" id="ongkir">Rp 0</span>
                                </div>
                                <div class="your-order-total d-flex justify-content-between">
                                    <h5 class="your-order-total-left">Total</h5>
                                    <input type="number" name="billing" value="<?php echo $total ?>" hidden id="billing">
                                    <h5 class="your-order-total-right"><span id="total"><?php echo "Rp " . number_format($total, 0, ".", ".") ?></span></h5>
                                    <input type="number" name="total" hidden id="total_price">
                                </div>
                            </div>
                            <div class="row" id="transfer_method_show">
                                <div class="col-md-12">
                                    <p class="text-danger">*isi dibawah ini jika metode pembayaran yang anda pilih transfer</p>
                                        <div class="form-group">
                                            <label for="firstname">Nama Bank Anda</label>
                                                <select class="form-control" id="select_bank_type" name="bank_type" placeholder="Nama Bank">
                                                    <option value="" disabled selected></option>
                                                    <option value="BCA">BCA</option>
                                                    <option value="BRI">BRI</option>
                                                    <option value="BNI">BNI</option>
                                                    <option value="MANDIRI">MANDIRI</option>
                                                    <option value="BTPN">BTPN</option>
                                                    <option value="BPD JABAR">BPD JABAR</option>
                                                </select>
                                                <?php echo form_error('name', '<small class="text-danger error">', '</small>'); ?>
                                        </div>
                                </div>
                                <div class="col-sm-12 pb-3">
                                    <label for="method" class="mt-3">Nama Rekening Anda</label>
                                        <input type="text" class="form-control" name="account_name" id="input_account_name" placeholder="Nama Rekening">
                                </div>
                                <div class="col-sm-12 pb-3">
                                    <label for="method" class="mt-3">Nomor Rekening Anda</label>
                                        <input type="text" class="form-control" name="account_number" id="input_account_number" placeholder="Nomor Rekening">
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="firstname">Nama Bank Tujuan</label>
                                            <select class="form-control" name="bank_tujuan" id="bank_to_select" placeholder="Nama Bank">
                                                <option value="" disabled selected></option>
                                                <?php foreach ($bank as $key) {?>
                                                <option value="<?=$key->bank?>"><?=$key->bank?></option>
                                                <?php }?>
                                                <!-- <option value="BRI">BRI</option>
                                                <option value="BNI">BNI</option>
                                                <option value="MANDIRI">MANDIRI</option>
                                                <option value="BTPN">BTPN</option>
                                                <option value="BPD JABAR">BPD JABAR</option> -->
                                            </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h6 id="pilih_bank_show">Pilih salah satu bank transfer tujuan</h6>
                            <div class="row" id="transfer_bank_show">
                            <!-- <?php foreach ($bank as $key) {?>
                                <div class="col-sm-6" id="<?=$key->bank?>_type_bank">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><?=$key->bank?></h5>
                                            <p class="card-text"><?=$key->account_number?></p>
                                            <p class="card-text"><?=$key->account_name?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?> -->
                            </div>
                            <br>
                        <button class="btn btn--block btn--small btn--blue btn--uppercase btn--weight" type="submit">Pesan Sekarang</button>
                    </div>
                </div> <!-- End Order Wrapper -->
            </div>
        </div>
        </form>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->
<script>
    $(document).ready(function() {
        $('#transfer_method_show').hide();
        $('#pilih_bank_show').hide();
        $(document).on('change','#method', function() {
            console.log($('#method').val());
            if ($('#method').val() == "Transfer") {
                $('#transfer_method_show').show();
                $("#select_bank_type").prop('required',true);
                $("#input_account_name").prop('required',true);
                $("#input_account_number").prop('required',true);
                $("#bank_to_select").prop('required',true);
            }else{
                $('#transfer_method_show').hide();
                $("#select_bank_type").prop('required',false);
                $("#input_account_name").prop('required',false);
                $("#input_account_number").prop('required',false);
                $("#bank_to_select").prop('required',false);
            }
        });
        $(document).on('change','#bank_to_select', function() {
            var type_banks = $('#bank_to_select').val()
            console.log(type_banks);
            var banks = <?=json_encode($bank)?>;
            var html = '';
            banks.forEach(element => {
                console.log(element.bank)
                if(element.bank == type_banks){
                    html += `
                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">${element.bank}</h5>
                                                <p class="card-text">${element.account_number}</p>
                                                <p class="card-text">${element.account_name}</p>
                                            </div>
                                        </div>
                                    </div>
                    `;
                }
            });
            if(html != ''){
                $("#pilih_bank_show").show();
                $('#transfer_bank_show').html(html);
            }else{
                html += `
                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                Change other bank
                                            </div>
                                        </div>
                                    </div>
                    `;
            }
        });
    })
</script>