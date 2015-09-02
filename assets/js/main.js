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

//Signing In or Registering on website Location: signin.php

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

	var docHeight = $(window).height();
	var footerHeight = $('footer').height();
	var footerBottom = $('footer').position().top + footerHeight;
	
   if (footerBottom < docHeight) {
   	console.log('running');
    $('footer').css('margin-top', (docHeight - footerBottom - 40) + 'px');
   }

//Getting values from shipping and display on billing "Same as Shipping" is checked.

	$('.shipping button').click(function (){
		shipval.setItem("firstname", $('input[name=first-name]'));
	});


	$('.billing input:checkbox:checked').click(function (){
		$('.billing input[name=first_name]').val(shipval.getItem("firstname"));
	});
	
});//end ready

