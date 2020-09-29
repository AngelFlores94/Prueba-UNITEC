<?php require_once 'config.php'; ?>
<?php 
	if(!empty($_POST)){
		try {
			$user_obj = new Cl_User();
			$data = $user_obj->registration( $_POST );
			if($data)$success = USER_REGISTRATION_SUCCESS;
		} catch (Exception $e) {
			$error = $e->getMessage();
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de Usuarios</title>

    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>
	<div class="container">
		<div class="login-form">
			<?php require_once 'templates/message.php';?>
			
			
			<div class="form-header">
				<i class="fa fa-user"></i>
			</div>
			<form method="post" name="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-register" role="form" id="register-form">
		            <div>
					<input name="nombre" id="nombre" type="text" class="form-control" placeholder="Nombre(s)"> 
                                        <span class="help-block"></span>
                                </div>
                            <div>
                                        <input name="apellidop" id="apellidop" type="text" class="form-control" placeholder="Apellido Paterno"> 
                                        <span class="help-block"></span>
                                </div>      
                            <div>
                                        <input name="apellidom" id="apellidom" type="text" class="form-control" placeholder="Apellido Materno"> 
                                        <span class="help-block"></span>
					
				</div>
                 <div>
                                <select name="genero" id="genero" class="form-control">
                                <option value="" selected>Seleccione Su G&eacute;nero</option> 
                                <option value="Masculino">Masculino</option> 
                                <option value="Femenino">Femenino</option>
                                </select>
                                    <span class="help-block"></span>
                                </div>
                            <div>
                            <input name="edad" id="edad" type="number" min="1" max="99" class="form-control" placeholder="Edad"> 
                            <span class="help-block"></span>
                            </div>
                 <div>  
                                <select name="estadocivil" id="user" class="form-control">
                                <option value="" selected>Seleccione Su Estado Civil</option> 
                                <option value="Soltero">Soltero</option> 
                                <option value="Casado">Casado</option>
                                <option value="Divorciado">Divorciado</option>
                                </select>
                                    <span class="help-block"></span>
                                </div>
                            <div>
                                <input name="correo" id="correo" type="email" class="form-control" placeholder="Correo Electr&oacute;nico"> 
					<span class="help-block"></span>
				</div>
                            
                            <div>  
                            <select name="nivel" id="nivel" class="form-control" onchange="cambia_grado()">
                                <option value="" selected>Seleccione Su Nivel de Inter&eacute;s</option> 
                                <option value="1">Preparatoria</option> 
                                <option value="2">Licenciatura</option>
                                <option value="3">Posgrado</option>
                            </select>
                                    <span class="help-block"></span>
                                </div>
                            <div>
                            <select name="grado" class="form-control"> 
                                <option value="">Seleccione una Opcion</option> 
                            </select> 
                            </div><br>
			    <div>
					<input name="password" id="password" type="password" class="form-control" placeholder="Contraseña"> 
					<span class="help-block"></span>
				</div>
				<div>
					<input name="confirm_password" id="confirm_password" type="password" class="form-control" placeholder="Confirmar Contraseña"> 
					<span class="help-block"></span>
				</div>
				<button class="btn btn-block bt-login" type="submit" id="submit_btn" data-loading-text="Registrando....">Registrarse</button>
			</form>
			<div class="form-footer">
                            <div class="row">				
					<div class="col-xs-6 col-sm-6 col-md-6">
						
                                                <a href="index.php" style="font-size: 20px;">
                                                    <i class="fa fa-undo"></i> Regresar 
                                                </a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /container -->
        
 <script>
  var Preparatoria=new Array("Sin Opciones Disponibles");
  var Licenciatura=new Array("Seleccione una Opcion","Lic. en Derecho","Lic. En Finanzas");
  var Posgrado=new Array("Seleccione una Opcion","Mtria. Admon. De Negocios ","Mtria. Direccion de proyectos");

  var todosGrados = [
    [],
    Preparatoria,
    Licenciatura,
    Posgrado
  ];

  function cambia_grado(){ 
   	var nivel;
   	nivel = document.form1.nivel[document.form1.nivel.selectedIndex].value;
   	if (nivel !== 0) { 
      	mis_grados=todosGrados[nivel];
      	num_grados = mis_grados.length;
      	document.form1.grado.length = num_grados;
      	for(i=0;i<num_grados;i++){ 
         	document.form1.grado.options[i].value=mis_grados[i];
         	document.form1.grado.options[i].text=mis_grados[i];
      	}	
   	}else{ 
      	document.form1.grado.length = 1; 
      	document.form1.grado.options[0].value = "Seleccione una Opcion"; 
      	document.form1.grado.options[0].text = "Seleccione una Opcion"; 
   	} 
   	document.form1.grado.options[0].selected = true;
}
  </script>
	
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/register.js"></script>
  </body>
</html>