<?php
require 'config/db.php';
require 'views/layout/banner.php';
require 'views/layout/footer.php';
require 'web/links.php';
require 'web/scripts.php';

$medId = $_POST['medname'];

$sql_med="SELECT * FROM Medicamento WHERE idMedicamento = ".$medId." ORDER BY nome";

$query_med = $banco->query( $sql_med );
$result_med = $query_med->fetchAll(PDO::FETCH_OBJ);

// foreach($result_med as $result){
//   echo '<prev>'.print_r($result).'</pre>';
// }
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
        <h2 class="content-title">Cadastro</h2>
        <form class="insert-form" action="update-med-db.php?medId=<?php echo $medId ?>" method="post">
          <span>Nome:</span>
          <input id="meds-nome" type="text" name="nome" value="<?php echo $result_med[0]->nome ?>">
          <span>Dosagem:</span>
          <input id="meds-dosagem" type="text" name="dosagem" value="<?php echo $result_med[0]->dosagem ?>">
          <button type="submit" name="Submit" value="Submit">Enviar</button>
        </form>

      </div>





    </div>
    <?php renderFooter(); ?>
    <?php scripts(); ?>


  </body>
</html>
