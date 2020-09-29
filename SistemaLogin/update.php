<?php
require 'conexion.php';

	$ids = $_POST['user_id'];
	$nombre1 = $_POST['nombre'];
        $apellidop1 = $_POST['apellidop'];
        $apellidom1 = $_POST['apellidom'];
        $genero1 = $_POST['genero'];
        $edad1 = $_POST['edad'];
        $estadocivil1 = $_POST['estadocivil'];
        $nivel1 = $_POST['nivel'];
        $grado1 = $_POST['grado'];
        
    $sql = "UPDATE users SET nombre='$nombre1', apellidop='$apellidop1', apellidom='$apellidom1', genero='$genero1', edad='$edad1', estadocivil='$estadocivil1', nivel='$nivel1', grado='$grado1' WHERE user_id = '$ids'";
    $resultado = $mysqli->query($sql);
        
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
					<?php if($resultado) { ?>
						<h3>REGISTRO MODIFICADO</h3>
						<?php } else { ?>
						<h3>ERROR AL MODIFICAR</h3>
					<?php } ?>
                                                
                                                <input type="hidden" value="<?php echo $ids?>">
                                                <input type="hidden" value="<?php echo $name11?>">
                                                <input type="hidden" value="<?php echo $user11?>">
					
					<a href="users.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
            
	</body>
</html>


