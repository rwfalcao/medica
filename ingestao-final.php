<?php
require 'config/db.php';
require 'views/layout/banner.php';
require 'views/layout/footer.php';
require 'web/links.php';
require 'web/scripts.php';

$idIngestao = $_GET['idIngest'];
$nota = $_POST['nota'];
$sql_ing_nota = "UPDATE Ingestao SET nota = ".$nota." WHERE Ingestao.idIngestao = ".$idIngestao;
$insert = $banco->prepare( $sql_ing_nota );

$insert->execute();

echo 'Nota: '.$nota;
echo 'id: '.$idIngestao;

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

      <div class="main-list">
        <div class="expo">
          <h2>Sucesso</h2>
        </div>

      </div>


    </div>
    <?php renderFooter(); ?>
    <?php scripts(); ?>


  </body>
</html>
