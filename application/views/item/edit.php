   <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="#">Home</a></li>
                        <li class="page-breadcrumb__nav active">Edit Barang</li>
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
                <!-- login area start -->
                <div class="login-register-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                                <div class="login-register-wrapper">
                                    <div class="login-register-tab-list nav">
                                        <a class="active" data-toggle="tab">
                                            <h4>Edit Barang</h4>
                                        </a>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane active">
                                            <div class="login-form-container">
                                                <div class="login-register-form">
                                                    <form action="<?php echo site_url('item/update/').$item['id'] ?>" enctype='multipart/form-data' method="post">
                                                        <div class="form-box__single-group">
                                                            <label>Nama Barang</label>
                                                            <input type="text" class="form-control" name="name" placeholder="Nama barang" value="<?php echo $item['name'] ?>">
                                                            <?php echo form_error('name', '<small class="text-danger error">', '</small>'); ?>
                                                        </div>
                                                        <div class="form-box__single-group">
                                                            <label>Kategori</label>
                                                            <div class="select-wrap">
                                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                            <select name="category" id="" class="form-control">
                                                                <option value="">Pilih Kategori</option>
                                                                <?php foreach($categories as $category): ?>
                                                                <option value="<?php echo $category['id'] ?>" <?php echo ($item['category'] == $category['id'] ? 'selected' :'') ?> ><?php echo $category['name'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-box__single-group">
                                                            <label for="username">Stok</label>
                                                            <input type="number" class="form-control" name="stock" placeholder="Stok" value="<?php echo $item['stock'] ?>">
                                                            <?php echo form_error('stock', '<small class="text-danger error">', '</small>'); ?>
                                                        </div>
                                                        <div class="form-box__single-group">
                                                            <label for="username">Harga</label>
                                                            <input type="number" class="form-control" name="price" placeholder="Harga" value="<?php echo $item['price'] ?>">
                                                            <?php echo form_error('price', '<small class="text-danger error">', '</small>'); ?>
                                                        </div>
                                                        <div class="form-box__single-group">
                                                            <label for="username">Discount</label>
                                                            <input type="number" min="0" class="form-control" name="discount" placeholder="Discount" value="<?php echo $item['discount'] ?>">
                                                            <?php echo form_error('discount', '<small class="text-danger error">', '</small>'); ?>
                                                        </div>
                                                        <div class="form-box__single-group">
                                                            <label for="firstname">Deskripsi</label>
                                                            <textarea name="description" id="description" cols="30" rows="10" class="form-control single-textarea" placeholder="Description"><?php echo $item['description'] ?></textarea>
                                                            <?php echo form_error('description', '<small class="text-danger error">', '</small>'); ?>
                                                        </div>
                                                        <div class="form-box__single-group">
                                                            <label for="photo">Add photo</label>
                                                            <input type="file" name="files[]" multiple class="form-control">
                                                            <?php echo form_error('files', '<small class="text-danger error">', '</small>'); ?>
                                                        </div>
                                                        <div class="form-box__single-group">
                                                            <?php $photos = explode(',',$item['photo']);foreach($photos as $photo): ?>
                                                            <img style="width: 200px; height:auto;" src="<?php echo base_url('assets/uploads/').$photo ?>" class="shadow">
                                                            <?php endforeach;?>
                                                        </div>
                                                        <div class="d-flex justify-content-between flex-wrap m-tb-20">
                                                            <a href=""></a>
                                                            <a href=""></a>
                                                        </div>
                                                        <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight" type="submit">TAMBAHKAN</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- login area end -->
               </div>
            </div>
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->

    <script src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
<script>
    $(document).ready(function() {

        CKEDITOR.replace('description', {
            height: '300px'
        });
    });
</script>