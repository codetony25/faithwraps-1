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

//Sliding Pictures feature
$(function(){

    $('.products').slick({
            arrows: true,
          infinite: true,
          speed: 300,
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
            slidesToScroll: 1
          }
        }
         ]
    });//end of products

    $('.mainpics').slick({
        autoplay: true,
        fade: true
    });//end of mainpics




//Form validations

  //Newsletter validation
  // $("#newsletter").validate({
  //   rules: {
  //     email: {
  //       required: true,
  //       email: true,
  //       maxlength: 255
  //     }
  //   }
  // });

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
      equalTo: "Passwords do not match, please try again."
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
      }

    },
    errorPlacement: function(error, element) {
      error.insertBefore(element);
    }
  });//end of form-billing//end of shipping validation


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
      address2: {
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
    }
  });//end of form-billing validate



});//end of ready



    // errorElement: "div",
    // wrapper: "div",  // a wrapper around the error message
    // errorPlacement: function(error, element) {
    //     offset = element.offset();
    //     error.insertBefore(element);
    //     error.addClass('message');  // add a class to the wrapper
    //     error.css('position', 'absolute');
    //     error.css('left', offset.left + element.outerWidth());
    //     error.css('top', offset.top);
    // }









