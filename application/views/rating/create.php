<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="offset-lg-2 col-lg-4 mb-5 ftco-animate">
                <a href="<?php $photos = explode(',',$item['photo']);echo base_url('assets/uploads/').$photos[0]?>" class="image-popup"><img src="<?php echo base_url('assets/uploads/').$photos[0]?>" class="img-fluid"></a>
            </div>
            <div class="col-lg-4 product-details pl-md-5 ftco-animate">
                <h4><?php echo $item['name'] ?></h4>
                <p class="price text-small" ><span style="font-size:15px;"><?php echo "Rp ".number_format($item['price'], 0, ".", ".") ?></span></p>
                <p><?php echo $item['description'] ?></p>
            </div>
        </div>
    </div>
    <hr class="col-md-6">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 ftco-animate">
                <form action="<?php echo site_url('rating/store/').$item['id'] ?>" class="billing-form" method="POST">
                    <div class="row align-items-end">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="firstname">Ulasan</label>
                                <textarea name="review" id="description" cols="30" rows="5" class="form-control single-textarea" placeholder="Description"></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="categories">Rating</label>
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="rating" id="" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-sm btn-primary px-3 py-2" value="Submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>