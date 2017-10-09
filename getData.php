<?php
require 'config/db.php';

$insert = $banco->prepare('SELECT * FROM Usuario');
$insert->execute();

$results = $insert->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);

//echo $json;

 ?>
