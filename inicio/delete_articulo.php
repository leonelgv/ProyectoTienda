<?php
require_once('../conexion/conexion.php');
$codigo = isset($_GET['codigo']) ? $_GET['codigo'] : 0 ;
$sql = 'DELETE FROM articulo WHERE codigo_art = ?';

$statement = $pdo->prepare($sql);
$statement->execute(array($codigo));

$results = $statement->fetchAll();
header('Location: articulo.php');
