
<div class="products">
    <?php foreach($products as $product): ?>
        <div>
            <a href="/products/<?= $product['id'] ;?>">
                <img src="/assets/img/products/<?= $product['image']; ?>"  />
                <h4><?= $product['name']; ?></h4>
            </a>
            <p>$<?=$product['price'];?></p>
        </div>
    <?php endforeach; ?>
</div><!-- END OF PRODUCTS -->