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
<!--     <link href='https://fonts.googleapis.com/css?family=Alex+Brush' rel='stylesheet' type='text/css'> -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/fonts/font-awesome.css">
    <link rel="stylesheet" href="/assets/js/vendor/slick/slick.css">
    <link rel="stylesheet" href="/assets/js/vendor/slick/slick-theme.css">
    <link rel="stylesheet" href="/assets/css/normalize.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    <script src="/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>

    <!-- NAVBAR FOR MOBILE DEVICES -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid logo">
                <h1 id="logo-main" class="hidden-xs">FaithWraps</h1>
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#navbar-brand-centered" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <h1 id="logo-main2" class="hidden-sm hidden-md hidden-lg">FaithWraps</h1>
                        <div class="shoppingcart">
                            <h3 class=""><a href="#"><i class="fa fa-shopping-cart"></i></a></h3>
                        </div><!-- END OF SHOPPINGCART -->
                    </div><!-- END OF NAVBAR-HEADER -->
                    <!-- Collect the nav links, forms, and other content for toggling -->
                     <div class="collapse navbar-collapse" id="navbar-brand-centered">
                          <ul class="nav navbar-nav">
                            <li><a href="/">Home</a></li>
                            <li><a href="/categories/1">FaithWraps</a></li>
                            <li><a href="/categories/2">Limited Ed.</a></li>        
                            <li><a href="/categories/3">Leather & Feather</a></li>
                            <li><a href="/categories/4">Affirmations in a Bottle</a></li>
                            <li><a href="/login">Log In</a></li>
                            <li class="shoppingcartmobile"><a href="#"><i class="fa fa-shopping-cart"></i></a></li>                  
                          </ul>                      
                    </div><!-- END OF END OF SHOPPINGCARTTABLET -->
                </div><!-- /.navbar-collapse -->
            </div><!-- END OF CONTAINER -->
        </nav><!-- END OF NAV -->
          
        <main>

    <?php echo $body; ?>

        </main>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 footerlinks ">
                    <h5>Follow Us</h5>
                    <ul class="socialiconstablet">
                        <li><a href="#" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                    <ul class="socialiconsmobile">
                        <li><a href="#" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div><!-- END OF COLUMN -->
                <div class="col-sm-4 footerlinks ">
                    <h5>Information</h5>
                    <ul>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Terms and Conditions</a></li>
                    </ul>
                </div><!-- END OF COLUMN -->
                <div class="col-sm-4 newsletter">
                    <h5>Subscribe now to receive newsletters!</h5>
                    <form action="" method="post" id="newsletter">
                        <div class="input-group">
                           <input type="text" class="form-control" placeholder="example@example.com">
                           <span class="input-group-btn">
                                <button class="btn btn-default" name="newsletter" type="button">Submit!</button>
                           </span>
                        </div>
                    </form>
                    <h6>Copyright &copy; 2015 - Team Tony is Awesome!</h6>
                </div><!-- END OF COLUMN -->
            </div><!-- END OF ROW -->
        </div><!-- END OF CONTAINER -->
    </footer>

    <script src="/assets/js/vendor/jquery-1.11.3.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/vendor/jquery.validate.js"></script>
    <script src="/assets/js/vendor/slick/slick.js"></script>
    <script src="/assets/js/vendor/masonry/masonry.pkgd.js"></script>
    <script src="/assets/js/vendor/masonry/masonry.js"></script>
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
