<?php
	// Output cleaned
?>
<h3>User Info:</h3>
<h4><?= xss_clean($user['first_name'] . " " . $user['last_name']) . " (" . $user['id'].")"; ?></h4>
<p><b>E-Mail:</b> <?= xss_clean($user['email']) ?>
<i><?= ($user['is_confirmed']) ? " Confirmed " : " Not Confirmed "; ?></i>
</p>
<p><b>Created at:</b> <?= $user['created_at']; ?></p>
<p><b>Last Login:</b> <?= $user['last_login']; ?></p>
<hr>

<h4>Shipping Address:</h4>
<address>
  <strong><?= xss_clean($mailing_address['first_name'] . " " . $mailing_address['last_name']); ?></strong><br>
  <?= xss_clean($mailing_address['address']) ?><br>
  <?= xss_clean($mailing_address['address_2']) ?><br>
  <?= xss_clean($mailing_address['city'] . ", " . $mailing_address['state'] . " " . $mailing_address['zip_code']); ?><br>
  <?= xss_clean($mailing_address['country']); ?>
</address>
<hr>
<h4>Billing Address:</h4>
<address>
  <strong><?= xss_clean($billing_address['first_name'] . " " . $billing_address['last_name']); ?></strong><br>
  <?= xss_clean($billing_address['address']) ?><br>
  <?= xss_clean($billing_address['address_2']) ?><br>
  <?= xss_clean($billing_address['city'] . ", " . $billing_address['state'] . " " . $billing_address['zip_code']); ?><br>
  <?= xss_clean($billing_address['country']); ?>
</address>
<hr>

<form role='form' method='post' id='edit_form' data-scope='users'>
		<input type='hidden' name='id' value='<?= $user['id'] ?>'>
		<input type='hidden' name='action' value='update'>
		<select class='form-control' name='level'>
		<?php
			$selected = ($user['level'] == 1) ? "selected='selected'" : "";
			echo "<option {$selected} value='1'>Not Admin</option>";
			$selected = ($user['level'] == 5) ? "selected='selected'" : "";
			echo "<option {$selected} value='5'>Is Admin</option>";
		?>
		</select>
		<div class='form-group'>
			<button class='btn btn-primary'>Change Admin Status</button>
		</div>
</form>