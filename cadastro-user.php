<?php
try{
  $banco = new PDO('mysql:host=localhost;dbname=medica','root','root');
  $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo $e->getMessage();
}
$insert = $banco->prepare('INSERT INTO Usuario(nome, sobrenome) VALUES(:nome, :sobrenome)');
$insert->bindParam(':nome', $nome);
$insert->bindParam(':sobrenome', $sobrenome);

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$insert->execute();
 ?>
