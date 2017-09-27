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

    $sql_meds="SELECT * FROM Medicamento ORDER BY nome";

    $query_meds = $banco->query( $sql_meds );
    $result_meds = $query_meds->fetchAll(PDO::FETCH_OBJ);

    $userId = $_POST['username'];
    $userId = str_replace(' ', '', $userId);
    //echo $userId;


   /* $sql_usuario="SELECT * FROM Usuario ORDER BY nome";

    $query_usuario = $banco->query( $sql_usuario );
    $result_usuario = $query_usuario->fetchAll(PDO::FETCH_OBJ);
    */
    //echo $result_usuario[0]["nome"];

    //$nomes_users = [];
    //echo $result_usuario[2]->nome;

/*
    foreach($result_usuario as $usuario){
      array_push($nomes_users, $usuario["nome"]);

    }
    sort($nomes_users);
    // for($i = 0; $i<sizeof($nomes_users); $i++){
    //   echo $nomes_users[$i];
    //   echo '</br>';
    // }
    foreach($nomes_users as $usuario){

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



      <!--
      <div id="add-form">
        <form id="adicionar">
          <input type="text" placeholder="Adicionar" />
          <button>+</button>
        </form>
      </div>
    -->

    <div class="main-list">
      <ul class="usuarios-list">
        <?php
          foreach($result_meds as $medicamento){
            //echo '<li id="'.$usuario->idUsuario.'">'.$usuario->nome.' '.$usuario->sobrenome.'</li>';

            echo '<li>
                    <span>
                      '.$medicamento->nome.' '.$medicamento->dosagem.'
                    </span>
                    <form action="form-rotina-final.php?userId='.$userId  .'" method="post">
                      <button type="submit" name="medname" class="" value="'.$medicamento->idMedicamento.'">

                      </button>
                    </form>
                  </li>';
          }
         ?>
      </ul>
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
