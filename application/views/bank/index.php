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
				<?php if ($this->session->flashdata('errors') != '') : ?>
					<div class="alert alert-danger text-center" role="alert">
						<?php echo $this->session->flashdata('errors'); ?>
					</div>
				<?php endif; ?>
				<?php if ($this->session->flashdata('success') != '') : ?>
					<div class="alert alert-success text-center" role="alert">
						<?php echo $this->session->flashdata('success') ?>
					</div>
				<?php endif; ?>
				<div class="cart-list">
					<table class="table" id="dataTable">
						<thead class="thead-primary">
							<tr class="text-center">
								<th>&nbsp;</th>
								<th>Bank</th>
								<th>Account Number Barang</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($bank as $key) : ?>
								<tr class="text-center">
									<td class="">
										<a class="btn btn-sm btn-danger px-2" onclick="return confirm('Apakah Anda yakin akan menghapus?');" href="<?php echo site_url('warung/delete_bank/') . $key['id_bank_account'] ?>">
											<span class="ion-ios-close"></span>
										</a>
									</td>
									<td class="product-name">
										<?php echo $key['bank'] ?>
									</td>
									<td class="price">
										<?php echo $key['account_number']; ?>
									</td>
									<td class="total">
										<a href="<?php echo site_url('warung/edit_bank/') . $key['id_bank_account'] ?>" class="btn btn-sm btn-warning px-3"> Edit </a>
									</td>
								</tr><!-- END TR-->
							<?php endforeach; ?>
						</tbody>
					</table>
					<center>
						<a href="<?= site_url('warung/create_bank') ?>" class="btn btn-primary btn-round">tambah</a>
					</center>
				</div>
			</div>
		</div>
	</div>
</section>