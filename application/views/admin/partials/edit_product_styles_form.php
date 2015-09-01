<form role='form' method='post' id='edit_form' data-scope='product_styles'>
	<div class='form-group'>
		<label for='name'>Name</label>
		<input class='form-control' type='text' name='name' value='<?= $product_style['name'] ?>'>
	</div>
	<div class='form-group'>
		<label for='product_id'>Select Product for this Style</label>
		<select class='form-control' name='product_id'>
		<?php
			foreach ($products as $product) {
				$selected = ($product_styles['product_id'] == $product['id']) ? "selected='selected'" : "";
				echo "<option {$selected} value='{$product['id']}'>{$product['name']}</option>";
			}
		?>
		</select>	
	</div>
	<div class='form-group'>
		<label for='image'>Image Location</label>
		<input class='form-control' type='text' name='image' value='<?= $product_style['image'] ?>'>	
	</div>
	<div class='form-group'>
		<label for='qty'>Quantity Available</label>
		<input class='form-control' type='text' name='qty' value='<?= $product_style['qty'] ?>'>				
	</div>			
	<?php if ($is_new) { ?>
		<div class='form-group'>
			<input type='hidden' name='action' value='create'>
			<button class='btn btn-primary'>Create Style</button>
		</div>
	<?php } else { ?>
		<input type='hidden' name='id' value='<?= $product_style['id'] ?>'>
		<input type='hidden' name='action' value='update'>
		<div class='form-group'>
			<button data-id='<?= $product_style['id'] ?>' type='button' data-scope='product_styles' class='btn btn-danger del-item'>Delete Style</button>
			<button class='btn btn-primary'>Update Style</button>
		</div>
	<?php } ?> 
</form>