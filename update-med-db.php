<?php
require 'config/db.php';

//$insert = $banco->prepare('INSERT INTO Usuario(nome, sobrenome, horaAcorda, horaDorme) VALUES(:nome, :sobrenome, :horaAcorda, :horaDorme)');
$insert = $banco->prepare('UPDATE Medicamento SET nome = :nome, dosagem = :dosagem WHERE Medicamento.idMedicamento = :medId');
$insert->bindParam(':nome', $nome);
$insert->bindParam(':dosagem', $dosagem);
$insert->bindParam(':medId', $medId);


$medId = $_GET['medId'];
$nome = $_POST['nome'];
$dosagem = $_POST['dosagem'];

$insert->execute();
echo 'ok!';
 ?>
