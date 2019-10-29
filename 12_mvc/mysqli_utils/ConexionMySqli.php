<?php
class ConexionMySqli{
	const NOMBRE_SERVIDOR = "localhost";
	const USUARIO = "root";
	const PASSWORD = "";
	const SCHEMA = "php";

	public function getConexion(){
		$conexion = @new mysqli(self::NOMBRE_SERVIDOR, self::USUARIO,
														self::PASSWORD, self::SCHEMA);
		if ($conexion->connect_error) {
			//En caso de error no seguimos creando la página
			die("Connection failed: " . $conexion->connect_error);
		}

		return $conexion;
	}
}
?>
