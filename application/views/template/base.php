<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $titulo; ?></title>
        
        <link rel="stylesheet" href="<?php echo site_url("css/normalize.css"); ?>">
        <link rel="stylesheet" href="<?php echo site_url("css/foundation.css"); ?>">
        <script type="text/javascript" src="<?php echo site_url("js/jquery-1.11.0.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo site_url("js/vendor/modernizr.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo site_url("js/vendor/fastclick.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo site_url("js/foundation.min.js"); ?>"></script>
        <!--script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script!-->
    </head>
    <body>
        <?php include("menu.php"); ?>        
        <h2><? echo $titulo; ?></h2>
        <div id="div_main">
            <?php echo $contenido; ?>
        </div>
        <script type="text/javascript"> 
            $(document).foundation(); 
        </script>
    </body>    
</html>