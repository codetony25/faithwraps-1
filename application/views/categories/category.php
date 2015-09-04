<div class="category-banner">
    <div class="container">
        <div class="categorydesc">
            <h2><?= $category['name'] ?></h2>
            <p><?= $category['desc'] ?></p>
        </div>
    </div>
</div>

<!-- Masonry for categories-->
<div class="container">
    <div class="masonry-container">
        <div class="masonry">
            <!-- for masonry positioning purposes -->
            <div class="grid-sizer"></div>

            <?php foreach($products as $product): ?>
                <div class="mason-item categorymason">
                <?= $product['qty'] == 0 ? '<div class="sold"><span>SOLD OUT</span></div>' : ''; ?>
                    <img src="/assets/img/products/<?= $product['image']; ?>"/>
                    <div class="categorymason">
                        <a href="/products/<?= $product['id'] ;?>" class="overlay" id="masonryoverlay">
                        <div class="overlay-inner">
                            <h4 class="product-title"><?= $product['name']; ?></h4>
                        </div>
                        </a>
                    </div>
                    <p class="text-center">$<?=$product['price'];?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div><!-- /.masonry-container -->
</div>