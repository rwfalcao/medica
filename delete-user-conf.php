<?php
require 'config/db.php';
require 'views/layout/banner.php';
require 'views/layout/footer.php';
require 'web/links.php';
require 'web/scripts.php';

$userId = $_POST['deleteUser'];

$sql_usuario="SELECT * FROM Usuario WHERE idUsuario = ".$userId." ORDER BY nome";

$query_usuario = $banco->query( $sql_usuario );
$result_usuario = $query_usuario->fetchAll(PDO::FETCH_OBJ);
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

      <div class="main-list delete">
        <span class="delete-text">Deseja apagar o seguinte usuário? Seus cronogramas também serão apagados. </span>
        <div class="expo">
          <h2><?php echo $result_usuario[0]->nome.' '.$result_usuario[0]->sobrenome ?></h2>
        </div>
        <div class="conf-buttons">
          <a href="delete-user.php?userId='<?php echo $userId ?>'">Sim</a>
          <a href="list-users.php">Não</a>
        </div>

      </div>



    </div>
    <?php renderFooter(); ?>
    <?php scripts(); ?>


  </body>
</html>
