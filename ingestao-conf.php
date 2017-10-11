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

      <div class="main-list">
        <div class="expo">
          <h2>Como o medicmanto ingerido está controlando sua condição? Nota de 0 à 5:</h2>
        </div>
        <form id="nota" class="insert-form" action="<?php echo 'ingestao-final.php?idIngest='.$idIngestao ?>" method="post">
          <span>Nota:</span>
          <select name="nota">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>

          <button type="submit" name="Submit" value="Submit">Enviar</button>
        </form>

      </div>


    </div>
    <?php renderFooter(); ?>
    <?php scripts(); ?>


  </body>
</html>
