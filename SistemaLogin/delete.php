<?php

$id = $_GET['user'];

$con = mysqli_connect("localhost", "root", "", "sistemalogin");
    if (!$con){
        die('ERROR DE CONEXION CON MYSQL: ' . mysqli_connect_error());
    }

    $result =  mysqli_query($con, "DELETE FROM users WHERE user_id = '$id'");
	
?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
				<?php if($result) { ?>
				<h3>REGISTRO ELIMINADO</h3>
				<?php } else { ?>
				<h3>ERROR AL ELIMINAR</h3>
				<?php } ?>
				
				<a href="users.php" class="btn btn-primary">Regresar</a>
				
				</div>
			</div>
		</div>
	</body>
</html>
