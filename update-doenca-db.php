<?php
require 'config/db.php';

//$insert = $banco->prepare('INSERT INTO Usuario(nome, sobrenome, horaAcorda, horaDorme) VALUES(:nome, :sobrenome, :horaAcorda, :horaDorme)');
$insert = $banco->prepare('UPDATE Doenca SET nome = :nome, cid = :cid WHERE Doenca.idDoenca = :doencaId');
$insert->bindParam(':nome', $nome);
$insert->bindParam(':cid', $cid);
$insert->bindParam(':doencaId', $doencaId);

echo $doencaId;


$doencaId = $_GET['doencaId'];
$nome = $_POST['nome'];
$cid = $_POST['cid'];

$insert->execute();
echo 'ok!';
 ?>
