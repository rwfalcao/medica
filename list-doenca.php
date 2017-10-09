<?php
require 'config/db.php';
require 'views/layout/banner.php';
require 'views/layout/footer.php';
require 'web/links.php';
require 'web/scripts.php';

$sql_doencas="SELECT * FROM Doenca ORDER BY nome";

$query_doencas = $banco->query( $sql_doencas );
$result_doencas = $query_doencas->fetchAll(PDO::FETCH_OBJ);


 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <?php links(); ?>


    <title>doencaica.me</title>

  </head>
  <body>
    <?php renderBanner(); ?>
  	<div id="content">
      <div class="list-header">
        <h2 class="content-title">Doenças</h2>
        <a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a>
      </div>
      <div class="main-list">
        <ul class="flex-container-ul">
          <?php
            foreach($result_doencas as $doenca){
                 echo '<li>
                 <div class="registro">
                    '.$doenca->cid.'
                 </div>
        <div class="registro">
        <span>
          '.$doenca->nome.'
        </span>
    </div>

                <div class="button-group">

                        <form class="select" action="update-doenca.php" method="post">

      <button type="submit" name="doencaName" class="" value="'.$doenca->idDoenca.'">

        <i class="fa fa-pencil" aria-hidden="true"></i>

      </button>

    </form>



            <form class="select" action="update-user.php" method="post">

      <button type="submit" name="username" class="" value="9">

        <i class="fa fa-trash" aria-hidden="true"></i>

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
