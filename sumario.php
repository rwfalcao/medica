<?php
require 'config/db.php';
require 'views/layout/banner.php';
require 'views/layout/footer.php';
require 'web/links.php';
require 'web/scripts.php';
require 'getJson.php';

$stats = $banco->prepare('SELECT ROUND(AVG(nota), 2) AS media, DATE_FORMAT( TIME(Ingestao.dataHora),"%H:%i") as hora
FROM Usuario INNER JOIN RotinaTratamento ON Usuario.idUsuario = RotinaTratamento.Usuario_idUsuario
INNER JOIN Medicamento ON Medicamento.idMedicamento = RotinaTratamento.Medicamento_idMedicamento
INNER JOIN Ingestao ON Ingestao.RotinaTratamento_idRotinaTratamento = RotinaTratamento.idRotinaTratamento
AND Ingestao.nota IS NOT NULL
AND Usuario.idUsuario = :idUser
AND RotinaTratamento.idRotinaTratamento = :idRotina
GROUP BY hora
ORDER BY dataHora');

$conf_s = $banco->prepare("SELECT COUNT(*) as qtd
		FROM Usuario
		INNER JOIN RotinaTratamento ON RotinaTratamento.Usuario_idUsuario = Usuario.idUsuario
		INNER JOIN Ingestao ON Ingestao.RotinaTratamento_idRotinaTratamento = RotinaTratamento.idRotinaTratamento
		WHERE Usuario.idUsuario = :idUser
    AND confirmacao = 's'
		AND RotinaTratamento.idRotinaTratamento = :idRotina");

    $conf_total = $banco->prepare("SELECT COUNT(*) as qtd
    		FROM Usuario
    		INNER JOIN RotinaTratamento ON RotinaTratamento.Usuario_idUsuario = Usuario.idUsuario
    		INNER JOIN Ingestao ON Ingestao.RotinaTratamento_idRotinaTratamento = RotinaTratamento.idRotinaTratamento
    		WHERE Usuario.idUsuario = :idUser
    		AND RotinaTratamento.idRotinaTratamento = :idRotina");

$stats->bindParam(':idUser', $idUser);
$conf_s->bindParam(':idUser', $idUser);
$conf_total->bindParam(':idUser', $idUser);

$stats->bindParam(':idRotina', $idRotina);
$conf_s->bindParam(':idRotina', $idRotina);
$conf_total->bindParam(':idRotina', $idRotina);

$idUser = $_POST['sumario'];
$idRotina = $_GET['idRotina'];
$username = $_GET['username'];
$medname = $_GET['medname'];

$stats->execute();
$conf_s->execute();
$conf_total->execute();

$results_confs = $conf_s->fetchAll(PDO::FETCH_OBJ);
$results_conft = $conf_total->fetchAll(PDO::FETCH_OBJ);
$results = $stats->fetchAll(PDO::FETCH_ASSOC);
$ingestAvgs=json_encode($results);

$aderencia = round((float)($results_confs[0]->qtd / $results_conft[0]->qtd) * 100 ) . '%';


 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    var ingestAvgs = <?php echo $ingestAvgs ?>;
    function getMediaChartRows(){
      var rows = [];
      var colors = [];
      for(i = 0 ; i < ingestAvgs.length ; i++){
        rows[i] = [ingestAvgs[i].hora , parseFloat(ingestAvgs[i].media)];
        if(parseFloat(ingestAvgs[i].media) <= 5 && parseFloat(ingestAvgs[i].media) > 3.75){
          rows[i].push('#119759');
        }else if(parseFloat(ingestAvgs[i].media) <= 3.75 && parseFloat(ingestAvgs[i].media) > 2.5){
          rows[i].push('#399711');
        }else if(parseFloat(ingestAvgs[i].media) <= 2.5 && parseFloat(ingestAvgs[i].media) > 1.25){
          rows[i].push('#978211');
        }else if(parseFloat(ingestAvgs[i].media) <= 1.25 && parseFloat(ingestAvgs[i].media) > 0){
          rows[i].push('#971111');
        }
      }
      return rows;
    }

      var chartRows = getMediaChartRows();

      chartRows.unshift(['Hora', 'Nota Média', { role: 'style' }]);

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChartMedia);

      function drawChartMedia() {
        var data = google.visualization.arrayToDataTable(chartRows);

        // Set chart options
        var options = {
          'title':'Nota média ingestões',
          'width':800,
          'height':600,
          'fontSize': '35',
          'fontName': 'Raleway',
          vAxis: {
            title: 'Nota média',
            viewWindow: {
              max: [5]
            },
            ticks: [0,1.25,2.5,3.75,5]
          },
          hAxis: {
            title: 'Horários das ingestões'
          }
        };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    // ingestAvgs.forEach(function getCharRows(element){
    //
    // });







    </script>

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
          <h2><?php echo $username ?></h2>
          <h2><?php echo $medname ?></h2>
          <div class="aderencia">
            <h2>Aderência:</h2>
            <span class="percent"><?php echo $aderencia ?></span>
          </div>
        </div>
        <div id="chart_div"></div>

      </div>

    </div>
    <?php renderFooter(); ?>
    <?php scripts(); ?>



  </body>

</html>
