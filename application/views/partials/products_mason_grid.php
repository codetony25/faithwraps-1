<style type="text/css">
    .grid-sizer { width: 20%; }
    .mason-item { width: 20%; }

    .mason-item img { width: 100%; }

    @media screen and (max-width: 1224px) {
      .grid-sizer { width: 33.33%; }
      .mason-item { width: 33.33%; }
      .mason-item:last-of-type { display: none; }
    }

    @media screen and (max-width: 720px) {
      .grid-sizer { width: 50%; }
      .mason-item { width: 50%; }
      .mason-item:last-of-type { display: block;}
    }

    @media screen and (max-width: 480px) {
      .grid-sizer { width: 100%; }
      .mason-item { width: 100%; }
    }

    .overlay {
        width: 100%;
        height: 100%;
        background-color: rgba(255,192,203,0.8);
        position: absolute;
        top: 0;
        left: 0;
        text-decoration: none !important;
        color: #fff;
        display: none;
    }

    .overlay .overlay-inner {
        position: absolute;
        width: 85%;
        height: 85%;
        border: 12px solid white;
        margin: auto;
        left: 0; right: 0; bottom: 0; top: 0;
    }

    .overlay .product-title {
        text-align: left;
        font-size: 2.75em;
        color: #fff;
        margin: 0;
        padding: 15px 10px;
    }

    .overlay .price {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        margin: 0 auto;
        color: white;
        text-align: center;
        font-size: 1.75em;
    }

    .mason-item:hover .overlay {
        display: block;
    }

    .section-title {
        position: relative;
        text-align: center;
        font-family: "Alex Brush";
        font-size: 3em;
    }
    .section-title:after {
        background: #000000;
        content: "";
        display: block;
        height: 1px;
        position: absolute;
        top: 50%;
        width: 100%;
    }
    .section-title--gradient:after {
        background: -webkit-linear-gradient(left, #ffffff, #000000, #ffffff);
        background: -moz-linear-gradient(left, #ffffff, #000000, #ffffff);
        background: -ms-linear-gradient(left, #ffffff, #000000, #ffffff);
        background: -o-linear-gradient(left, #ffffff, #000000, #ffffff);
        background: linear-gradient(left, #ffffff, #000000, #ffffff);
    }

    .section-title span {
        background: #ffffff;
        display: inline-block;
        padding: 0 20px;
        position: relative;
        z-index: 1;
    }
</style>

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
                    <div class="overlay-inner">
                        <h4 class="product-title"><?= $product['name']; ?></h4>
                        <div class="price">$<?=$product['price'];?></div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div><!-- /.masonry-container -->