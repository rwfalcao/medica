<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="css\styles.css" rel="stylesheet" />
    <link href="css\bootstrap.min.css" rel="stylesheet" />

    <title>medica.me</title>
    <?php
    
    require 'config/db.php';
    require 'views/layout/banner.php';
    require 'views/layout/footer.php';

    $sql_usuario="SELECT * FROM Usuario ORDER BY nome";

    $query_usuario = $banco->query( $sql_usuario );
    $result_usuario = $query_usuario->fetchAll(PDO::FETCH_OBJ);

    ?>
  </head>
  <body>
  	<div id="wrapper">

      <?php renderBanner(); ?>


      <div class="main-list">
        <ul class="usuarios-list">
          <?php
            foreach($result_usuario as $usuario){
              //echo '<li id="'.$usuario->idUsuario.'">'.$usuario->nome.' '.$usuario->sobrenome.'</li>';

              echo '<li>

                      <form class="select" action="update-user.php" method="post">
                        <button  type="submit" name="username" class="" value="'.$usuario->idUsuario.'">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>

                        </button>
                      </form>
                      <span>
                        '.$usuario->nome.' '.$usuario->sobrenome.'
                      </span>
                    </li>';
            }

           ?>
        </ul>
      </div>

    <?php renderFooter(); ?>


    </div>
    <script src="js\cadastro-user.js"></script>
    <script src="js\bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/7913ddad50.js"></script>


  </body>
</html>
