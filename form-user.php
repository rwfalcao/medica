<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="css\styles.css" rel="stylesheet" />
    <link href="css\bootstrap.min.css" rel="stylesheet" />

    <title>medica.me</title>
    <?php

    require 'db.php';

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
	    <div id="list-usuarios" class="main-list">
	    	<h2 class="title">Cadastro</h2>
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
