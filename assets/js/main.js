$(function(){

	$('.contactinfo').click(function(){
		$('.contact').slideDown();
	});

	
	$('.itemthumbnail img').click(function(e){
		console.log('hello');
		e.preventDefault();
		$imgSrc = $(this).attr('src');
		console.log($imgSrc);
		$('.mainitemimg').fadeOut('fast', function(){
			$('.mainitemimg').attr('src', $imgSrc);
		}).fadeIn('fast');
	});

});