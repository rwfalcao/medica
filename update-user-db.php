<?php
require 'config/db.php';

//$insert = $banco->prepare('INSERT INTO Usuario(nome, sobrenome, horaAcorda, horaDorme) VALUES(:nome, :sobrenome, :horaAcorda, :horaDorme)');
$insert = $banco->prepare('UPDATE Usuario SET nome = :nome, sobrenome = :sobrenome, horaAcorda = :horaAcorda, horaDorme = :horaDorme WHERE Usuario.idUsuario = :idUser');
$insert->bindParam(':nome', $nome);
$insert->bindParam(':sobrenome', $sobrenome);
$insert->bindParam(':horaAcorda', $horaAcorda);
$insert->bindParam(':horaDorme', $horaDorme);
$insert->bindParam(':idUser', $idUser);

$idUser = $_GET['userId'];
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$horaAcordaH = $_POST['horaAcorda'];
$horaAcordaM = $_POST['minutoAcorda'];
$horaDormeH = $_POST['horaDorme'];
$horaDormeM = $_POST['minutoDorme'];

$horaAcorda = $horaAcordaH.':'.$horaAcordaM;
$horaDorme = $horaDormeH.':'.$horaDormeM;
echo $horaAcorda;
$insert->execute();
 ?>
