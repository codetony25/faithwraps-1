// Change the select style drop down when a different style image is selected
$(document).on('click', "img[data-style]", function(e) {
	var style = $(this).data('style');

	$("select option").each(function() {
		if ($(this).val() == style) {
				$(this).attr('selected','selected');
		}
		
	});
});