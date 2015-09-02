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
		<label for='qty'>Quantity Available</label>
		<input class='form-control' type='text' name='qty' value='<?= $product['qty'] ?>'>				
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
<h1>Styles</h1>
<div id='this_product_style_form'>
</div>
<div id='this_product_styles'>
</div>
<script>
	function draw_styles() {
		$.get('/admins/control_get/product_styles/product_id/' + <?= $product['id'] ?>, function(list) {
			$('#this_product_style_form').html('');
			var buf = "<ul>";
			buf += "<li data-id='add' data-innerscope='product_styles'><b>Add New</b></li>";
			for(var i=0; i<list.length; i++) {
					buf += "<li data-id='" + list[i].id + "' data-innerscope='product_styles'>" + list[i].name + "</li>";
			}
			buf += "</ul>";
			$('#this_product_styles').html(buf);
		}, 'json');
	}

	draw_styles();

	// Creating the add/edit form for styles
	$(document).on('click', "li[data-innerscope]", function(e) {
		var id = $(this).data('id');
		$('#messages').html('');
		$.get('/admins/make_form/product_styles/' + id, function(res) {
			console.log('INSIDE ' + scope + ' FORM BUILDER');
			$('#this_product_style_form').html(res);
			$('#edit_styles_form').find('#input_product_id').val(<?= $product['id']; ?>);
		}, 'html');
	});

	$(document).on('submit',"#edit_styles_form", function(e) {
		$.post('/admins/control_edit/product_styles', $(this).serialize(), function(res) {
			if (res.success) {
				// Redraw the styles for inserted items
				draw_styles();
			}
			$('#messages').html(res.message);
		}, 'json');
		return false;
	});

	$(document).on('click','.del-style', function(e) {
		if (confirm('Are you sure you want to delete this?')) {
			var this_id = $(this).data('id');
			$.get('/admins/control_delete/product_styles/' + this_id, function(res) {
				if (res.success) {
					// Redraw the styles for inserted items
					draw_styles();
				}
				$('#messages').html(res.message);
			}, 'json');
		}
	});
</script>