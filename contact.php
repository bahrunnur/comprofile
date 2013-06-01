<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
$returned = array();

// variabel indikator apakah server sudah merespons form kita
$sr = false;

if (isset($_SESSION['returned'])) {
    $returned = $_SESSION['returned'];
    $sr = true;
}

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Contact - Comprofile</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.1.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

        <!-- Add your site or application content here -->

        <header class="clearfix">
            <h1><a href="index.php"><i class="icon-double-angle-right"></i> Comprofile</a></h1>
            <nav class="site-navigation">
                <a href="about.php">About</a>
                <a href="blog.php">Blog</a>
                <a href="#">Contact</a>
            </nav>
        </header>

        <?php if ($returned['status']): ?>
        <div class="success-message">
            <p>Your message is successfully sent to us. <a href="#" class="close-button">x</a></p>
        </div>
        <?php endif; ?>

        <div class="container">
            <h2 class="page-title">Contact</h2>
            <p class="page-desc">Keep in touch with us</p>
            <div class="form-wrapper">
                <form action="proses.php" method="post" accept-charset="utf-8">
                    <label for="name">Name : </label>
                    <input type="text" name="name" id="name" value="<?php echo ($sr && $returned['status']) ? '' : $returned['formvalue']['name']; ?>">

                    <?php if ($sr && $returned['errors']['name'] != ''): ?>
                        <small class="error-message"><?php echo $returned['errors']['name']; ?></small>
                    <?php endif; ?>

                    <label for="email">Email: </label>
                    <input type="email" name="email" id="email" value="<?php echo ($sr && $returned['status']) ? '' : $returned['formvalue']['email']; ?>">

                    <?php if ($sr && $returned['errors']['email'] != ''): ?>
                        <small class="error-message"><?php echo $returned['errors']['email']; ?></small>
                    <?php endif; ?>

                    <label for="message">Message : </label>
                    <textarea name="message" id="message" rows="8"><?php echo ($sr && $returned['status']) ? '' : $returned['formvalue']['message']; ?></textarea>

                    <?php if ($sr && $returned['errors']['message'] != ''): ?>
                        <small class="error-message"><?php echo $returned['errors']['message']; ?></small>
                    <?php endif; ?>

                    <input type="submit" value="Send" class="button">
                </form>

                <?php unset($_SESSION['returned']); ?>

            </div>
        </div>

        <footer>
            <small class="credit">Created with Love.</small>
            <section class="socmed">
                <a href="#" class="facebook"><i class="icon-facebook"></i></a>
                <a href="#" class="twitter"><i class="icon-twitter"></i></a>
            </section>
        </footer>

        <script src="js/vendor/jquery-1.8.0.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
