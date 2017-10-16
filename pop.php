<?php
require 'config/db.php';

$idIngs = $banco->prepare("SELECT idIngestao FROM Ingestao");
// $insert = $banco->prepare("UPDATE Ingestao SET nota = :random WHERE idIngestao = :id");
// $insert->bindParam(':random', $random);
// $insert->bindParam(':idIngestao', $idIngestao);



$idIngs->execute();

$ings = array();

$results = $idIngs->fetchAll(PDO::FETCH_OBJ);
foreach ($results as $ingestao) {
   array_push($ings, $ingestao->idIngestao);
}

foreach ($ings as $ing) {
  $random = mt_rand(0, 5);
  $random2 = mt_rand(0, 10);
  if($random2 < 7){
    $insert = $banco->prepare("UPDATE Ingestao SET nota = $random, confirmacao = 's' WHERE idIngestao = $ing");
    $insert->execute();
  }else{
    $insert1 = $banco->prepare("UPDATE Ingestao SET confirmacao = 'n' WHERE idIngestao = $ing");
    $insert1->execute();
  }





  //$idIngestao = $ing;

  //echo $random.'<br>';
}








//echo $json;


 ?>
