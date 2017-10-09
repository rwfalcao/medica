<?php
require 'config/db.php';
require 'views/layout/banner.php';
require 'views/layout/footer.php';
require 'web/links.php';
require 'web/scripts.php';

$sql_ingestao = "SELECT Ingestao.idIngestao, Usuario.nome as username, Medicamento.nome as medname, Medicamento.dosagem as dosagem, DATE_FORMAT(Ingestao.dataHora,'%H:%i:%s') as hora,DATE_FORMAT(Ingestao.dataHora, '%Y-%m-%d') data
FROM Ingestao INNER JOIN RotinaTratamento on RotinaTratamento.idRotinaTratamento = Ingestao.RotinaTratamento_idRotinaTratamento INNER JOIN Medicamento on Medicamento.idMedicamento = RotinaTratamento.Medicamento_idMedicamento INNER JOIN Usuario on Usuario.idUsuario = RotinaTratamento.Usuario_idUsuario
WHERE confirmacao IS NULL";

$query_ingestao = $banco->query( $sql_ingestao );
$result_ingestao = $query_ingestao->fetchAll(PDO::FETCH_OBJ);

$random_index = mt_rand(0, count($result_ingestao));
print_r ($result_ingestao[$random_index]);
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

          <h2><?php echo $result_ingestao[$random_index]->username; ?></h2>
          <h2><?php echo $result_ingestao[$random_index]->medname.' '.$result_ingestao[$random_index]->dosagem; ?></h2>
          <h2><?php echo $result_ingestao[$random_index]->hora; ?></h2>

          <form class="ingest-confirmacao" action="ingestao-conf.php" method="post">
            <button type="submit" name="idIngest" class="" value="<?php echo $result_ingestao[$random_index]->idIngestao ?>">
              Confirmar Ingestão
            </button>
          </form>

        </div>

        <div class="horarios expo">
          <?php
                // foreach($horarios as $horario){
                //   echo '<h2>'.$horario.'</h2>';
                // }
          ?>
        </div>




    </div>
    <?php renderFooter(); ?>
    <?php scripts(); ?>


  </body>
</html>
