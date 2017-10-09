<?php
require 'config/db.php';
require 'views/layout/banner.php';
require 'views/layout/footer.php';
require 'web/links.php';
require 'web/scripts.php';


$deleteUser = $banco->prepare('DELETE FROM Usuario WHERE idUsuario = :userId');
$deleteUser->bindParam(':userId', $userId);

$deleteRotina = $banco->prepare('DELETE FROM RotinaTratamento WHERE Usuario_idUsuario = :userId');
$deleteRotina->bindParam(':userId', $userId);

$deleteIngestao = $banco->prepare('DELETE FROM Ingestao WHERE Usuario_idUsuario = :userId');
$deleteIngestao->bindParam(':userId', $userId);

$userId = $_GET['userId'];

$deleteUser->execute();

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

      <?php echo $userId ?>



    </div>
    <?php renderFooter(); ?>
    <?php scripts(); ?>


  </body>
</html>
