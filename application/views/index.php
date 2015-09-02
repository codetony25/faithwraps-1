<div class="row">
    <div class="col-sm-6">
        <header>
            <div class="mainpics">
                <div><img src="/assets/img/main/01.jpg" title="Bottle Ring Strength" /></div>
                <div><img src="/assets/img/main/02.jpg" title="Mother Wonderland" /></div>
                <div><img src="/assets/img/main/03.jpg" title="Tranformation Mistloe" /></div>
            </div><!-- END OF MAINPICS -->
        </header>
    </div><!-- END OF COL-SM-6 -->
    <div class="col-sm-6 slogan">
        <h1 class="text-center">Welcome to FaithWraps</h1>
        <p>The FaithWrap is style meant to stimulate the mind, body and soul. This unique collection created by designer Faith Benoit is not only fashionable, but composed to unleash energy we all harbor to better our daily lives. Each piece is hand-crafted with a natural gem, selected for its distinguishing attributes to enhance specific qualities within us. Are you looking to ease your anxiety, find some inner-peace and love, enable the adventurer within, or just make a fashion statement? With this special collection, there's a Wrap for everyone.</p>
    </div><!-- END OF SLOGAN -->
</div><!-- END OF ROW -->
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