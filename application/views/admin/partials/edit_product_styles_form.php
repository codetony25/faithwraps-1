<?php
	// Output cleaned
?>
<form role='form' method='post' id='edit_styles_form' data-scope='product_styles'>
	<input type='hidden' id='input_product_id' name='product_id' value=''>
	<div class='form-group'>
		<label for='name'>Name</label>
		<input class='form-control' type='text' name='name' value='<?= xss_clean($product_style['name']); ?>'>
	</div>
	<div class='form-group'>
		<label for='image'>Image Location</label>
		<input class='form-control' type='text' name='image' value='<?= xss_clean($product_style['image']); ?>'>
		<img src='/assets/img/products/<?= xss_clean($product_style['image']); ?>' alt='Style Image' class="imagedropshadow">
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
			<button data-id='<?= $product_style['id'] ?>' type='button' data-scope='product_styles' class='btn btn-danger del-style'>Delete Style</button>
			<button class='btn btn-primary gotop'>Update Style</button>
		</div>
	<?php } ?> 
</form>
