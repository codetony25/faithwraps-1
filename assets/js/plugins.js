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

//Set Defaults for validations

  $("#newsletter").validate({
    rules: {
      email: {
        required: true,
        email: true,
        maxlength: 255
      }
    }
  });

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
      confirm_password: "Passwords do not match, please try again."
    }
  });//end of register form

}); //end of ready













