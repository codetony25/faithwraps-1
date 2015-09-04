<div class="container">
    <div class="row billingslide">
        <h2 class="text-center">Checkout</h2>
        <div class="col-xs-12">
            <ul class="nav nav-pills nav-justified thumbnail">
                <li class="#"><a href="/shipping">
                    <h4 class="list-group-item-heading">Step 1</h4>
                    <p class="list-group-item-text">Shipping Information</p>
                </a></li>
                <li class="active"><a href="#">
                    <h4 class="list-group-item-heading">Step 2</h4>
                    <p class="list-group-item-text">Billing Information</p>
                </a></li>
                <li class="disabled"><a href="#">
                    <h4 class="list-group-item-heading">Step 3</h4>
                    <p class="list-group-item-text">Review Information</p>
                </a></li>
            </ul>
        </div>
    </div>

    <div class="row">
        <form action="/carts/checkout" method="post" class="form-horizontal" role="form" class="payment" id="cc">
            <div class="col-sm-6">
                <h2 class="form-signin-heading text-center">Billing Information:</h2>
                
                <div class="form-group">
                    <label for="address_1" class="col-sm-3 control-label">Address Line 1</label>
                    <div class="col-sm-9">
                        <input type="text" id="address_1" name="address_1" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="address_2" class="col-sm-3 control-label">Address Line 2 (Optional)</label>
                    <div class="col-sm-9">
                        <input type="text" id="address_2" name="address_2" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="city" class="col-sm-3 control-label">City</label>
                    <div class="col-sm-9">
                        <input type="text" id="city" name="city" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="city" class="col-sm-3 control-label">State</label>
                    <div class="col-sm-9">
                        <input type="text" id="state" name="state" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="zip_code"  class="col-sm-3 control-label">Zip Code</label>
                    <div class="col-sm-9">
                        <input type="text" id="zip_code" name="zip_code" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="country" class="col-sm-3 control-label">Country</label>
                    <div class="col-sm-9">
                        <select name="country" id="country" class="form-control">
                            <option value="US">United States</option>
                            <option value="CANADA">Canada</option>
                            <option value="VIETNAM">Vietnam</option>
                            <option value="RUSSIA">Russia</option>
                        </select>
                    </div>
                </div>   
                <div class="checkbox">
                    <input type="checkbox" value="samebilling">Same As Shipping
                </div>
            </div><!-- /.col-sm-6 -->

            <div class="col-sm-6 billing-cc">
                <h2 class="form-signin-heading text-center">Credit Card Information: </h2>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="name">Name on Card</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Card Holder's Name" autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="card-number">Card Number</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="card-number" placeholder="Debit/Credit Card Number" autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Expiration Date</label>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="exp-month" placeholder="MM" autocomplete="off" min="0" max="12" step="1"/>
                            </div>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="exp-year" placeholder="YYYY" autocomplete="off" min="<?= date("Y", time()); ?>" step="1"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="cvc">Card CVC</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control" id="cvc" placeholder="Security Code" autocomplete="off" min="0" step="1">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" id="checkout" class="btn btn-success">Continue to Checkout</button>
                    </div>
                </div>
                <div id="val-errors"></div>
            </div><!-- /.col-sm-6 -->
        </form>
    </div><!-- /.row -->
</div><!-- /.container -->

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">Stripe.setPublishableKey('<?=STRIPE_PUBLIC_KEY;?>');</script>