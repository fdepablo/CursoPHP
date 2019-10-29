<?php
//clase que se encarga de hacer las conexiones a la bbdd
class ConexionMySqli{
	//establecemos todos los parametros de conexión
	const NOMBRE_SERVIDOR = "localhost";
	const USUARIO = "root";
	const PASSWORD = "";
	const SCHEMA = "php";

	//este metodo se encarga de devolver una conexión a la bbdd
	public function getConexion(){
		$conexion = @new mysqli(self::NOMBRE_SERVIDOR,
								self::USUARIO,
								self::PASSWORD, 
								self::SCHEMA);
		//en caso de que haya error, para la ejecución
		if ($conexion->connect_error) {
			//En caso de error no seguimos creando la página
			die("Connection failed: " . $conexion->connect_error);
		}
		//si todo ha ido bien, devuelvo la conexión
		return $conexion;
	}
}
?>
