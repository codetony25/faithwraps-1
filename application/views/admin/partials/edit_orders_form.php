<h1>Order #<?= $order['id']; ?></h1>
<h4>User Info:</h4>
<strong><?= xss_clean($order['user_first_name'] . " " . $order['user_last_name']); ?></strong><br>
E-Mail: <?= xss_clean($order['user_email']) ?>

<?php
	if ($order['shipped'] == "0") { 
?>
		<hr>
		<h4>Order Needs to be Shipped!</h4>
		<form role='form' method='post' id='edit_form' data-scope='orders'>		
			<input type='hidden' name='id' value='<?= $order['id'] ?>'>
			<input type='hidden' name='shipped' value='1'>
			<input type='hidden' name='action' value='update'>
			<div class='form-group'>
				<label for='tracking'>USPS Tracking #</label>
				<input class='form-control' type="text" name="tracking">
				<button class="form-control btn btn-danger">Mark as Shipped</button>
			</div>
		</form>
		<hr>	
<?php
	}
?>


<h4>Shipping Address:</h4>
<address>
  <strong><?= xss_clean($order['mailing_first_name'] . " " . $order['mailing_last_name']); ?></strong><br>
  <?= xss_clean($order['mailing_address']) ?><br>
  <?= xss_clean($order['mailing_address_2']) ?><br>
  <?= xss_clean($order['mailing_city'] . ", " . $order['mailing_state'] . " " . $order['mailing_zip_code']); ?><br>
  <?= xss_clean($order['mailing_country']); ?>
</address>
<hr>
<h4>Billing Address:</h4>
<address>
  <strong><?= xss_clean($order['billing_first_name'] . " " . $order['billing_last_name']); ?></strong><br>
  <?= xss_clean($order['billing_address']) ?><br>
  <?= xss_clean($order['billing_address_2']) ?><br>
  <?= xss_clean($order['billing_city'] . ", " . $order['billing_state'] . " " . $order['billing_zip_code']); ?><br>
  <?= xss_clean($order['billing_country']); ?>
</address>
<hr>
<h2>Order Parts</h2>
<?php
	foreach ($order_parts as $part) {
		$style = xss_clean($part['style_name']);
?>
		<h4><?= xss_clean($part['product_name']); ?></h4>
		<h5><?= $style; ?></h5>
		<img src="/assets/img/products/<?= xss_clean($part['style_image']); ?>" alt="<?= $style; ?>">
		<hr>
<?php
	}
?>
<button data-id='<?= $order['id'] ?>' type='button' data-scope='orders' class='btn btn-danger del-item'>Remove this Order</button>
