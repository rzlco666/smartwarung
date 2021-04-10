<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs" style="color: black;"><span class="mr-2"><a href="<?php echo base_url(); ?>" style="color: black;">Home</a></span> <span style="color: black;">Profile</span></p>
				<h1 class="mb-0 bread" style="color: black;"><?php echo $user['name']; ?></h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section ftco-cart">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10 mb-5 text-center">
				<ul class="product-category">
					<?php include APPPATH . 'views/profile/menu.php'; ?>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 ftco-animate">
				<div class="cart-list">
				<?= form_open(site_url('warung/laporan/'),['id'=>'form_date_range']); ?>
				<input type="text" name="date_range" id="inp_date_range" class="form-control">
					<?= form_close(); ?>
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Semua</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">PerItem</a>
					</li>
				</ul>
					<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					<br>
					<table class="table myTablesss">
						<thead class="thead-primary">
							<tr class="text-center">
								<th>No</th>
								<th>Invoice</th>
								<th>Tanggal</th>
								<th>Item</th>
								<th>Qty</th>
								<th>Billing</th>
								<th>Delivery Fee</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
						<?php $i=1; foreach ($laporan as $key) {?>
							<tr class="text-center">
								<td><?=$i?></td>
								<td><?=$key->id?></td>
								<td><?=$key->date?></td>
								<td><?=$key->name?></td>
								<td><?=$key->quantity?></td>
								<td><?=$key->billing?></td>
								<td><?=$key->delivery_fee?></td>
								<td><?=$key->total?></td>
							</tr>
						<?php $i++;}?>
						</tbody>
					</table>
					</div>
					<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<br>
					<table class="table myTablesss">
						<thead class="thead-primary">
							<tr class="text-center">
								<th>No</th>
								<th>Item</th>
								<th>Qty</th>
								<th>Billing</th>
								<th>Delivery Fee</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
						<?php $o=1; foreach ($laporan_item as $key) {?>
							<tr class="text-center">
								<td><?=$o?></td>
								<td><?=$key->name?></td>
								<td><?=$key->quantity?></td>
								<td><?=$key->billing?></td>
								<td><?=$key->delivery_fee?></td>
								<td><?=$key->total?></td>
							</tr>
						<?php $o++;}?>
						</tbody>
					</table>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
$(document).ready( function () {
	$('#inp_date_range').daterangepicker({
		locale: {
			format: 'Y-M-DD'
			}
	});
	$('#inp_date_range').on('apply.daterangepicker', function(ev, picker) {
		// alert ('hello');
		$("#form_date_range").submit();
	});
    $('.myTablesss').DataTable({
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
	});
} );
</script>