$(function(){


//Main full sized image
  $.fn.fullBg = function(){
    var bgImg = $(this);		
    
    function resizeImg() {
      var imgwidth = bgImg.width();
      var imgheight = bgImg.height();
			
      var winwidth = $(window).width();
      var winheight = $(window).height();
		
      var widthratio = winwidth / imgwidth;
      var heightratio = winheight / imgheight;
			
      var widthdiff = heightratio * imgwidth;
      var heightdiff = widthratio * imgheight;
		
      if(heightdiff>winheight) {
        bgImg.css({
          width: winwidth+'px',
          height: heightdiff+'px'
        });
      } else {
        bgImg.css({
          width: widthdiff+'px',
          height: winheight+'px'
        });		
      }
    } 
    resizeImg();
    $(window).resize(function() {
      resizeImg();
    }); 
  };

  $("#background").fullBg();


	
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
	
// Make footer stay on the bottom
	var docHeight = $(window).height();
	var footerHeight = $('footer').height();
	var footerBottom = $('footer').position().top + footerHeight;
	
   if (footerBottom < docHeight) {
   	console.log('running');
    $('footer').css('margin-top', (docHeight - footerBottom - 40) + 'px');
   }
	
});//end ready

