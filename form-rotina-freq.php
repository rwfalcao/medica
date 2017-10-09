<?php
require 'config/db.php';
require 'views/layout/banner.php';
require 'views/layout/footer.php';
require 'web/links.php';
require 'web/scripts.php';

$medId = $_POST['medname'];
$userId = $_GET['userId'];

$sql_user='SELECT * FROM Usuario WHERE idUsuario = '.$userId.'';
$sql_med='SELECT * FROM Medicamento WHERE idMedicamento ='.$medId.'' ;

$query_user = $banco->query( $sql_user );
$result_user = $query_user->fetchAll(PDO::FETCH_OBJ);

$query_med = $banco->query( $sql_med );
$result_med = $query_med->fetchAll(PDO::FETCH_OBJ);
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

      <div class="expo">
        <h2 class="userName">
          <?php
            echo $result_user[0]->nome.' '.$result_user[0]->sobrenome;
           ?>
        </h2>
        <h2 class="meds">
          <?php
            echo $result_med[0]->nome.' '.$result_med[0]->dosagem;
           ?>
        </h2>

        <div id="" class="">



          <form id="freq" class="insert-form" action="<?php echo 'form-rotina-final.php?userId='.$userId.'&medId='.$medId.'' ?>" method="post">
            <span>Frequência:</span>
            <select name="frequencia">
              <option value="1">1 vez ao dia</option>
              <option value="2">2 vezes ao dia</option>
              <option value="3">3 vezes ao dia</option>
              <option value="4">4 vezes ao dia</option>
            </select>

            <button type="submit" name="Submit" value="Submit">Enviar</button>
          </form>
        </div>


      </div>



    </div>
    <?php renderFooter(); ?>
    <?php scripts(); ?>


  </body>
</html>
