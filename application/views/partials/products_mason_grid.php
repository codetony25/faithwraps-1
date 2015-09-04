<div class="container-fluid text-center" style="background-color: white; padding: 10px 0;">
    <h2 class="section-title section-title--gradient"><span>Some of Our Favorites</span></h2>
</div>

<div class="masonry-container">
    <div class="masonry">
        <!-- for masonry positioning purposes -->
        <div class="grid-sizer"></div>

        <?php foreach($products as $product): ?>
            <div class="mason-item">
                <img src="/assets/img/products/<?= $product['image']; ?>"/>

                <a href="/products/<?= $product['id'] ;?>" class="overlay">
                    <div class="overlay-inner text-center">
                        <h4 class="product-title"><?= $product['name']; ?></h4>
                        <div class="price">$<?=$product['price'];?></div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div><!-- /.masonry-container -->