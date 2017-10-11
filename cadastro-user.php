<?php
 require 'config/db.php';
 require 'views/layout/banner.php';
 require 'views/layout/footer.php';
 require 'web/links.php';
 require 'web/scripts.php';


 $insert = $banco->prepare('INSERT INTO Usuario(nome, sobrenome, horaAcorda, horaDorme) VALUES(:nome, :sobrenome, :horaAcorda, :horaDorme)');
 $insert->bindParam(':nome', $nome);
 $insert->bindParam(':sobrenome', $sobrenome);
 $insert->bindParam(':horaAcorda', $horaAcorda);
 $insert->bindParam(':horaDorme', $horaDorme);

 $nome = $_POST['nome'];
 $sobrenome = $_POST['sobrenome'];
 $horaAcordaH = $_POST['horaAcorda'];
 $horaAcordaM = $_POST['minutoAcorda'];
 $horaDormeH = $_POST['horaDorme'];
 $horaDormeM = $_POST['minutoDorme'];

 $horaAcorda = $horaAcordaH.':'.$horaAcordaM;
 $horaDorme = $horaDormeH.':'.$horaDormeM;

 $insert->execute();

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
          <h2>Usuário cadastrado com sucesso.</h2>
          <h2>Deseja atribuir um supervisor?(OPCIONAL)</h2>
        </div>
        <div class="conf-buttons">



          <a href="">Sim</a>
          <a href="list-users.php">Não</a>
        </div>
      </div>


     </div>
     <?php renderFooter(); ?>
     <?php scripts(); ?>


   </body>
 </html>
