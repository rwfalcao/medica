<?php
require 'config/db.php';
require 'views/layout/banner.php';
require 'views/layout/footer.php';
require 'web/links.php';
require 'web/scripts.php';


$doencaId = $_POST['doencaName'];

$sql_doenca="SELECT * FROM Doenca WHERE idDoenca = ".$doencaId." ORDER BY nome";

$query_doenca = $banco->query( $sql_doenca );
$result_doenca = $query_doenca->fetchAll(PDO::FETCH_OBJ);

foreach($result_doenca as $doenca){
  echo '<pre>'.print_r($doenca).'</pre>';
}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <?php links(); ?>

    <title>doencaica.me</title>
    <?php



    ?>
  </head>
  <body>
    <?php renderBanner(); ?>
  	<div id="content">

      <div class="main-list">
        <h2 class="content-title">Cadastro Doenças</h2>
        <form class="insert-form" action="update-doenca-db.php?doencaId=<?php echo $doencaId ?>" method="post">
          <span>Nome:</span>
          <input id="doenca-cid" type="text" name="nome" value="<?php echo $result_doenca[0]->nome ?>">
          <span>CID:</span>
          <input id="doenca-cid" type="text" name="cid" value="<?php echo $result_doenca[0]->cid ?>">
          <button type="submit" name="Submit" value="Submit">Enviar</button>
        </form>
      </div>

    </div>
    <?php renderFooter(); ?>
    <?php scripts(); ?>


  </body>
</html>
