<div class="row billingslide">
    <h2 class="text-center">Checkout</h2>
    <div class="col-xs-12">
        <ul class="nav nav-pills nav-justified thumbnail">
            <li class="#"><a href="#">
                <h4 class="list-group-item-heading">Step 1</h4>
                <p class="list-group-item-text">Shipping Information</p>
            </a></li>
            <li class="#"><a href="#">
                <h4 class="list-group-item-heading">Step 2</h4>
                <p class="list-group-item-text">Billing Information</p>
            </a></li>
            <li class="active"><a href="#">
                <h4 class="list-group-item-heading">Step 3</h4>
                <p class="list-group-item-text">Review Information</p>
            </a></li>
        </ul>
    </div>
</div>

<div class="review">
    <h2 class="text-center">Review Order</h2>
    <table class="table table-striped">
        <thead>
            <tr> 
                <th>Name</th>
                <th>Shipping Information</th>
                <th>Billing Information</th>
                <th>Credit Card Information</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Anthony Benoit</td>
                <td>490 E Main Street, Norwich CT 06360</td>
                <td>490 E Main Street, Norwich CT 06360</td>
                <td>Credit Card Number: ****-****-****-4319</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Transformation Mistletoe</td>
                <td>$59.99</td>
                <td>2</td>
                <td>$119.98</td>
            </tr>
            <tr>
                <td>Black Earrings</td>
                <td>$59.99</td>
                <td>2</td>
                <td>$119.98</td>
            </tr>
            <tr>
                <td colspan="4" class="text-right">Sub Total: $239.96</td>
            </tr>
            <tr>
                <td colspan="4" class="text-right">
                    <p>Select Shipping Method</p>
                    <form action="/" method="post">
                        <select name="shippingprice">
                            <option value="#">USPS</option>
                            <option value="#">UPS</option>
                            <option value="#">FedEx</option>
                        </select>
                    </form>
                </td>
            </tr>
            <tr>
                <td colspan="4" class="text-right">Grand Total with Shipping and Tax: <strong>$259.12</strong></td>
            </tr>
            <tr>
                <td colspan="4" class="text-right"><a href="#"><button class="btn btn-success">Edit</button></a><a href="#"><button class="btn btn-info">Proccess Order</button></a></td>
            </tr>
        </tbody>
    </table>  
</div><!-- END OF REVIEW -->