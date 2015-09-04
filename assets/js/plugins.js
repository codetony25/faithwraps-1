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
 
  //Homepage masonry wall
  $('.masonry').masonry({
    'itemSelector': ".mason-item",
    'columnWidth': ".grid-sizer"
  });

var fwStripe = fwStripe || {};

fwStripe.cacheSelectors = function() {
  fwStripe.cache = {
    $form: $('#cc'),
    $errors: $('#val-errors'),
    $checkoutBtn: $('#cc #checkout'),
    $name: $('#cc #name'),
    $ccNum: $('#cc #card-number'),
    $cvc: $('#cc #cvc'),
    $expMonth: $('#cc #exp-month'),
    $expYear: $('#cc #exp-year')
  }
};

fwStripe.getCardInfo = function() {
  fwStripe.card = {
    name: fwStripe.cache.$name.val(),
    ccNum: fwStripe.cache.$ccNum.val(),
    cvc: fwStripe.cache.$cvc.val(),
    expMonth: fwStripe.cache.$expMonth.val(),
    expYear: fwStripe.cache.$expYear.val()
  }
}

fwStripe.init = function() {
  fwStripe.validationError = false;
  fwStripe.errorMsgs = [];

  fwStripe.cacheSelectors();
};

fwStripe.validate = function() {
  if (! Stripe.card.validateCardNumber(fwStripe.card.ccNum)) {
    fwStripe.validationError = true;
    fwStripe.errorMsgs.push('Invalid CC Number');
  }

  if (! Stripe.card.validateCVC(fwStripe.card.cvc)) {
    fwStripe.validationError = true;
    fwStripe.errorMsgs.push('Invalid CVC');
  }

  if (! Stripe.card.validateExpiry(fwStripe.card.expMonth, fwStripe.card.expYear)) {
    fwStripe.validationError = true;
    fwStripe.errorMsgs.push('Invalid Expiration Date');
  }
};

fwStripe.createToken = function() {
    Stripe.card.createToken({
      number: fwStripe.card.ccNum,
      cvc: fwStripe.card.cvc,
      exp_month: fwStripe.card.expMonth,
      exp_year: fwStripe.card.expYear
    }, fwStripe.stripeResponseHandler);
}

fwStripe.stripeResponseHandler = function(status, response) {
  if (response.error) {
    fwStripe.errorMsgs.push(response.error.message);
    fwStripe.displayError();
    return false;
  } else { // No errors. Submit form
    var token = response.id;
    fwStripe.cache.$form.append('<input type="hidden" name="stripeToken" value="' + token + '" />');
    fwStripe.cache.$form.get(0).submit();
  }
}

fwStripe.displayError = function() {
  fwStripe.cache.$errors.html( function(){
    var html = '<div class="alert alert-warning alert-dismissible" role="alert"> \
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    
    $.each(fwStripe.errorMsgs, function(i,v){
      html += "<p>"+v+"<p>";
    });

    html += "</div>";

    return html;
  });
}

fwStripe.init();

// Validate Checkout Form
fwStripe.cache.$form.submit(function() {
  // Disable button to prevent repeated clicks
  fwStripe.cache.$checkoutBtn.attr('disabled', true);

  // Clear flag & messages
  fwStripe.validationError = false;
  fwStripe.errorMsgs = [];

  // Get Card Values
  fwStripe.getCardInfo();

  // // Validate the form
  fwStripe.validate();

  // Check for errors
  if (fwStripe.validationError) {
    // Show errors on screen
    fwStripe.displayError();

    // Re-enable button
    fwStripe.cache.$checkoutBtn.prop('disabled', false);

    // Prevent form from submitting
  } else {
    // Get token.  Chained responsehandler also submits form
    fwStripe.createToken();
  }

  return false;
});

});//end of ready









