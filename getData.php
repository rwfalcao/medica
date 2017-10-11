<?php
require 'config/db.php';

$insert = $banco->prepare('SELECT * FROM Ingestao');
$insert->execute();

$results = $insert->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);

//echo $json;

 ?>

 <script type="text/javascript">
  var jsonDados = <?php echo $json ?>;
 </script>
