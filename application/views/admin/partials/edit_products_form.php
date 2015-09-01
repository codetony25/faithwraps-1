<form role='form' method='post' id='edit_form' data-scope='products'>
	<div class='form-group'>
		<label for='name'>Name</label>
		<input class='form-control' type='text' name='name' value='<?= $product['name'] ?>'>
	</div>
	<div class='form-group'>
		<label for='gem_id'>Select Gem</label>
		<select class='form-control' name='gem_id'>
		<?php
			foreach ($gems as $gem) {
				$selected = ($product['gem_id'] == $gem['id']) ? "selected='selected'" : "";
				echo "<option {$selected} value='{$gem['id']}'>{$gem['name']}</option>";
			}
		?>
		</select>
	</div>
	<div class='form-group'>
		<label for='gallery_id'>Select Gallery</label>
		<select class='form-control' name='gallery_id'>
		<?php
			foreach ($galleries as $gallery) {
				$selected = ($product['gallery_id'] == $gallery['id']) ? "selected='selected'" : "";
				echo "<option {$selected} value='{$gallery['id']}'>{$gallery['name']}</option>";
			}
		?>
		</select>	
	</div>
	<div class='form-group'>
		<label for='desc'>Description</label>
		<textarea class='form-control' name='desc'><?= $product['desc'] ?></textarea>
	</div>
	<div class='form-group'>
		<label for='price'>Price</label>
		<input class='form-control' type='text' name='price' value='<?= $product['price'] ?>'>	
	</div>
	<div class='form-group'>
		<label for='shipping'>Shipping</label>
		<input class='form-control' type='text' name='shipping' value='<?= $product['shipping'] ?>'>				
	</div>			
	<div class='form-group'>
		<label for='combined_shipping'>Combined Shipping</label>
		<input class='form-control' type='text' name='combined_shipping' value='<?= $product['combined_shipping'] ?>'>				
	</div>
	<?php if ($is_new) { ?>
		<div class='form-group'>
			<input type='hidden' name='action' value='create'>
			<button class='btn btn-primary'>Create Product</button>
		</div>
	<?php } else { ?>
		<input type='hidden' name='id' value='<?= $product['id'] ?>'>
		<input type='hidden' name='action' value='update'>
		<div class='form-group'>
			<button data-id='<?= $product['id'] ?>' type='button' data-scope='products' class='btn btn-danger del-item'>Delete Product</button>
			<button class='btn btn-primary'>Update Product</button>
		</div>
	<?php } ?> 
</form>