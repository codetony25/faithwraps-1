<div class="container">
    <div class="orders">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <div class="row">
                                <div class="col-xs-6">
                                    <h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
                                </div>
                                <div class="col-xs-6">
                                    <button type="button" class="btn btn-primary btn-sm btn-block">
                                        <span class="glyphicon glyphicon-share-alt"></span> Continue shopping
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        
    					<?php foreach($cart['items'] as $item): ?>
                        <div class="row">
                            <div class="col-sm-2 hidden-xs"><img class="img-responsive" src="/assets/img/products/<?= xss_clean($item['image']); ?>">
                            </div>
                            <div class="col-xs-5 col-sm-4 orderdesc">
                                <h4 class="product-name"><strong><?= xss_clean($item['product_name']); ?></strong></h4>
                                <h4><small><?= xss_clean($item['product_style_name']); ?></small></h4>
                            </div>
                            <div class="col-xs-7 col-sm-6">
                                <div class="col-xs-6 text-right">
                                    <h6><strong><?= $item['product_price'] ?> <span class="text-muted">x</span></strong></h6>
                                </div>
                                <div class="col-xs-4">
                                    <?= $item['qty']; ?>
                                </div>
                                <div class="col-xs-2">
                                    <button type="button" class="btn btn-link btn-xs">
                                        <span class="glyphicon glyphicon-trash"> </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr>
    					<?php endforeach ?>

                        <div class="row">
                            <div class="text-center">
                                <div class="col-xs-6">
                                    <h6 class="text-right">Added items?</h6>
                                </div>
                                <div class="col-xs-6">
                                    <button type="button" class="btn btn-default btn-sm btn-block">
                                        Update cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row text-center">
                            <div class="col-xs-6">
                                <h4 class="text-right">Total <strong>$<?= $cart['total'] ?></strong></h4>
                            </div>
                            <div class="col-xs-6">
                                <form method="post" action="/shipping">
                                    <button class="btn btn-success btn-block">
                                        Checkout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>
