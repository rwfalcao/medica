<?php
require 'config/db.php';
require 'views/layout/banner.php';
require 'views/layout/footer.php';
require 'web/links.php';
require 'web/scripts.php';

$userId = $_GET['userId'];

$deleteUser = $banco->prepare("UPDATE Usuario SET status = 'desativado' WHERE Usuario.idUsuario = ".$userId);

$deleteRotina = $banco->prepare("UPDATE RotinaTratamento INNER JOIN Usuario ON Usuario.idUsuario = RotinaTratamento.Usuario_idUsuario SET RotinaTratamento.status = 'desativado' WHERE Usuario.idUsuario = ".$userId);

$deleteIngestao = $banco->prepare("UPDATE Ingestao INNER JOIN RotinaTratamento ON RotinaTratamento.idRotinaTratamento = Ingestao.RotinaTratamento_idRotinaTratamento
INNER JOIN Usuario ON Usuario.idUsuario = RotinaTratamento.Usuario_idUsuario SET Ingestao.status = 'desativado' WHERE Usuario.idUsuario = ".$userId);

$deleteUser->execute();
$deleteRotina->execute();
$deleteIngestao->execute();

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

      <?php echo 'sucesso' ?>



    </div>
    <?php renderFooter(); ?>
    <?php scripts(); ?>


  </body>
</html>
