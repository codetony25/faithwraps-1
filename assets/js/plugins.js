// Avoid `console` errors in browsers that lack a console.
(function() {
		var method;
		var noop = function () {};
		var methods = [
				'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
				'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
				'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
				'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
		];
		var length = methods.length;
		var console = (window.console = window.console || {});

		while (length--) {
				method = methods[length];

				// Only stub undefined methods.
				if (!console[method]) {
						console[method] = noop;
				}
		}
}());

// Place any jQuery/helper plugins in here.


$(function(){
		//Sliding Pictures feature slick
		$('.products').slick({
					infinite: true,
					speed: 750,
					autoplay: true,
					slidesToShow: 4,
					slidesToScroll: 4,
					responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
						infinite: true
					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						arrows: false
					}
				}
				 ]
		});//end of products

		$('.mainpics').slick({
				autoplay: true,
				fade: true
		});//end of mainpics

		//Random Slider
		$('.randomProducts').slick({
					infinite: true,
					speed: 750,
					autoplay: true,
					slidesToShow: 4,
					slidesToScroll: 4,
					responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
						infinite: true
					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						arrows: false
					}
				}
				 ]
		});//end of randomProducts

	//Login Form validation
	$( "#login-form" ).validate({
		rules: {
			email: {
				required: true,
				email: true,
				maxlength: 255
			},
			password: {
				required: true,
				minlength: 8,
				max_length: 255
			}
		},
		messages: {
			email: {
				required: "E-mail field can not be left empty",
				maxlength: "Your e-mail is too long for acceptance"
			},
			password: {
				required: "Password field can not be left empty",
				minlength: "Your password must be 8 characters or more.",
				maxlength: "Your password is too long for acceptance"
			}
		}
	});//end of login form

	//Registration form registration
	$("#register-form").validate({
		rules: {
			email: {
				required: true,
				email: true,
				maxlength: 255
			},
			password: {
				required: true,
				maxlength: 255,
				minlength: 8
			},
			confirm_password: {
				required: true,
				minlength: 8,
				equalTo: "#password"
			}
		},
		messages: {
			email: {
				required: "E-mail field can not be left empty",
				maxlength: "Your email is too long for acceptance"
			},
			confirm_password: {
				required: "Confirm password field can not be left empty",
				equalTo: "Password does not match, please try again",
				minlength: "Your confirm password must be 8 characters or more"
			},
			password: {
				required: "Password field can not be left empty",
				minlength: "Your password must be 8 characters or more.",
				maxlength: "Your password is too long for acceptance"
			}
		}
	});//end of register form

	//Shipping validation
	$(".form-shipping").validate({
		rules: {
			first_name: {
				required: true,
				minlength: 2
			},
			last_name: {
				required: true,
				minlength: 2
			},
			address1: {
				required: true
			},
			city: {
				required: true
			},
			country: {
				required: true
			},
			zipcode: {
				required: true
			},
			messages: {
				first_name: {
					required: "First name is required.",
					minlength: "First name must be 2 characters or more."
				},
				last_name: {
					required: "Last name is required.",
					minlength: "Last name must be 2 characters or more."
				},
				address1: {
					required: "Address field is required"
				},
				city: {
					required: "City field is required"
				},
				country: {
					required: "Country selection is required"
				},
				zipcode: {
					required: "Zip code is required"
				}
			}

		},
		errorPlacement: function(error, element) {
			error.insertBefore(element);
		}
	});//end of shipping validation


	//Billing Information
	$(".form-billing").validate({
		rules: {
			first_name: {
				required: true,
				minlength: 2
			},
			last_name: {
				required: true,
				minlength: 2
			},
			address1: {
				required: true
			},
			city: {
				required: true
			},
			country: {
				required: true
			},
			zipcode: {
				required: true
			}

		},
		errorPlacement: function(error, element) {
			error.insertBefore(element);
		},
		messages: {
				first_name: {
					required: "First name is required.",
					minlength: "First name must be 2 characters or more."
				},
				last_name: {
					required: "Last name is required.",
					minlength: "Last name must be 2 characters or more."
				},
				address1: {
					required: "Address field is required"
				},
				city: {
					required: "City field is required"
				},
				country: {
					required: "Country selection is required"
				},
				zipcode: {
					required: "Zip code is required"
				}
			}
	});//end of form-billing validate
 
 	//Masonry Gallery
	$(window).load(function(){ 
		$('.masonry').masonry({
		'itemSelector': ".mason-item",
		'columnWidth': ".grid-sizer"
		}); 
	});

	//Sticky category title
	// $('.category-banner').sticky({ topSpacing: 0 });
	// $(window).scroll(function(){
	//   var sticky = $('.category-banner'),
	//       scroll = $(window).scrollTop();

	//   if (scroll >= 300) $('.category-banner').css('position', 'fixed')
	//   else if (scroll <=  300)$('.category-banner').css('position', 'relative')
	// });


});//end of ready









