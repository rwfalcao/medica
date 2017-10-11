<?php
require 'config/db.php';
require 'views/layout/banner.php';
require 'views/layout/footer.php';
require 'web/links.php';
require 'web/scripts.php';
require 'getData.php';

$sql_ings="SELECT Usuario.nome as username, Usuario.sobrenome, Medicamento.nome as medname, Medicamento.dosagem, DATE(Ingestao.dataHora) as dia, Ingestao.dataHora, DATE_FORMAT( TIME(Ingestao.dataHora),'%H:%i') as hora
FROM Usuario INNER JOIN RotinaTratamento ON Usuario.idUsuario = RotinaTratamento.Usuario_idUsuario
INNER JOIN Medicamento ON Medicamento.idMedicamento = RotinaTratamento.Medicamento_idMedicamento
INNER JOIN Ingestao ON Ingestao.RotinaTratamento_idRotinaTratamento = RotinaTratamento.idRotinaTratamento
WHERE DATE(Ingestao.dataHora) >= CURRENT_DATE AND TIME(Ingestao.dataHora) >= CURRENT_TIME
AND Ingestao.status = 'ativo'
ORDER BY dataHora
LIMIT 10";

$query_ings = $banco->query( $sql_ings );
$result_ings = $query_ings->fetchAll(PDO::FETCH_OBJ);

 // foreach($result_ings as $ing){
 //  echo '<pre>'.print_r($result_ings).'</pre>';
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
            foreach($result_ings as $ing){
                 echo '<li>
                  <div class="registro">
                    <span>
                      '.$ing->username.'
                    </span>
                  </div>

                  <div class="registro">
                    <span>
                      '.$ing->medname.'
                    </span>
                  </div>

                  <div class="registro">
                    <span>
                      '.$ing->hora.'
                    </span>
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
