$(document).ready(function() {

	function draw_sub_nav(formScope) {
	// Draws the proper sub navigation
		
		// Special cases for different nav drawing
		if (formScope == "orders") { draw_orders_nav(formScope); return; }
		else if (formScope == "users") { draw_users_nav(formScope); return; }

		// Controller that handles returning nav list in json
		jsonUrl = '/admins/control_get/' + formScope;

		// Everytime we draw a sub navigation clear the #form_holder and #messages
		$('#form_holder').html('');
		$('#messages').html('');

		// Make the ajax call and draw the list items
		$.get(jsonUrl, function(list) {
			var buf = "<ul>";
			buf += "<li data-id='add' data-scope='" + formScope + "'><b>Add New</b></li>";
			for(var i=0; i<list.length; i++) {
					buf += "<li data-id='" + list[i].id + "' data-scope='" + formScope + "'>" + list[i].name + "</li>";
			}
			buf += "</ul>";
			$('#sub_nav').html(buf);
		}, 'json');
	}

	function draw_orders_nav(formScope) {
	// Draws the proper sub navigation
		jsonUrl = '/admins/control_get/orders/';
		// Everytime we draw a sub navigation clear the #form_holder and #messages
		$('#form_holder').html('');
		$('#messages').html('');

		$.get(jsonUrl, function(list) {
			var buf = "<ul>";

			// Sort by items that need to be shipped
			list.sort(function compare(a,b) {
			  if (a.shipped < b.shipped)
			    return -1;
			  if (a.shipped > b.shipped)
			    return 1;
			  return 0;
			});

			for(var i=0; i<list.length; i++) {
					buf += "<li data-id='" + list[i].id + "' data-scope='" + formScope + "'>";
					if (list[i].shipped == 0) { buf += "<b>"; }
					buf += "Order #: " + list[i].id;
					if (list[i].shipped == 0) { buf += "</b>"; }
					buf += "</li>";
			}
			buf += "</ul>";
			$('#sub_nav').html(buf);
		}, 'json');
	}
	
	function draw_users_nav(formScope) {
	// Draws the proper sub navigation
		jsonUrl = '/admins/control_get/' + formScope;
		// Everytime we draw a sub navigation clear the #form_holder and #messages
		$('#form_holder').html('');
		$('#messages').html('');

		$.get(jsonUrl, function(list) {
			var buf = "<ul>";
			for(var i=0; i<list.length; i++) {
					buf += "<li data-id='" + list[i].id + "' data-scope='" + formScope + "'>" + "(" + list[i].id + ") " + list[i].email + "</li>";
			}
			buf += "</ul>";
			$('#sub_nav').html(buf);
		}, 'json');
	}

	$(document).on('click', '#products, #gems, #galleries, #orders, #users', function(e){
		url = '/admins/control_get/' + e.target.id;
		scope = e.target.id;
		draw_sub_nav(scope);			
	});

	// Creating the add/edit forms
	$(document).on('click', "li[data-scope]", function(e) {
		var id = $(this).data('id');
		var scope = $(this).data('scope');
		$('#messages').html('');
		$.get('/admins/make_form/' + scope + '/' + id, function(res) {
			$('#form_holder').html(res);
		}, 'html');
	});

	$(document).on('submit',"#edit_form", function(e) {
		var scope = $(this).data('scope');
		var url = '/admins/control_edit/' + scope;

		$.post(url, $(this).serialize(), function(res) {
			if (res.success) {
				// Redraw the subnav for inserted items
				draw_sub_nav(scope);
			}
			$('#messages').html(res.message);
		}, 'json');
		return false;
	});

	$(document).on('click','.del-item', function(e) {
		if (confirm('Are you sure you want to delete this?')) {
			var this_id = $(this).data('id');
			var scope = $(this).data('scope');
			$.get('/admins/control_delete/' + scope + '/' + this_id, function(res) {
				if (res.success) {
					// Redraw the subnav for inserted items
					draw_sub_nav(scope);
				}
				$('#messages').html(res.message);
			}, 'json');
		}
	});

});
