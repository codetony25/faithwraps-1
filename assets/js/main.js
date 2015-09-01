$(function(){

	$('.contactinfo').click(function(){
		$('.contact').slideDown();
	});

	
//Fading in pictures on items page
	$('.itemthumbnail img').click(function(e){
		console.log('hello');
		e.preventDefault();
		$imgSrc = $(this).attr('src');
		console.log($imgSrc);
		$('.mainitemimg').fadeOut('fast', function(){
			$('.mainitemimg').attr('src', $imgSrc);
		}).fadeIn('fast');
	});

//Log in registration show or hide
	$('#noaccount').click(function(e){
		e.preventDefault();
		$('.signin').fadeOut('fast', function(){
			$('.registration').fadeIn('fast');
		});
	});

	$('#hasaccount').click(function(e){
		e.preventDefault();
		$('.registration').fadeOut('fast', function(){
			$('.signin').fadeIn('fast');
		});
	});

//Log in or registration show or hide in checkout

	$('#noaccount').click(function(e){
		e.preventDefault();
		$('.signincheckout').fadeOut('fast', function(){
			$('.registrationcheckout').fadeIn('fast');
		});
	});

	$('#hasaccount').click(function(e){
		e.preventDefault();
		$('.registrationcheckout').fadeOut('fast', function(){
			$('.signincheckout').fadeIn('fast');
		});
	});
	
});