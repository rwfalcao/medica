<?php
require 'config/db.php';

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
