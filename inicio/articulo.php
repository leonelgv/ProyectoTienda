<?php
	$title = 'Articulos';
	$title_menu = 'Articulos';
	require_once('../conexion/conexion.php');
	// Asignamos una consulta SQL a la variable $sql
	$sql = 'SELECT * from articulo';

	$statement = $pdo->prepare($sql);
	$statement->execute();
	$resultados = $statement->fetchAll();
?>

<?php
	include('../extend/header.php');
?>
<div class="container">
<h1>Art&iacute;culos</h1>
<table class="striped">
	<thead>
		<tr>
			<td>C&oacute;digo art&iacute;culo</td>
			<td>Nombre</td>
			<td>Medida</td>
			<td>Precio</td>
			<td>Descripci&oacute;n</td>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach ($resultados as $key) {
		?>
		<tr>
			<td><?php echo $key['codigo_art'] ?></td>
			<td><?php echo $key['nombreArticulo'] ?></td>
			<td><?php echo $key['medida'] ?></td>
			<td><?php echo $key['precio'] ?></td>
			<td><?php echo $key['descripcion'] ?></td>
		</tr>
		<?php
			}
		?>
	</tbody>
</table>
</div>
<?php 
	include('../extend/footer.php');
?>