<?php 
ob_start();
session_start();
require_once 'config.php'; 
?>
<?php 
	if( !empty( $_POST )){
		try {
			$user_obj = new Cl_User();
			$data = $user_obj->login( $_POST );
			if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
				header('Location: home.php');
			}
		} catch (Exception $e) {
			$error = $e->getMessage();
		}
	}
	
	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
		header('Location: home.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio de sesión</title>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <!-- Enlaces de Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>
	<div class="container">
		<div class="login-form">
			<?php require_once 'templates/message.php';?>
			<div class="form-header">
				<i class="fa fa-user"></i>
			</div>
			<form id="login-form" method="post" class="form-signin" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div>    
                            <input name="correo" id="correo" class="form-control" placeholder="Correo Electr&oacute;nico" autofocus> 
                            <span class="help-block"></span>
                            </div>
                        <div>
				<input name="password" id="password" type="password" class="form-control" placeholder="Contraseña">
                                <span class="help-block"></span>
                            </div>    
				<button class="btn btn-block bt-login" type="submit" id="submit_btn" data-loading-text="Iniciando....">Iniciar sesión</button>
			</form>
			<div class="form-footer">
				<div class="row">					
					<div class="col-xs-6 col-sm-6 col-md-6">
						<a href="register.php" style="font-size: 20px;"> 
                                                    <i class="fa fa-check"></i> Registrarse 
                                                </a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /container -->
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/login.js"></script>
  </body>
</html>
<?php ob_end_flush(); ?>