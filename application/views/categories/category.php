<div class="categorydesc">
    <h2><?= $category['name'] ?></h2>
    <p><?= $category['desc'] ?></p>
</div><!-- END OF PRODUCTDESC -->

<div class="items">
    <div class="row">
        <?php
        	foreach ($products as $product) {
        ?>		
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        		<div class="itembox">
        			<a href='/products/<?= xss_clean($product['id']); ?>'>
        			<img src='/assets/img/products/<?= xss_clean($product['image']); ?>'  />
        			<h4><?= xss_clean(ucwords($product['name'])); ?></h4>
        			</a>
                    <p>$<?= xss_clean($product['price']); ?></p>
        		</div>
        </div><!-- END OF COLUMN -->
        <?php	} ?>
                
    </div>
</div><!-- END OF ITEMS -->