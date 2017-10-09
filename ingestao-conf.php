<?php
require 'config/db.php';
require 'views/layout/banner.php';
require 'views/layout/footer.php';
require 'web/links.php';
require 'web/scripts.php';

$idIngestao = $_POST['idIngest'];
$sql_insert_ing = "UPDATE Ingestao SET confirmacao = 's' WHERE Ingestao.idIngestao = ".$idIngestao;
$insert = $banco->prepare( $sql_insert_ing );

$insert->execute();
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <?php links(); ?>


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
