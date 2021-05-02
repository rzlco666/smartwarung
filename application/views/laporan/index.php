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
				<div class="text-center">
					<a href="<?=base_url('warung/laporan/')?>" class="btn btn-primary"> Semua</a>
					<a href="<?=base_url('warung/laporan/'.date('Y-m-d').'/Hari')?>" class="btn btn-primary"> Hari ini</a>
					<a href="<?=base_url('warung/laporan/Minggu')?>" class="btn btn-primary"> Minggu ini</a>
					<a href="<?=base_url('warung/laporan/'.date('Y-m').'/Bulan')?>" class="btn btn-primary"> Bulan ini</a>
					<a href="<?=base_url('warung/laporan/'.date('Y').'/Tahun')?>" class="btn btn-primary"> Tahun ini</a>
				</div>
				<div class="text-center m-3">
				<!-- <h3>Pembukuan Periode <?=$type?></h3> -->
				</div>
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Laporan Penjualan</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Stok</a>
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
								<th>Stok</th>
								<th>Kuantitas</th>
								<th>Harga</th>
								<th>Ongkir</th>
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
								<td><?=$key->stock?></td>
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
								<th>Stok</th>
								<th>Kategori</th>
							</tr>
						</thead>
						<tbody>
						<?php $o=1; foreach ($laporan_item as $key) {?>
							<tr class="text-center">
								<td><?=$o?></td>
								<td><?=$key->name?></td>
								<td><?=$key->stock?></td>
								<td><?=$key->category?></td>
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
	$('.myTablesss').append('<caption style="caption-side: top;text-align:center;">Pembukuan Periode <?=$type;?></caption>');
    $('.myTablesss').DataTable({
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
	});
} );
</script>