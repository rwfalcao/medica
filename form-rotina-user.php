<?php
require 'config/db.php';
require 'views/layout/banner.php';
require 'views/layout/footer.php';
require 'web/links.php';
require 'web/scripts.php';

$sql_usuario="SELECT * FROM Usuario ORDER BY nome";

$query_usuario = $banco->query( $sql_usuario );
$result_usuario = $query_usuario->fetchAll(PDO::FETCH_OBJ);
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
        <h2 class="content-title">Escolha o usuário :</h2>
      </div>

      <div class="main-list">
        <ul class="flex-container-ul">
          <?php
            foreach($result_usuario as $usuario){
              //echo '<li id="'.$usuario->idUsuario.'">'.$usuario->nome.' '.$usuario->sobrenome.'</li>';

              echo '<li>


                      <div class="registro">
                      <span>
                        '.$usuario->nome.' '.$usuario->sobrenome.'
                      </span>
                      </div>
                      <div class="button-group">
                      <form class="select" action="form-rotina-meds.php" method="post">

                        <button  type="submit" name="username" class="" value="'.$usuario->idUsuario.'">
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
