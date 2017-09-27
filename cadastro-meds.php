<?php
try{
  $banco = new PDO('mysql:host=localhost;dbname=medica','root','root');
  $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo $e->getMessage();
}
$insert = $banco->prepare('INSERT INTO Medicamento(nome, dosagem) VALUES(:nome, :dosagem)');
$insert->bindParam(':nome', $nome);
$insert->bindParam(':dosagem', $dosagem);

$nome = $_POST['nome'];
$dosagem = $_POST['dosagem'];
$insert->execute();
 ?>
