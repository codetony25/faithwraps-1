<div class="row billingslide">
    <h2 class="text-center">Checkout</h2>
    <div class="col-xs-12">
        <ul class="nav nav-pills nav-justified thumbnail">
            <li class="active"><a href="#">
                <h4 class="list-group-item-heading">Step 1</h4>
                <p class="list-group-item-text">Shipping Information</p>
            </a></li>
            <li class="disabled"><a href="#">
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

<div class="shipping">
    <form action="/" method="post" class="form-shipping">
        <h2 class="form-signin-heading text-center">Shipping Information:</h2>
        <label for="inputFirstName">First Name</label>
        <input type="text" id="inputFirstName" name="first_name" class="form-control"autofocus>
        <label for="inputLastName">Last Name</label>
        <input type="text" id="inputLastName" name="last_name" class="form-control" >
        <label for="inputAddress1">Address Line 1</label>
        <input type="text" id="inputAddress1" name="address1" class="form-control" >
        <label for="inputAddress2">Address Line 2 (Optional)</label>
        <input type="text" id="inputAddress2" name="address2" class="form-control" >
        <label for="inputCity">City</label>
        <input type="text" id="inputCity" name="city" class="form-control" >
        <label for="inputCountry">Country</label>
        <select name="country" id="inputCountry" class="form-control">
            <option value="US">United States</option>
            <option value="CANADA">Canada</option>
            <option value="VIETNAM">Vietnam</option>
            <option value="RUSSIA">Russia</option>
        </select>
        <label for="inputZip">Zip Code</label>
        <input type="text" id="inputZip" name="zipcode" class="form-control" >
        <button class="btn btn-info form-control">Continue</button>
    </form>
</div><!-- END OF SHIPPING -->





  