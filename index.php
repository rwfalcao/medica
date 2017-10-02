<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="css\styles.css" rel="stylesheet" />
    <link href="css\bootstrap.min.css" rel="stylesheet" />

    <title>medica.me</title>
    <?php

    require 'config/db.php';
    require 'views/layout/banner.php';
    require 'views/layout/footer.php';

    ?>
  </head>
  <body>
  	<div id="wrapper">

	    <?php renderBanner(); ?>



      <?php renderFooter(); ?>


    </div>
    <script src="js\cadastro-user.js"></script>
    <script src="js\bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/7913ddad50.js"></script>


  </body>
</html>
