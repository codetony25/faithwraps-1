<div class="productdesc">
    <h2><?= $category['name'] ?></h2>
    <p><?= $category['desc'] ?></p>
</div><!-- END OF PRODUCTDESC -->

<div class="items">
    <div class="row">
        <?php
        	foreach ($products as $product) {
        ?>		
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        		<div>
        			<a href='/products/<?= $product['id']; ?>'>
        			<img src='/assets/img/products/<?= $product['image']; ?>'  />
        			<h4><?= $product['name']; ?></h4>
        			</a>
	                <button class="btn btn-info">Buy Now! $<?= $product['price']; ?></button>
        		</div>
        </div><!-- END OF COLUMN -->
        <?php	} ?>
                
    </div>
</div><!-- END OF ITEMS -->