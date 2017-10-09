<?php
require 'config/db.php';

$insert = $banco->prepare('INSERT INTO Medicamento(nome, dosagem) VALUES(:nome, :dosagem)');
$insert->bindParam(':nome', $nome);
$insert->bindParam(':dosagem', $dosagem);

$nome = $_POST['nome'];
$dosagem = $_POST['dosagem'];
$insert->execute();
 ?>
