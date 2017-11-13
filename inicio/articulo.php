<?php
	$title = 'Articulos';
	$title_menu = 'Articulos';
	require_once('../conexion/conexion.php');
	// Asignamos una consulta SQL a la variable $sql

  $show_form = FALSE;

  if($_POST){
    $sql_update_details = 'UPDATE articulo SET codigo_art = ?, nombreArticulo = ?, medida = ?, precio = ?, descripcion = ? WHERE codigo_art = ?';
    $codigo = isset($_GET['codigo']) ? $_GET['codigo'] : ''; 
    $codigo2 = isset($_POST['codigo2']) ? $_POST['codigo2'] : '';
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $medida = isset($_POST['medida']) ? $_POST['medida'] : '';
    $precio = isset($_POST['precio']) ? $_POST['precio'] : '';
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';

    $statement_insert = $pdo->prepare($sql_update_details);
    $statement_insert->execute(array($codigo2, $nombre, $medida, $precio, $descripcion,$codigo));
    header('Location: articulo.php');
  }

  if(isset( $_GET['codigo'] ) )
  {
    //TODO: GET DETAILS
    $show_form = TRUE;
    $sql_update = 'SELECT * from articulo WHERE codigo_art = ?';
    $codigo = isset( $_GET['codigo']) ? $_GET['codigo'] : 0;

    $statement_update = $pdo->prepare($sql_update);
    $statement_update->execute(array($codigo));
    $result_details = $statement_update->fetchAll();
    $rs_details = $result_details[0];

  }
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
<?php 
            if( $show_form )
            {
            ?>
          <h3>Modificar art&iacute;culos</h3>
          <form method="post">
            <input value="<?php echo $rs_details['codigo_art'] ?>" name="codigo2" type="text">
            <input value="<?php echo $rs_details['nombreArticulo'] ?>" name="nombre" type="text">
            <input value="<?php echo $rs_details['medida'] ?>" name="medida" type="text">
            <input value="<?php echo $rs_details['precio'] ?>" name="precio" type="text">
            <input value="<?php echo $rs_details['descripcion'] ?>" name="descripcion" type="text">
            <input type="submit" value="Modificar" class="btn">
          </form>
        <?php 
          }
        ?>
<div class="row">
	<?php
			foreach ($resultados as $key) {
		?>
        <div class="col s4 m4">
          <div class="card light-blue">
            <div class="card-content white-text">
              <span class="card-title"><?php echo $key['nombreArticulo'] ?></span>
              <p>Codigo: <?php echo $key['codigo_art'] ?><br>
              	Medida: <?php echo $key['medida'] ?><br>
              	Precio: <?php echo $key['precio'] ?><br>
              	Descripción: <?php echo $key['descripcion'] ?><br>
              </p>
            </div>
            <div class="card-action">
              <a href="articulo.php?codigo=<?php echo $key['codigo_art'] ?>">Editar</a>
              <a onclick="delete_articulo(<?php echo $key['codigo_art'] ?>)" href="#">Borrar</a>
            </div>
          </div>
        </div>
        <?php
			}
		?>
      </div>
</div>
<?php 
	include('../extend/footer.php');
?>