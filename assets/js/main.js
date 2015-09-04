$(function(){

// Hooking up subscribing to the newsletter
	$('#newsletter').submit(function(e) {
		$.post('/newsletter', $(this).serialize(), function(res) {
			$('#newsletter-msg').html('<mark>' + res + '</mark>');
			$('#newsletter').find('input').val('');
		},'html');
		return false;
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
	
// Make footer stay on the bottom
	var docHeight = $(window).height();
	var footerHeight = $('footer').height();
	var footerBottom = $('footer').position().top + footerHeight;
	
   if (footerBottom < docHeight) {
   	console.log('running');
    	$('footer').css('margin-top', (docHeight - footerBottom - 40) + 'px');
   }

// Homepage twitter feed
	$('#twitter-feed .tweet').each(function(e) {
		if (e != 0)
			$(this).hide();
	});

	var twitter_feed_next = function() {
		if ($("#twitter-feed .tweet:visible").next().length != 0) {
			$("#twitter-feed .tweet:visible").fadeOut(250, function(){
				$(this).next().fadeIn(250);
			});
		}
		else {
			$("#twitter-feed .tweet:visible").fadeOut(250, function(){
				$("#twitter-feed .tweet:first").fadeIn(250);
			});
			
		}
		restart_twitter_timer();
	    return false;	
	};

	$('#twitter-feed .nav.next').click(twitter_feed_next);

	$('#twitter-feed .nav.prev').click( function() {
		if ($("#twitter-feed .tweet:visible").prev().length != 0) {
			$("#twitter-feed .tweet:visible").fadeOut(250, function(){
				$(this).prev().fadeIn(250);
			});
		}
		else {
			$("#twitter-feed .tweet:visible").fadeOut(250, function(){
				$("#twitter-feed .tweet:last").fadeIn(250);
			});
		}
		restart_twitter_timer();
	    return false;
	});

	var twitter_feed_timer = setInterval(twitter_feed_next, 5000);

	function restart_twitter_timer()
	{
		clearTimeout(twitter_feed_timer);
		twitter_feed_timer = setInterval(twitter_feed_next, 5000);
	}

	/* Start of Homepage Banner script */
	var fwBanner = fwBanner || {};

	fwBanner.getMeasurements = function() {
		fwBanner.measurements = {
			windowHeight: fwBanner.cache.$win.height(),
			navHeight: fwBanner.cache.$nav.height(),
			headerHeight: fwBanner.cache.$header.height()
		}
	}

	fwBanner.cacheSelectors = function() {
		fwBanner.cache = {
			$win: $(window),
			$nav: $('nav'),
			$header: $('header'),
			$outerBanner: $('.header-display-wrapper'),
			$innerBanner: $('.header-display')
		}
	}

	fwBanner.setHeaderHeight = function() {
		var height = fwBanner.measurements.windowHeight - fwBanner.measurements.navHeight;
		fwBanner.cache.$header.css({
			'height': height + 'px',
			'margin-top': fwBanner.measurements.navHeight + 'px'
		});
	}

	fwBanner.init = function() {
		fwBanner.cacheSelectors();
		fwBanner.getMeasurements();
		fwBanner.setHeaderHeight();
	}

	fwBanner.init();

	$(window).resize(function() {
		fwBanner.getMeasurements();
		fwBanner.setHeaderHeight();
	})
	/* End of Homepage Banner script */

	$(window).on( 'resize', fontResize);

<<<<<<< HEAD
=======
	function fontResize() {
		var ratio = $('.mason-item').width()/110;

		$('.mason-item .product-title').css('font-size', ratio + "em");
	}

	fontResize();
>>>>>>> 656cc9c4a4632852bc3c6b09d0e7b3335c4f6b0f

});//end ready

