<?php
require 'config/db.php';

$insert = $banco->prepare("SELECT ROUND(AVG(nota), 2) AS media, DATE_FORMAT( TIME(Ingestao.dataHora),'%H:%i') as hora
FROM Usuario INNER JOIN RotinaTratamento ON Usuario.idUsuario = RotinaTratamento.Usuario_idUsuario
INNER JOIN Medicamento ON Medicamento.idMedicamento = RotinaTratamento.Medicamento_idMedicamento
INNER JOIN Ingestao ON Ingestao.RotinaTratamento_idRotinaTratamento = RotinaTratamento.idRotinaTratamento
WHERE DATE(Ingestao.dataHora) <= CURRENT_DATE
AND Ingestao.nota IS NOT NULL
AND Usuario.idUsuario = 8
GROUP BY hora
ORDER BY dataHora");

$insert->execute();

$results = $insert->fetchAll(PDO::FETCH_ASSOC);
$ingestAvgs=json_encode($results);

//echo $json;


 ?>
