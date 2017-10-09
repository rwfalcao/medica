<?php
require 'config/db.php';
require 'views/layout/banner.php';
require 'views/layout/footer.php';
require 'web/links.php';
require 'web/scripts.php';
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
        <h2 class="content-title">Cadastro</h2>
        <form id="" class="insert-form" action="cadastro-user.php" method="post">
          <span>Nome:</span>
          <input id="usuario-nome" type="text" name="nome" value="">
          <span>Sobrenome:</span>
          <input id="usuario-sobrenome" type="text" name="sobrenome" value="">
          <span>Acorda:</span>
          <div id="horaAcorda" class="selectHora">
            <select name="horaAcorda">
              <?php
              for($i = 0 ; $i < 24 ; $i++){
                if($i >= 10){
                  $iTratado = (string)$i;
                }
                else{
                  $iTratado = '0'.((string)$i);
                }
                echo '<option value="'.$i.'">'.$iTratado.'<option>';
              }
              ?>
            </select>
            <span class="aspas">:</span>
            <select name="minutoAcorda">
              <?php for($i = 0 ; $i <60 ; $i++){
                if($i >= 10){
                  $iTratado = (string)$i;
                }
                else{
                  $iTratado = '0'.((string)$i);
                }
                echo '<option value="'.$iTratado.'">'.$iTratado.'<option>';
              } ?>

            </select>
          </div>
          <span>Dorme:</span>
          <div id="horaDorme" class="selectHora">
            <select name="horaDorme">
              <?php for($i = 0 ; $i <24 ; $i++){
                if($i >= 10){
                  $iTratado = (string)$i;
                }
                else{
                  $iTratado = '0'.((string)$i);
                }
                echo '<option value="'.$i.'">'.$iTratado.'<option>';
              } ?>
            </select>
            <span class="aspas">:</span>
            <select name="minutoDorme">
              <?php for($i = 0 ; $i <60 ; $i++){
                if($i >= 10){
                  $iTratado = (string)$i;
                }
                else{
                  $iTratado = '0'.((string)$i);
                }
                echo '<option value="'.$i.'">'.$iTratado.'<option>';
              } ?>

            </select>
          </div>
          <button type="submit" name="Submit" value="Submit">Enviar</button>
        </form>
      </div>





    </div>
    <?php renderFooter(); ?>
    <?php scripts(); ?>


  </body>
</html>
