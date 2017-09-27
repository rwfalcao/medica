<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="css\styles.css" rel="stylesheet" />
    <link href="css\bootstrap.min.css" rel="stylesheet" />

    <title>medica.me</title>
    <?php

    try{
      $banco = new PDO('mysql:host=localhost;dbname=medica','root','root');
      $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
      echo $e->getMessage();
    }

   // $sql_meds="SELECT * FROM Medicamento ORDER BY nome";

   // $query_meds = $banco->query( $sql_meds );
    //$result_meds = $query_meds->fetchAll(PDO::FETCH_OBJ);

    $medId = $_POST['medname'];
    $userId = $_GET['userId'];
    //$userId = str_replace(' ', '', $userId);
    //echo $userId.'<br>';
    //echo $medId;


    $sql_user='SELECT * FROM Usuario WHERE idUsuario = '.$userId.'';


    $sql_med='SELECT * FROM Medicamento WHERE idMedicamento ='.$medId.'' ;

    $query_user = $banco->query( $sql_user );
    $result_user = $query_user->fetchAll(PDO::FETCH_OBJ);

    $query_med = $banco->query( $sql_med );
    $result_med = $query_med->fetchAll(PDO::FETCH_OBJ);
/*
    foreach($result_user as $result){
      echo '<pre>'.print_r($result).'</pre></br>';
    }

    foreach($result_med as $result){
      echo '<pre>'.print_r($result).'</pre></br>';
    }

*/

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

      <div id="rotina-final" class="">
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
      </div>





      <!--
      <div id="add-form">
        <form id="adicionar">
          <input type="text" placeholder="Adicionar" />
          <button>+</button>
        </form>
      </div>
    -->



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
