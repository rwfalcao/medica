<?php
try{
  $banco = new PDO('mysql:host=localhost;dbname=medica','root','root');
  $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo $e->getMessage();
}
 ?>
