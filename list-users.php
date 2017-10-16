<?php
require 'config/db.php';
require 'views/layout/banner.php';
require 'views/layout/footer.php';
require 'web/links.php';
require 'web/scripts.php';


$sql_usuario="SELECT RotinaTratamento.idRotinaTratamento as idRotina, idUsuario,Usuario.nome as username,sobrenome as sobrenome, Medicamento.nome as medname, COUNT(RotinaTratamento.idRotinaTratamento) AS qtdRotinas
FROM `Usuario`
LEFT JOIN RotinaTratamento ON Usuario.idUsuario = RotinaTratamento.Usuario_idUsuario
LEFT JOIN Medicamento ON RotinaTratamento.Medicamento_idMedicamento = Medicamento.idMedicamento
WHERE Usuario.status = 'ativo'
GROUP BY Usuario.nome
ORDER BY Usuario.nome";

$query_usuario = $banco->query( $sql_usuario );
$result_usuario = $query_usuario->fetchAll(PDO::FETCH_OBJ);

function sumarioRedirect($qtd, $medname, $username, $idRotina){
  $redirect = '';
  switch($qtd){
    case 0:
      $redirect = 'sumario-vazio.php';
      break;

    case 1:
      $redirect = 'sumario.php?medname='.$medname.'&username='.$username.'&idRotina='.$idRotina;
      break;

    default:
      $redirect = 'sumario-list.php';

  }
  return $redirect;
}
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
        <h2 class="content-title">Usuários</h2>
        <a href="form-user.php"><i class="fa fa-plus" aria-hidden="true"></i></a>
      </div>
      <div class="main-list">
        <ul class="flex-container-ul">
          <?php
            foreach($result_usuario as $usuario){
                 echo '<li>
        <div class="registro">
        <span>
          '.$usuario->username.' '.$usuario->sobrenome.'
        </span>
    </div>
                <div class="button-group">





            <form class="select" action="'.sumarioRedirect($usuario->qtdRotinas, $usuario->medname, $usuario->username, $usuario->idRotina).'" method="post">

      <button type="submit" name="sumario" class="" value="'.$usuario->idUsuario.'">

        <i class="fa fa-bar-chart" aria-hidden="true"></i>

      </button>

    </form>

    <form class="select" action="update-user.php" method="post">

<button type="submit" name="username" class="" value="'.$usuario->idUsuario.'">

<i class="fa fa-pencil" aria-hidden="true"></i>

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
