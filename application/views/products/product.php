<br/>
<br/>
<br/>
<br/>
<br/>

<?php var_dump($product); ?>

<div class="item">
    <div class="row">
        <div class="col-md-6">
            <img src="/assets/img/bottleset_trust.jpg" class="mainitemimg" alt="">
            <div class="itemthumbnail">
                <div class="row">
                    <div class="col-xs-3">
                        <img src="/assets/img/items/bottlenecklace_trust.jpg" class="thumbnail" alt="">
                    </div>
                    <div class="col-xs-3">
                        <img src="/assets/img/items/bottlescroll_trust.jpg" class="thumbnail" alt="">
                    </div>
                    <div class="col-xs-3">
                        <img src="/assets/img/items/bottlenecklacemodel_trust.jpg" class="thumbnail" alt="">
                    </div>
                    <div class="col-xs-3">
                        <img src="/assets/img/items/bottlering_trust.jpg" class="thumbnail" alt="">
                    </div>
                </div><!-- END OF ROW -->
            </div><!-- END OF ITEMTHUMBNAIL -->
        </div><!-- END OF COL-MD-6 -->
        <div class="col-md-6">
            <h4><?= ucwords($product['name']); ?></h4>
            <div class="itemabout">
                <p><?= xss_clean($product['desc']); ?></p>
                <form action="/" method="post">
                <h4 class="text-center">Select Your Item:</h4>
                <select name="item" class="form-control">
                    <option value="Trust In A Bottle Set">Trust In A Bottle Set</option>
                    <option value="Trust In A Bottle Neckless">Trust In A Bottle Neckless</option>
                    <option value="Inside The Scroll">Inside The Scroll</option>
                    <option value="Trust In A Bottle Ring">Trust In A Bottle Ring</option>
                </select>
                <button class="btn btn-info form-control">Buy Now</button> 
            </form>
                <h4 class="text-center">About The Gem</h4>
                <p><strong>Color: </strong>Purple</p>
                <p><strong>Energies:  </strong>Intuition, Balance, Serenity, Inner Strength, Emotional Stability, Lucid Dreaming </p>
                <p><strong>Chakra: </strong>Crown and Third Eye</p>
            </div>
            <p>Amethyst is a beautiful spiritual stone, perfect for meditation and its calming affects. It works to provide the wearer with intuition, balance, peace, patience, and serenity. The stone brings inner strength and emotional stability. Amethyst is a great tool for anyone dealing with grief or loss. The stone is also used for bringing pleasant dreams and understanding them. </p>
        </div><!-- END OF COL-MD-6 -->
    </div><!-- END OF ROW -->
</div><!-- END OF ITEM -->

<div class="similaritems">
    <h2 class="text-center">Similar Items</h2>
    <div class="products">
        <div>
            <a href="#"><h4>Bottle Set Trust</h4><img src="/assets/img/bottleset_trust.jpg"  /></a>
            <button class="btn btn-info">Buy Now! $59.99</button>
        </div>
        <div>
            <a href="#"><h4>Tigresscuff</h4><img src="/assets/img/tigresscuff.jpg"  /></a>
            <button class="btn btn-info">Buy Now! $59.99</button>
        </div>
        <div>
            <a href="#"><h4>Transformation Mistletoe</h4><img src="/assets/img/transformation_mistletoe.jpg" /></a>
            <button class="btn btn-info">Buy Now! $59.99</button>
        </div>
        <div>
            <a href="#"><h4>Black Earrings</h4><img src="/assets/img/blackearrings.jpg" /></a>
            <button class="btn btn-info">Buy Now! $59.99</button>
        </div>
        <div>
            <a href="#"><h4>Relaxation Riverstone</h4><img src="/assets/img/relaxation_riverstone.jpg" /></a>
            <button class="btn btn-info">Buy Now! $59.99</button>
        </div>
        <div>
            <a href="#"><h4>Bottle Set Scroll</h4><img src="/assets/img/bottlescroll_trust.jpg" /></a>
            <button class="btn btn-info">Buy Now! $59.99</button>
        </div>
    </div><!-- END OF PRODUCTS -->
</div><!-- END OF SIMILARITEMS-->
