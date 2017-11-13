<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<title><?php echo $title; ?></title>
        <link href="../css/materialize.min.css" rel="stylesheet">
        <script>
            function delete_articulo(codigo_to_delete)
            {
                var confirmation = confirm('¿Está seguro de que desea eliminar el producto con el código '+ codigo_to_delete);
    
                if(confirmation)
                {
                    window.location = "delete_articulo.php?codigo="+codigo_to_delete;
                }
            }
        </script>
		</head>

	<body>
		<!--Import jQuery before materialize.js-->
    	<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    	<script type="text/javascript" src="../js/materialize.min.js"></script>