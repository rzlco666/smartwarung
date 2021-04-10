<?PHP $this->session->set_userdata('url',$_SERVER['HTTP_REFERER']) ?>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
                <form action="<?php echo site_url('admin/save_week_sale/')?>" class="billing-form" method="post" enctype='multipart/form-data'> 
                <h3 class="mb-4 billing-heading">Add Barang Week Sale</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-12">
						<div class="form-group">
							<label for="firstname">Nama Barang</label>
							<select id="select_barang" name="name" class="form-control">
								<option value="" selected disabled>-- Pilih Barang --</option>
								<?php foreach ($item as $key) {?>
								<option value="<?=$key->id?>"><?=$key->name?></option>
								<?php }?>
							</select>
                            <?php echo form_error('name', '<small class="text-danger error">', '</small>'); ?>
						</div>
					</div>
					<div class="w-100"></div>
					<div class="col-md-6 pb-3">
						<label for="username">Discount</label>
                        <input type="number" min="0" class="form-control" name="discount" placeholder="Discount" >
                        <?php echo form_error('discount', '<small class="text-danger error">', '</small>'); ?>
					</div>
					<div class="w-100"></div>
					<div class="offset-md-4 col-md-2 mt-4">
						<div class="form-group">
							<input type="submit" class="btn btn-primary px-5 text-center d-block" value="Simpan">
						</div>
					</div>
	            </div>
	          </form><!-- END -->
            </div>
        </div>
    </div>
</section> <!-- .section -->



<!-- Select2 JS --> 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
$(document).ready(function(){
 
 // Initialize select2
 $("#select_barang").select2();
});
</script>