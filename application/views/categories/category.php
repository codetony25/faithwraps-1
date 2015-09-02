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
        			<a href='/products/<?= $product['id']; ?>'>
        			<img src='/assets/img/products/<?= $product['image']; ?>'  />
        			<h4><?= $product['name']; ?></h4>
        			</a>
	                <p>$<?= $product['price']; ?></p>
        		</div>
        </div><!-- END OF COLUMN -->
        <?php	} ?>
                
    </div>
</div><!-- END OF ITEMS -->