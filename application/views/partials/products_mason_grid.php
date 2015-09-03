<style type="text/css">
    .mason-container {
        width: 100%;
        position: relative;
    }

    .box {
        float: left;
        background-color: #00ffff;
        position: relative;
    }
</style>


<div class="mason-container">
    <?php foreach($products as $product): ?>
        <div class="box">
            <a href="/products/<?= $product['id'] ;?>">
                <img src="/assets/img/products/<?= $product['image']; ?>"  />
                <h4><?= $product['name']; ?></h4>
            </a>
            <p>$<?=$product['price'];?></p>
        </div>
    <?php endforeach; ?>
</div><!-- /.mason-container -->