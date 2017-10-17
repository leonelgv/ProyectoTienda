<?php

$dsn = 'mysql:dbname=tienda;host=localhost';
$user = 'tienda';
$password = 'QOlIBlstknxmPSNh';

try{

	$pdo = new PDO(	$dsn, 
					$user, 
					$password
					);

}catch( PDOException $e ){
	echo 'Error al conectarnos: ' . $e->getMessage();
}
?>