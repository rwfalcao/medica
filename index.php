<?php
require 'config/db.php';
require 'views/layout/banner.php';
require 'views/layout/footer.php';
//require 'web/links.php';
require 'web/scripts.php';
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <?php// links(); ?>
    <link href="css\styles-test.css" rel="stylesheet" />
    <link href="css\bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    <title>medica.me</title>
    <?php



    ?>
  </head>
  <body>
    <?php renderBanner(); ?>
  	<div id="content">





    </div>
    <?php renderFooter(); ?>
    <?php scripts(); ?>


  </body>
</html>
