<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12 ftco-animate">
                <h2 class="text-center mb-6 billing-heading">Detail Belanja</h2>
                <div class="cart-list">
                    <table class="table table-sm">
                        <thead class="thead-primary" style="line-height: 0.5;">
                            <tr class="text-center">
                                <th></th>
                                <th></th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="<?php echo site_url('invoice/store') ?>" method="POST">
                                <input type="text" name="cart_id" value="<?php echo $carts[0]['id'] ?>" hidden>
                                <?php $total = 0;$discount=0;
foreach ($carts as $item): ?>
                                    <tr class="text-center">
                                        <td class="product-remove " style="width:0.1%;"><a onclick="return confirm('Apakah Anda yakin akan menghapus?');" href="<?php echo site_url('cart/delete/') . $item['item'] ?>"><span class="ion-ios-close"></span></a></td>

                                        <td class="image-prod " style="width:0.1%;">
                                            <div class="img" style="background-image:url(<?php $photos = explode(',', $item['photo']);
echo base_url('assets/uploads/') . $photos[0]?>);"></div>
                                        </td>

                                        <td class="product-name " style="width:0.1%;">
                                            <h3><?php echo $item['name'] ?></h3>
                                            <input type="number" name="item[]" hidden value="<?php echo $item['item_id'] ?>">
                                        </td>

                                        <td class="price " style="width:0.1%;"><?php echo "Rp " . number_format($item['price'], 0, ".", ".") ?></td>
                                        <input type="number" name="price[]" hidden value="<?php 
                                        if($item['discount']>0){
                                            echo $item['price']-(($item['discount']/100)*$item['price']);
                                        }else{
                                            echo $item['price'];
                                        }
                                        ?>">

                                        <td class="price" style="width:0.1%;">
                                            <?php echo $item['quantity'] ?>
                                            <input type="number" name="quantity[]" hidden value="<?php echo $item['quantity'] ?>">
                                        </td>

                                        <td class="total " style="width:0.1%;">
                                        <?php 
                                        if($item['discount']>0){
                                            echo "<del>Rp " . number_format($item['price'], 0, ".", ".")."</del> "."Rp " . number_format($item['price']-(($item['discount']/100)*$item['price']), 0, ".", ".") ;
                                            $total += ($item['price']-(($item['discount']/100)*$item['price']))*$item['quantity'];
                                            $discount += (($item['discount']/100)*$item['price'])*$item['quantity'];
                                        }else{
                                            echo "Rp " . number_format($item['price'], 0, ".", ".") ;
                                            $total += $item['price']*$item['quantity']; 
                                            $discount+=0;
                                        }
                                        ?>
                                            </td>
                                    </tr><!-- END TR-->
                                <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
                <!-- END -->
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-12 ftco-animate">
                <div class="row mt-5 pt-3">
                    <div class="col-xl-6 mb-5">
                        <h5 class="text-center">Alamat Pengiriman</h5>
                        <div id="map" style="width: 100%;height: 400px;"></div>
                        <!-- <input id="origin-input" class="controls" type="text" placeholder="Asal">
                        <input id="destination-input" class="controls" type="text" placeholder="Enter a destination location"> -->
                        <!-- <div id="mode-selector" class="controls">
                            <input type="radio" name="type" id="changemode-walking" checked="checked">
                            <label for="changemode-walking">Walking</label>

                            <input type="radio" name="type" id="changemode-transit">
                            <label for="changemode-transit">Transit</label>

                            <input type="radio" name="type" id="changemode-driving">
                            <label for="changemode-driving">Driving</label>
                        </div> -->
                        <div class="row align-items-end mt-3">
                            <div class="col-sm-12">
                                <div class="form-group input-sm">
                                    <div class="w-100"></div>
                                    <div class="row">
                                        <input type="text" name="warung" hidden id="warung" value="<?php echo $warungs['username'] ?>">
                                        <div class="col-sm-6 pb-3">
                                            <label for="asal" class="mt-3">Asal</label>
                                            <input id="origin-input" type="text" class="form-control" name="origin" value="<?php echo $warungs['address'] ?>" readonly>
                                            <input id="origin-place_id" type="text" class="form-control" name="origin-place_id" placeholder="Asal" value="<?php echo $warungs['place_id'] ?>" hidden>
                                        </div>
                                        <div class="col-sm-6 pb-3">
                                            <label for="tujuan" class="mt-3">Tujuan</label>
                                            <input id="destination-input" type="text" class="form-control" name="destination" placeholder="Tujuan">
                                            <input id="destination-place_id" type="text" class="form-control" name="destination-place_id" placeholder="Tujuan" hidden>
                                        </div>
                                        <div class="col-sm-12 pb-3">
                                            <label for="jarak">Jarak (dalam kilometer)</label>
                                            <input id="distance" type="text" class="form-control" name="distance" placeholder="Jarak" readonly>
                                        </div>
                                        <div class="col-sm-12 pb-3">
                                            <label for="method" class="mt-3">Pembayaran</label>
                                            <select class="form-control" name="method" id="method">
                                                <option value="COD">COD</option>
                                                <option value="Transfer">Transfer</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100"></div>
                            </div>
                        </div>
                        <div class="w-100"></div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <div class="cart-detail cart-total p-3 p-md-4" style="height:95%">
                            <h3 class="billing-heading mb-4">Total Keranjang</h3>
                            <p class="d-flex">
                                <span>Total Belanja</span>
                                <span><?php echo "Rp " . number_format($total, 0, ".", ".") ?></span>
                                <input type="number" name="billing" value="<?php echo $total ?>" hidden id="billing">
                            </p>
                            <p class="d-flex">
                                <span>Diskon</span>
                                <span><?php echo "<del>Rp ".number_format($discount, 0, ".", ".")."</del>" ?></span>
                            </p>
                            <p class="d-flex">
                                <span>Ongkos Kirim</span>
                                <span id="ongkir">Rp 0</span>
                                <input type="number" name="delivery_fee" hidden id="delivery_fee">
                            </p>
                            <!-- <p class="d-flex">
                            <span>Discount</span>
                            <span>$3.00</span>
                        </p> -->
                            <hr>
                            <p class="d-flex total-price">
                                <span>Total</span>
                                <span id="total"><?php echo "Rp " . number_format($total, 0, ".", ".") ?></span>
                                <input type="number" name="total" hidden id="total_price">
                            </p>
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
                            <h3 class="billing-heading mb-4 p-2 p-md-4"  id="pilih_bank_show">Pilih salah satu bank transfer tujuan</h3>
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
                            <?php }?> -->
                            </div>
                            <br>
                            <br>
                            <input type="submit" value="Pesan sekarang" class="btn btn-primary py-3 px-2">
                        </div>
                        </form>
                    </div>
                </div>
            </div> <!-- .col-md-8 -->
        </div>
    </div>
    </div>
</section> <!-- .section -->
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