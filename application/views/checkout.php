<div class="checkout">
    <h2 class="text-center">Checkout</h2>
    <h2 class="text-center">Sign In / Register</h2>
    <div class="signincheckout">
        <form action="/" method="post" class="form-signin">
            <h2 class="form-signin-heading text-center">Sign In</h2>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div><!-- END OF CHECKBOX -->
        <button class="btn btn-lg btn-primary btn-block" type="submit">Checkout</button>
        <a class="text-center" id="noaccount" href="#">Don't have an account?</a>
        </form>
    </div><!-- END OF FORM-SIGNIN -->


    <div class="registrationcheckout">
        <form action="/" method="post" class="form-signin">
            <h2 class="form-signin-heading text-center">Register</h2>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
            <label for="inputPassconf" class="sr-only">Password Confirmation</label>
            <input type="password" id="inputPassconf" name="passconf" class="form-control" placeholder="Password Confirmation" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div><!-- END OF CHECKBOX -->
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register and Checkout</button>
        <a class="text-center" id="hasaccount" href="#">Have an account?</a>
        </form>
    </div><!-- END OF FORM-REGISTRATION -->
</div><!-- END OF CHECKOUT -->

<div class="guestcheckout">
    <h2>Or Checkout as Guest</h2>
    <button class="btn btn-success">Guest Checkout</button>
</div>
