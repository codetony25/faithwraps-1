$(document).ready(function() {
	
	function draw_sub_nav(formScope) {
	// Draws the proper sub navigation
		jsonUrl = '/admins/get_admin/' + formScope;
		// Everytime we draw a sub navigation clear the edit_form div
		$('#form_holder').html('');

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

	$(document).on('click', '#products, #product_styles, #gems, #galleries', function(e){
		url = '/admins/get_admin/' + e.target.id;
		scope = e.target.id;
		draw_sub_nav(scope);
	});

	// Creating the add/edit forms
	$(document).on('click', "li[data-scope]", function(e) {
		var id = $(this).data('id');
		var scope = $(this).data('scope');
		$.get('/admins/make_form/' + scope + '/' + id, function(res) {
			console.log('INSIDE ' + scope + ' FORM BUILDER');
			$('#form_holder').html(res);
		}, 'html');
	});

	$(document).on('submit',"#edit_form", function(e) {
		var scope = $(this).data('scope');
		var url = '/admins/control_edit/' + scope;
			console.log($(this).serialize());
	
		$.post(url, $(this).serialize(), function(res) {
			console.log('INSIDE ' + url + ' RESPONSE');
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
				console.log('In deleting ' + scope + ' ajax response');
				console.log(res.success);
				if (res.success) {
					// Redraw the subnav for inserted items
					draw_sub_nav(scope);
				}
				$('#messages').html(res.message);
			}, 'json');
		}
	});

});
