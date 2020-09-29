<?php
class Cl_User
{
	/**
	 * @var va a contener la conexión de base de datos
	 */
	protected $_con;
	
	/**
	 * Inializar DBclass
	 */
	public function __construct()
	{
		$db = new Cl_DBclass();
		$this->_con = $db->con;
	}
	
	/**
	 * Registro de usuarios
	  */
	public function registration( array $data )
	{
		if( !empty( $data ) ){
			
			// Trim todos los datos entrantes:
			$trimmed_data = array_map('trim', $data);
			
			
			
			// escapar de las variables para la seguridad
			$nombre = mysqli_real_escape_string( $this->_con, $trimmed_data['nombre'] );
                        $apellidop = mysqli_real_escape_string( $this->_con, $trimmed_data['apellidop'] );
                        $apellidom = mysqli_real_escape_string( $this->_con, $trimmed_data['apellidom'] );
                        $genero = mysqli_real_escape_string( $this->_con, $trimmed_data['genero'] );
                        $edad = mysqli_real_escape_string( $this->_con, $trimmed_data['edad'] );
                        $estadocivil = mysqli_real_escape_string( $this->_con, $trimmed_data['estadocivil'] );
                        $correo = mysqli_real_escape_string( $this->_con, $trimmed_data['correo'] );
                        $nivel = mysqli_real_escape_string( $this->_con, $trimmed_data['nivel'] );
                        $grado = mysqli_real_escape_string( $this->_con, $trimmed_data['grado'] );
			$password = mysqli_real_escape_string( $this->_con, $trimmed_data['password'] );
			$cpassword = mysqli_real_escape_string( $this->_con, $trimmed_data['confirm_password'] );
			
			if((!$nombre) || (!$apellidop) || (!$apellidom) || (!$genero) || (!$edad) || (!$estadocivil) || (!$correo) || (!$nivel) || (!$grado) || (!$password) || (!$cpassword)) {
				throw new Exception( FIELDS_MISSING );
			}
			if ($password !== $cpassword) {
				throw new Exception( PASSWORD_NOT_MATCH );
			}
			$password = md5( $password );
			$query = "INSERT INTO users (nombre, apellidop, apellidom, genero, edad, estadocivil, correo, nivel, grado, password) VALUES ('$nombre', '$apellidop', '$apellidom', '$genero', '$edad', '$estadocivil', '$correo', '$nivel', '$grado', '$password')";
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				return true;
			};
		} else{
			throw new Exception( USER_REGISTRATION_FAIL );
		}
	}
	/**
	 * Este metodo para iniciar sesión
	 * @param array $data
	 * @return retorna falso o verdadero
	 */
	public function login( array $data )
	{
		//$_SESSION['logged_in'] = false;
		if( !empty( $data ) ){
			
			// Trim todos los datos entrantes:
			$trimmed_data = array_map('trim', $data);
			
			$correo = mysqli_real_escape_string( $this->_con,  $trimmed_data['correo'] );
			$password = mysqli_real_escape_string( $this->_con,  $trimmed_data['password'] );
				
			if((!$correo) || (!$password) ) {
				throw new Exception( LOGIN_FIELDS_MISSING );
			}
			$password = md5( $password );
			$query = "SELECT user_id, correo, nombre FROM users where correo = '$correo' and password = '$password' ";
			$result = mysqli_query($this->_con, $query);
			$data = mysqli_fetch_assoc($result);
			$count = mysqli_num_rows($result);
			mysqli_close($this->_con);
			if( $count == 1){
				$_SESSION = $data;
				$_SESSION['logged_in'] = true;
				return true;
			}else{
				throw new Exception( LOGIN_FAIL );
			}
		} else{
			throw new Exception( LOGIN_FIELDS_MISSING );
		}
	}
	
	/**
	 * Este metodo para cerrar las sesión
	 */
	public function logout()
	{
		session_unset();
		session_destroy();
		header('Location: index.php');
	}
	
	/**
	 * Esto generará una contraseña aleatoria
	 * @return string
	 */
	
	private function randomPassword() {
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array(); //se debe declarar pass como un arreglo 
		$alphaLength = strlen($alphabet) - 1; //poner la longitud -1 en caché
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //convertir el arreglo en una cadena
	}
}