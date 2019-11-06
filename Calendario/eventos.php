<?php
header('Content-Type: application/json');
$pdo = new PDO("mysql:dbname=sistema;host=localhost","root","");

$sentenciaSQL = $pdo->prepare("SELECT * FROM eventos");
$sentenciaSQL->execute();

$resultado = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultado);

?>