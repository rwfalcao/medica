<?php
require 'config/db.php';
$insert = $banco->prepare('INSERT INTO Doenca(nome, cid) VALUES(:nome, :cid)');
$insert->bindParam(':nome', $nome);
$insert->bindParam(':cid', $cid);

$nome = $_POST['nome'];
$cid = $_POST['cid'];
$insert->execute();
 ?>
