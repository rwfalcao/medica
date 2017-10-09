<?php
require 'config/db.php';
require 'views/layout/banner.php';
require 'views/layout/footer.php';
require 'web/links.php';
require 'web/scripts.php';

$freq = $_POST['frequencia'];
$userId = $_GET['userId'];
$medId = $_GET['medId'];
$freq_tempo = $freq - 1;

/*Inserção do banco da rotina de acordo com o usuário e o medicamento informado*/

$insert = $banco->prepare('INSERT INTO RotinaTratamento(Usuario_idUsuario, Medicamento_idMedicamento,frequencia) VALUES(:userId, :medId, :freq)');
$insert->bindParam(':userId', $userId);
$insert->bindParam(':medId', $medId);
$insert->bindParam(':freq', $freq);

$freq = $_POST['frequencia'];
$userId = $_GET['userId'];
$medId = $_GET['medId'];

$insert->execute();

/*Chamada no banco para conseguir a hora que o usuário acorda e o total de horas que o usuário costuma ficar acordado*/

$sql_tempo='SELECT TIME_TO_SEC(horaAcorda) as horaAcorda,TIME_TO_SEC(TIMEDIFF(horaDorme,horaAcorda)) as totalSegundos FROM Usuario WHERE idUsuario = '.$userId.'';

$query_tempo = $banco->query( $sql_tempo );
$result_tempo = $query_tempo->fetchAll(PDO::FETCH_OBJ);
$tempoAcordado = $result_tempo[0]->totalSegundos;
$tempoAcordadoTratado = $tempoAcordado-2400; //tempo acordado em segundos, menos 40 minutos. 20minutos depois e acordar e 20minutos abtes de dormir
$horaAcorda = $result_tempo[0]->horaAcorda;
$horaAcordaTratada = $horaAcorda+1200;

/*Chamada no banco para conseguir id da rotina*/

$sql_rotina = 'SELECT idRotinaTratamento FROM RotinaTratamento WHERE Usuario_idUsuario='.$userId.' AND 	Medicamento_idMedicamento='.$medId.'';

$query_rotina = $banco->query($sql_rotina);
$result_rotina = $query_rotina->fetchAll(PDO::FETCH_OBJ);
$idRotina = $result_rotina[0]->idRotinaTratamento;

/*Chamada no banco para conseguir dados do usuário e do medicamento*/


$sql_dados = 'SELECT Usuario.nome as userFirst, Usuario.sobrenome as userLast, Medicamento.nome as medName, Medicamento.dosagem as dosagem FROM Usuario,Medicamento WHERE Usuario.idUsuario='.$userId.' AND Medicamento.idMedicamento ='.$medId.'';

$query_dados = $banco->query($sql_dados);
$result_dados = $query_dados->fetchAll(PDO::FETCH_OBJ);
$usuario = $result_dados[0]->userFirst.' '.$result_dados[0]->userLast;
$medicamento = $result_dados[0]->medName.' '.$result_dados[0]->dosagem;


/*Chamada no banco*/

$intervalo = $tempoAcordadoTratado / $freq_tempo;


//$insert->execute();
$diasIngestao = 3;

$horarios = array();

for($i = 0 ; $i < $diasIngestao ; $i++){
  $dataHora = '';
  $horaDose = $horaAcordaTratada;
  for($j = 0 ; $j < $freq ; $j++){
    $horaDoseTratada = gmdate("H:i:s", $horaDose);
    if(!in_array($horaDoseTratada,$horarios)){
      array_push($horarios, $horaDoseTratada);
    }

    $sql_ingestao = 'INSERT INTO Ingestao(dataHora, RotinaTratamento_idRotinaTratamento) VALUES(TIMESTAMP(CURRENT_DATE + INTERVAL '.$i.' DAY, "'.$horaDoseTratada.'"), :idRotina)';
    $insert_ingestao = $banco->prepare( $sql_ingestao  );
    $insert_ingestao->bindParam(':idRotina', $idRotina);


    $dataHora = "TIMESTAMP(CURRENT_DATE + INTERVAL ".$i." DAY, '".$horaDoseTratada."')";
    $insert_ingestao->execute();
    $horaDose+=$intervalo;
  }
}

/*DEBUG*/
/*
echo 'intervalo(segundos): '.$intervalo.'<br>';
echo 'intervalo: '.gmdate("H:i:s", $intervalo).'<br>';
echo 'segundos: '.$tempoAcordadoTratado.'<br>';

echo 'transformado: '.gmdate("H:i:s", $tempoAcordado).'<br>';

$ing1 = $horaAcorda+1200;
$ing2 = $ing1+$intervalo;
$ing3 = $ing2+$intervalo;
echo 'ing1: '.gmdate("H:i:s", $ing1).'<br>';
echo 'ing2: '.gmdate("H:i:s", $ing2).'<br>';
echo 'ing3: '.gmdate("H:i:s", $horaAcordaTratada).'<br>';
*/
/*FIM DEBUG*/

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

          <h2><?php echo $usuario; ?></h2>
          <h2><?php echo $medicamento; ?></h2>
        </div>

        <div class="horarios expo">
          <?php
                foreach($horarios as $horario){
                  echo '<h2>'.$horario.'</h2>';
                }
          ?>
        </div>


      </div>

    </div>
    <?php renderFooter(); ?>
    <?php scripts(); ?>


  </body>
</html>
