$(document).ready(function() {
	
	function draw_sub_nav(jsonUrl, className) {
	// Takes a url that returns json data to draw and a className for the <li>
	// Draws the proper sub navigation
		// Everytime we draw a sub navigation clear the edit_form div
		$('#edit_form').html('');

		$.get(jsonUrl, function(list) {
			var buf = "<ul>";
			buf += "<li data-id='add' class='" + className + "'><b>Add New</b></li>";
			for(var i=0; i<list.length; i++) {
				buf += "<li data-id='" + list[i].id + "' class='" + className + "'>" + list[i].name + "</li>";
			}
			buf += "</ul>";
			$('#sub_nav').html(buf);
		}, 'json');
	}

	$(document).on('click', '#products, #styles, #gems, #galleries', function(e){
		url = '/admins/get_admin/' + e.target.id;
		className = "edit_" + e.target.id;
		draw_sub_nav(url, className);
	});

	// Creating the add/edit forms
	$(document).on('click','.edit_products', function(e) {
		var id = $(this).attr('data-id');
		$.get('/admins/product_form/' + id, function(res) {
			console.log('Inside edit_product form builder');
			$('#edit_form').html(res);
		}, 'html');
	});

	$(document).on('submit','#product_form', function(e) {
		$.post('/admins/edit_product', $('#product_form').serialize(), function(res) {
			console.log('Inside product_form post submit');
			if (res.success) {
				// Redraw the subnav for inserted items
				draw_sub_nav('/admins/get_admin/products', 'edit_products');
			}
			$('#messages').html(res.message);
		}, 'json');
		return false;
	});

	$(document).on('click','.del-product', function(e) {
		if (confirm('Are you sure you want to delete this?')) {
			var thisId = $(this).data('id');
			$.get('/admins/delete_product/' + thisId, function(res) {
				if (res.success) {
					// Redraw the subnav for deleted items
					draw_sub_nav('/admins/get_admin/products', 'edit_producs');
				}
				$('#messages').html(res.message);
			});
		}
	});

});
