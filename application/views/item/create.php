<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
                <form action="<?php echo site_url('item/store') ?>" class="billing-form" method="post" enctype='multipart/form-data'> 
                <h3 class="mb-4 billing-heading">Tambah Barang</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-12">
						<div class="form-group">
							<label for="firstname">Nama Barang</label>
                            <input type="text" class="form-control" name="name" placeholder="Nama barang">
                            <?php echo form_error('name', '<small class="text-danger error">', '</small>'); ?>
						</div>
					</div>
					<div class="w-100"></div>
					<div class="col-md-12">
		            	<div class="form-group">
		            		<label for="categories">Kategori</label>
		            		<div class="select-wrap">
								<div class="icon"><span class="ion-ios-arrow-down"></span></div>
								<select name="category" id="" class="form-control">
									<option value="">Pilih Kategori</option>
									<?php foreach($categories as $category): ?>
									<option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
									<?php endforeach; ?>
								</select>
								</div>
							</div>
						</div>
					<div class="w-100"></div>
					<div class="col-md-6 pb-3">
						<label for="username">Stok</label>
                        <input type="number" class="form-control" name="stock" placeholder="Stok">
                        <?php echo form_error('stock', '<small class="text-danger error">', '</small>'); ?>
					</div>
					<div class="col-md-6 pb-3">
						<label for="username">Harga</label>
                        <input type="number" class="form-control" name="price" placeholder="Harga">
                        <?php echo form_error('price', '<small class="text-danger error">', '</small>'); ?>
					</div>
					<!-- ini nanti lokasi -->
                    <div class="w-100"></div>
                    <div class="col-md-12">
						<div class="form-group">
                            <label for="firstname">Deskripsi</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control single-textarea" placeholder="Description"></textarea>
                            <?php echo form_error('description', '<small class="text-danger error">', '</small>'); ?>
						</div>
					</div>
					<div class="w-100"></div>
					<div class="w-100"></div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="photo">Add photo</label>
                            <input type="file" name="files[]" multiple class="form-control my-2" style="padding-top: 15px;">
                            <?php echo form_error('files', '<small class="text-danger error">', '</small>'); ?>
							<!-- <input type="file" name="photo[]" class="form-control my-2" style="padding-top: 15px;">
							<input type="file" name="photo[]" class="form-control my-2" style="padding-top: 15px;"> -->
						</div>
					</div>
					<div class="w-100"></div>
					<div class="offset-md-4 col-md-2 mt-4">
						<div class="form-group">
							<input type="submit" class="btn btn-primary px-5 text-center d-block" value="Tambahkan">
						</div>
					</div>
	            </div>
	          </form><!-- END -->
            </div>
        </div>
    </div>
</section> <!-- .section -->

<script src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
<script>
    $(document).ready(function() {

        CKEDITOR.replace('description', {
            height: '600px'
        });
	});
</script>