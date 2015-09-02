<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php if(!isset($title)){ echo "FaithWraps"; } else {echo $title;} ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/fonts/font-awesome.css">
    <link rel="stylesheet" href="/assets/js/vendor/slick/slick.css">
    <link rel="stylesheet" href="/assets/js/vendor/slick/slick-theme.css">
    <link rel="stylesheet" href="/assets/css/normalize.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    <script src="/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
    <div class="container">
    <!-- NAVBAR FOR MOBILE DEVICES -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#navbar-brand-centered" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <div class="navbar-brand navbar-brand-centered">FaithWraps</div>
                        <div class="shoppingcart">
                            <h3><a href="#"><i class="fa fa-shopping-cart"></i></a></h3>
                        </div><!-- END OF SHOPPINGCART -->
                    </div><!-- END OF NAVBAR-HEADER -->
                    <!-- Collect the nav links, forms, and other content for toggling -->
                     <div class="collapse navbar-collapse" id="navbar-brand-centered">
                          <ul class="nav navbar-nav">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">FaithWraps</a></li>
                            <li><a href="#">Limited Ed.</a></li>
                          </ul>
                          <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">Leather & Feather</a></li>
                            <li><a href="#">Affirmations in a Bottle</a></li>
                            <li><a href="#">Sign In</a></li>
                            <li class="shoppingcartmobile"><a href="#"><i class="fa fa-shopping-cart"></i></a></li>               
                          </ul>                      
                    </div><!-- END OF END OF SHOPPINGCARTTABLET -->
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav><!-- END OF NAV -->

        <main>

    <?php echo $body; ?>

        </main>
    </div><!-- END OF CONTAINER -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 form">
                    <h6>Copyright &copy; 2015 - Team Tony is Awesome!</h6>
                    <p class="text-center">Subscribe now to receive newsletters!</p>
                    <form action="" method="post" id="newsletter">
                        <input type="text" name="email" class="form-control" placeholder="example@example.com">
                        <button class="btn btn-info form-control">Submit</button>
                    </form>
                    <ul class="socialiconstablet">
                        <li><a href="#" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div><!-- END OF COLUMN -->
                <div class="col-sm-4">
                    <ul>
                        <li class="contactinfo"><button class="btn btn-success btnfooter"><a href="#">Contact Us</a></button></li>
                        <li><button class="btn btn-success btnfooter"><a href="#">About Us</a></button></li>
                        <li><button class="btn btn-success btnfooter"><a href="#">FAQ</a></button></li>
                        <li><button class="btn btn-success btnfooter"><a href="#">Privacy</a></button></li>
                        <li><button class="btn btn-success btnfooter"><a href="#">Terms and Conditions</a></button></li>
                    </ul>
                </div><!-- END OF COLUMN -->
                <div class="col-sm-4">
                    <ul class="socialiconsmobile">
                        <li><a href="#" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                    <div class="contact">
                        <h3 class="text-center">Contact Us</h3>
                        <p class="text-center"><a href="#">Info@FaithWraps.com</a></p>
                        <p>For general information about FaithWraps or our products.</p>
                        <p class="text-center"><a href="#">TechSupport@FaithWraps.com</a></p>
                        <p>For problems with logging into your account or other questions related to our website.</p>
                        <p class="text-center"><a href="#">CustomerSupport@FaithWraps.com</a></p>
                        <p>For questions regarding sales, pending orders, or other general transactions.</p>
                    </div><!-- END OF CONTACT -->
                </div><!-- END OF COLUMN -->
            </div><!-- END OF ROW -->
        </div><!-- END OF CONTAINER -->
    </footer>

    <script src="/assets/js/vendor/jquery-1.11.3.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/vendor/jquery.validate.js"></script>
    <script src="/assets/js/vendor/slick/slick.js"></script>
    <script src="/assets/js/plugins.js"></script>
    <script src="/assets/js/main.js"></script>
    <?php
        if (isset($js_files)) {
            foreach ($js_files as $file) {
                echo "<script src='/assets/js/{$file}'></script>";
            }
        }
    ?>
</body>
</html>
