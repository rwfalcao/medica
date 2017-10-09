<?php
require 'config/db.php';
require 'views/layout/banner.php';
require 'views/layout/footer.php';
require 'web/links.php';
require 'web/scripts.php';
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
        <h2 class="content-title">Cadastro Doenças</h2>
        <form class="insert-form" action="cadastro-doenca.php" method="post">
          <span>Nome:</span>
          <input id="doenca-cid" type="text" name="nome" value="">
          <span>CID:</span>
          <input id="doenca-cid" type="text" name="cid" value="">
          <button type="submit" name="Submit" value="Submit">Enviar</button>
        </form>
      </div>

    </div>
    <?php renderFooter(); ?>
    <?php scripts(); ?>


  </body>
</html>
