<?php
	$title = 'Articulos';
	$title_menu = 'Articulos';
	require_once('../conexion/conexion.php');
	if( $_GET ) {

		$codigo = isset($_GET['codigo']) ? $_GET['codigo'] : '';
		$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
		$medida = isset($_GET['medida']) ? $_GET['medida'] : '';
		$precio = isset($_GET['precio']) ? $_GET['precio'] : '';
		$descripcion = isset($_GET['descripcion']) ? $_GET['descripcion'] : '';

		$insert_articulo = 'INSERT INTO articulo (codigo_art, nombreArticulo, medida, precio, descripcion) VALUES (?, ?, ?, ?, ?)';
		$statement_insert = $pdo->prepare($insert_articulo);
		$statement_insert->execute(array($codigo, $nombre, $medida, $precio, $descripcion));

	}

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
	<h3>Insertar art&iacute;culos</h3>
	<form method="get">
		<input placeholder="Codigo del articulo" name="codigo" type="text">
		<input placeholder="Nombre del articulo" name="nombre" type="text">
		<input placeholder="Medida del articulo" name="medida" type="text">
		<input placeholder="Precio del articulo" name="precio" type="text">
		<input placeholder="Descripcion del articulo" name="descripcion" type="text">
		<input type="submit" value="Agregar" class="btn">
	</form>
<h3>Lista de art&iacute;culos</h3>
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