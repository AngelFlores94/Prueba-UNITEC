<?php
require_once 'messages.php';

define( 'BASE_PATH', 'http://localhost/127.0.0.1/sistemalogin/');//Ruta base donde se encuentra
define( 'DB_HOST', 'localhost' );//Servidor de la base de datos
define( 'DB_USERNAME', 'root');//Usuario de la base de datos
define( 'DB_PASSWORD', '');//Contraseña de la base de datos
define( 'DB_NAME', 'sistemalogin');//Nombre de la base de datos

function __autoload($class)
{
	$parts = explode('_', $class);
	$path = implode(DIRECTORY_SEPARATOR,$parts);
	require_once $path . '.php';
}
