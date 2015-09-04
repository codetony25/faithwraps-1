 <div class="container">
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
                    <th>Shipping Information</th>
                    <th>Billing Information</th>
                    <th>Last 4 of Credit Card</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <address>
                            <?= $billing['first_name'] . ' ' . $billing['last_name']; ?><br/>
                            <?= $billing['address']; ?><br/>
                            <?= $billing['address_2']; ?><br/>
                            <?= $billing['city'] . ' ' . $billing['state'] . ', ' . $billing['zip_code']; ?>
                        </address>
                    </td>
                    <td>
                        <address>
                            <?= $mailing['first_name'] . ' ' . $mailing['last_name']; ?><br/>
                            <?= $mailing['address']; ?><br/>
                            <?= $mailing['address_2']; ?><br/>
                            <?= $mailing['city'] . ' ' . $mailing['state'] . ', ' . $mailing['zip_code']; ?>
                        </address>
                    </td>
                    <td>****-****-****-<?= $this->session->userdata('last_4'); ?></td>
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
                <?php foreach($cart['items'] as $item): ?>
                    <tr>
                        <td><?= $item['product_name'] . ':' . $item['product_style_name']; ?></td>
                        <td>$ <?= $item['product_price']; ?></td>
                        <td><?= $item['qty']; ?></td>
                        <td>$ <?= number_format($item['qty'] * $item['product_price'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4" class="text-right">Sub Total: $ <?= number_format($cart['total'],2); ?></td>
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
                    <td colspan="4" class="text-right">Grand Total with Shipping and Tax: <strong>$ <?= number_format($cart['total'],2); ?></strong></td>
                </tr>
                <tr>
                    <td colspan="4" class="text-right"><a href="#"><button class="btn btn-success">Edit</button></a><a href="#"><button class="btn btn-info">Proccess Order</button></a></td>
                </tr>
            </tbody>
        </table>  
    </div><!-- END OF REVIEW -->
</div>