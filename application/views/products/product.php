<div class="item">
    <div class="row">

        <div class="col-md-6 productimgs">
            <img src="/assets/img/products/<?= $styles[0]['image']; ?>" class="mainitemimg" alt="">
            <div class="itemthumbnail">
                <div class="row">
                    <?php foreach($styles as $style): ?>
                        <div class="col-xs-3 productimg">
                            <img src="/assets/img/products/<?= $style['image']; ?>" class="thumbnail" alt="">
                        </div>
                    <?php endforeach; ?>
                </div><!-- END OF ROW -->
            </div><!-- END OF ITEMTHUMBNAIL -->
        </div><!-- END OF COL-MD-6 -->

        <div class="col-md-6 productdesc">
            <h2><?= ucwords($product['name']); ?></h2>
            <div class="itemabout">
                <p><?= xss_clean($product['desc']); ?></p>

                <?= form_open('/shop/add_to_cart', 'class="form-horizontal" style="padding: 1.5em 0; border-bottom: 1px solid #eee;"'); ?>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Price:</label>
                        <div class="col-sm-4"><h4>$ <?= $product['price']; ?></h4></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="product_style">Style:</label>
                        <div class="col-sm-4">
                            <select name="product_style" id="product_style" class="form-control">
                                <option value=""></option>
                                <?php foreach($styles as $style): ?>
                                    <option value="<?= $style['id']; ?>"><?= $style['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group qty">
                        <label class="col-sm-2 control-label" for="product_qty">Qty:</label>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="product_qty" min="0" max="<?= $product['qty'];?>" step="1">
                        </div>
                        <?php if ($product['qty'] <= 5 ): ?>
                            <em>Only <?=$product['qty'];?> left in stock!</em>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <button class="btn btn-info form-control">Buy Now</button> 
                        </div>
                    </div>
                </form>

                <div class="product-details">
                    <h4>About The Gem</h4>

                    <dl class="dl-horizontal">
                        <dt>Color</dt>
                        <dd><?= $gem['colors']; ?></dd>
                        <dt>Energies</dt>
                        <dd><?= $gem['energies']; ?></dd>
                        <dt>Chakra</dt>
                        <dd><?= $gem['chakras']; ?></dd>
                    </dl>
                    <p><?= $gem['desc']; ?></p>
                </div>
                
            </div>
            
        </div><!-- END OF COL-MD-6 -->

    </div><!-- END OF ROW -->
</div><!-- END OF PRODUCT -->

<div class="similaritems">
    <h2 class="text-center">Similar Items</h2>
    <div class="products">
        <?php foreach($similar as $product): ?>
            <div>
                <a href="/products/<?= $product['id'] ;?>">
                    <img src="/assets/img/products/<?= $product['image']; ?>"  />
                    <h4><?= $product['name']; ?></h4>
                </a>
                <p>$<?=$product['price'];?></p>
            </div>
        <?php endforeach; ?>
    </div><!-- END OF PRODUCTS -->
</div><!-- END OF SIMILARITEMS-->
