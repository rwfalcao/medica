<?php
require 'config/db.php';
require 'views/layout/banner.php';
require 'views/layout/footer.php';
require 'web/links.php';
require 'web/scripts.php';

$sql_meds="SELECT * FROM Medicamento ORDER BY nome";

$query_meds = $banco->query( $sql_meds );
$result_meds = $query_meds->fetchAll(PDO::FETCH_OBJ);
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <?php links(); ?>


    <title>medica.me</title>

  </head>
  <body>
    <?php renderBanner(); ?>
  	<div id="content">
      <div class="list-header">
        <h2 class="content-title">Medicamentos</h2>
        <a href="form-meds.php"><i class="fa fa-plus" aria-hidden="true"></i></a>
      </div>
      <div class="main-list">
        <ul class="flex-container-ul">
          <?php
            foreach($result_meds as $med){
                 echo '<li>
                 <div class="dosagem">
                    '.$med->dosagem.'
                 </div>
        <div class="registro">
        <span>
          '.$med->nome.'
        </span>
    </div>

                <div class="button-group">

                        <form class="select" action="update-med.php" method="post">

      <button type="submit" name="medname" class="" value="'.$med->idMedicamento.'">

        <i class="fa fa-pencil" aria-hidden="true"></i>

      </button>

    </form>



            <form class="select" action="update-user.php" method="post">

      <button type="submit" name="username" class="" value="9">

        <i class="fa fa-trash" aria-hidden="true"></i>

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
