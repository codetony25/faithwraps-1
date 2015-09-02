<div class="productdesc">
    <h2><?= $category['name'] ?></h2>
    <p><?= $category['desc'] ?></p>
</div><!-- END OF PRODUCTDESC -->

<div class="items">
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <?php
        	foreach ($products as $product) {
        ?>		
        		<div>
        			<a href='/products/<?= $product['id']; ?>'><h4>Bottle Set Trust</h4><img src='/assets/img/<?= $style['image']; ?>'  /></a>
        		</div>
        <?php	} ?>
                
                <button class="btn btn-info">Buy Now! $59.99</button>
        </div><!-- END OF COLUMN -->
</div><!-- END OF ITEMS -->