<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="css\styles.css" rel="stylesheet" />
    <link href="css\bootstrap.min.css" rel="stylesheet" />

    <title>medica.me</title>
    <?php

    require 'db.php';
    //$dateArray = getdate();
    //$currentDate = $dateArray['year'].'-'.$dateArray['mon'].'-'.$dateArray['mday'];

    //date_default_timezone_set('Brazil/Brasilia');
    //$date = date('d/m/Y h:i:s a', time());
    //$date = getdate();
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


  </head>
  <body>
  	<div id="wrapper">
	    <header>
	    	<div id="page-banner">
	    		<h1 class="title">medica.me</h1>
          <p>Gerenciador de Ingestão de Medicamentos</p>

	    	</div>
	    </header>

      <div id="ingestao-result" class="main-list">
        <div class="title">
          <span id="user"><?php echo $usuario; ?></span>
          <span id="med"><?php echo $medicamento; ?></span>
        </div>

        <div class="horarios">
          <?php
                foreach($horarios as $horario){
                  echo '<span>'.$horario.'</span>';
                }
          ?>
        </div>


      </div>


    <footer>
      <div class="menu">
        <div class="menu-item selected"><i class="fa fa-user" aria-hidden="true"></i>
        </div>
        <div class="menu-item "><i class="fa fa-medkit" aria-hidden="true"></i>
        </div>
        <div class="menu-item "><i class="fa fa-clock-o" aria-hidden="true"></i>
        </div>
      </div>
    </footer>


    </div>
    <script src="js\cadastro-user.js"></script>
    <script src="js\bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/7913ddad50.js"></script>


  </body>
</html>
