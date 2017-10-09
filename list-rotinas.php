<?php
require 'config/db.php';
require 'views/layout/banner.php';
require 'views/layout/footer.php';
require 'web/links.php';
require 'web/scripts.php';
require 'getData.php';

$sql_rotina="SELECT RotinaTratamento.frequencia as freq,RotinaTratamento.idRotinaTratamento, Usuario.nome as username, Medicamento.nome as medname, Medicamento.dosagem as dosagem FROM RotinaTratamento INNER JOIN Usuario on (Usuario.idUsuario = RotinaTratamento.Usuario_idUsuario) INNER JOIN Medicamento on (RotinaTratamento.Medicamento_idMedicamento = Medicamento.idMedicamento) ORDER BY Usuario.nome";

$query_rotina = $banco->query( $sql_rotina );
$result_rotina = $query_rotina->fetchAll(PDO::FETCH_OBJ);

// foreach($result_rotina as $rotina){
//  echo($rotina->username);
// }
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
        <h2 class="content-title">Rotinas</h2>
        <a href="form-rotina-user.php"><i class="fa fa-plus" aria-hidden="true"></i></a>
      </div>
      <div class="main-list">
        <ul class="flex-container-ul">
          <?php
            foreach($result_rotina as $rotina){
                 echo '<li>
                  <div class="registro">
                    <span>
                      '.$rotina->username.'
                    </span>
                  </div>

                  <div class="registro">
                    <span>
                      '.$rotina->medname.' '.$rotina->dosagem.'
                    </span>
                  </div>

                  <div class="registro">
                    <span>
                      '.$rotina->freq.'
                    </span>
                  </div>

                <div class="button-group">
                        <form class="select" action="delete-user-conf.php" method="post">
                          <button type="submit" name="deleteUser" class="" value="'.$rotina->idRotinaTratamento.'">
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
    <script type="text/javascript">
      var jsonData=<?php echo $json; ?>;
    </script>


  </body>
</html>
