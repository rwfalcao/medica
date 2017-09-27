<?php
try{
  $banco = new PDO('mysql:host=localhost;dbname=medica','root','root');
  $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo $e->getMessage();
}
$insert = $banco->prepare('INSERT INTO Doenca(nome, cid) VALUES(:nome, :cid)');
$insert->bindParam(':nome', $nome);
$insert->bindParam(':cid', $cid);

$nome = $_POST['nome'];
$cid = $_POST['cid'];
$insert->execute();
 ?>
