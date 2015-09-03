<div class="row billingslide">
    <h2 class="text-center">Checkout</h2>
    <div class="col-xs-12">
        <ul class="nav nav-pills nav-justified thumbnail">
            <li class="#"><a href="#">
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


<div class="billinginfo">
    <div class="row">
        <div class="col-sm-6">
            <div class="billing">
                <form action="/" method="post" class="form-billing">
                    <h2 class="form-signin-heading text-center">Billing Information: </h2>
                    <label for="inputFirstName">First Name</label>
                    <input type="text" id="inputFirstName" name="first_name" class="form-control" autofocus>
                    <label for="inputLastName">Last Name</label>
                    <input type="text" id="inputLastName" name="last_name" class="form-control">
                    <label for="inputAddress1">Address Line 1</label>
                    <input type="text" id="inputAddress1" name="address1" class="form-control" >
                    <label for="inputAddress2">Address Line 2 (Optional)</label>
                    <input type="text" id="inputAddress2" name="address2" class="form-control">
                    <label for="inputCity">City</label>
                    <input type="text" id="inputCity" name="city" class="form-control">
                    <label for="inputCountry">Country</label>
                    <select name="country" id="inputCountry" class="form-control">
                        <option value="US">United States</option>
                        <option value="CANADA">Canada</option>
                        <option value="VIETNAM">Vietnam</option>
                        <option value="RUSSIA">Russia</option>
                    </select>
                    <label for="inputZip">Zip Code</label>
                    <input type="text" id="inputZip" name="zipcode" class="form-control">
                    <div class="checkbox">
                        <input type="checkbox" value="samebilling"> Same As Shipping
                    </div><!-- END OF CHECKBOX -->
                    <button>Submit</button>
                </form>
            </div><!-- END OF BILLING -->
        </div>
        <div class="col-sm-6">
            <div class="credit">
                <form class="form-horizontal" role="form" class="payment" id="cc">
                    <div id="val-errors"></div>
                    <fieldset>
                        <h2 class="form-signin-heading text-center">Payment: </h2>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">Name on Card</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" placeholder="Card Holder's Name" autocomplete="off">
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
                                    <div class="col-sm-3">
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
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">Stripe.setPublishableKey("<?=STRIPE_PUBLIC_KEY;?>");</script>