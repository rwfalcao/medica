<?php
require 'config/db.php';
require 'views/layout/banner.php';
require 'views/layout/footer.php';
require 'web/links.php';
require 'web/scripts.php';

$sql_meds="SELECT * FROM Medicamento ORDER BY nome";

$query_meds = $banco->query( $sql_meds );
$result_meds = $query_meds->fetchAll(PDO::FETCH_OBJ);

$userId = $_POST['username'];
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
      <div class="list-header">
        <h2 class="content-title">Escolha o medicamento :</h2>
      </div>

      <div class="main-list">
        <ul class="flex-container-ul">
          <?php
            foreach($result_meds as $medicamento){
              //echo '<li id="'.$usuario->idUsuario.'">'.$usuario->nome.' '.$usuario->sobrenome.'</li>';

              echo '<li>
              <div class="registro">
              <span>
                '.$medicamento->nome.' '.$medicamento->dosagem.'
              </span>
              </div>

              <div class="button-group">
              <form class="select" action="form-rotina-freq.php?userId='.$userId  .'" method="post">
                <button  type="submit" name="medname" class="" value="'.$medicamento->idMedicamento.'">
                  <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </button>
              </form>
              </div>




                    </li>';
            }

           ?>
        </ul>
      </div>

    </div>
    <?php renderFooter(); ?>
    <?php scripts(); ?>


  </body>
</html>
