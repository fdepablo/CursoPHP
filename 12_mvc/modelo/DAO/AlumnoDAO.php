<?php
//realpath nos devuelve la ruta fisica real de donde esta algun fichero
//o directorio, en este caso preguntamos por la raiz de nuestros proyectos
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

require_once "$root/CursoPHP/12_mvc/mysqli_utils/ConexionMySqli.php";
require_once "$root/CursoPHP/12_mvc/modelo/entidades/Alumno.php";
require_once "$root/CursoPHP/12_mvc/modelo/DAO/interfaces/IAlumnoDAO.php";

class AlumnoDAO implements IAlumnoDAO{

	public function insertarAlumno(Alumno $alumno){
		$conexionMySqli = new ConexionMySqli();

		//pedimos una conexión
		$conexion = $conexionMySqli->getConexion();
		//utilizamos consultas preparadas que son mas optimas y mas seguras
		$preparedStmt = $conexion->prepare("INSERT INTO alumnos
													(nombre, direccion, telefono) VALUES (?, ?, ?)");
		//le decimos que son tres strings con las 's'
		$preparedStmt->bind_param("sss",$alumno->nombre , $alumno->direccion,
										$alumno->telefono);
		$preparedStmt->execute();

		//podemos preguntar por el id insertado
		$idInsertado = $conexion->insert_id;

		//muy importante cerrar el preparedStmt y la conexión
		$preparedStmt->close();
		$conexion->close();

		return $idInsertado;
	}

	public function modificarAlumno(Alumno $alumno){
		$conexionMySqli = new ConexionMySqli();
		echo "modificando alumno con id: $alumno->id";
		$conexion = $conexionMySqli->getConexion();
		//Esta consulta no es preparada, es menos segura y menos optima
		$sql = "UPDATE alumnos SET nombre='$alumno->nombre',
						direccion='$alumno->direccion',telefono='$alumno->telefono'
						WHERE id=$alumno->id";

		$result = $conexion->query($sql);

		$conexion->close();
	}

	public function borrarAlumno(Alumno $alumno){
		$conexionMySqli = new ConexionMySqli();

		$conexion = $conexionMySqli->getConexion();

		$preparedStmt = $conexion->prepare("DELETE FROM alumnos WHERE id=?");
		$preparedStmt->bind_param("i",$alumno->id);
		$preparedStmt->execute();

		$preparedStmt->close();
		$conexion->close();
	}

	public function obtenerAlumno($idAlumno){
		$conexionMySqli = new ConexionMySqli();
		$conexion = $conexionMySqli->getConexion();
		$sql = "SELECT id,nombre,telefono,direccion FROM alumnos
						WHERE id=?";

		$preparedStmt = $conexion->prepare($sql);
		$preparedStmt->bind_param("i",$idAlumno);
		$preparedStmt->execute();

		$result = $preparedStmt->get_result();

		$alumno = null;
		//si obtenemos filas al ejecutar
		if ($result->num_rows > 0) {
			//nos traemos las columnas en un array asociativo
			//sabemos que solo hay una fila ya que el id es unico
			$row = $result->fetch_assoc();
			$alumno = new Alumno();

			$alumno->id = $row["id"];
			$alumno->nombre = $row["nombre"];
			$alumno->direccion = $row["direccion"];
			$alumno->telefono = $row["telefono"];

		}

		$conexion->close();

		return $alumno;
	}

	public function listarAlumnos(){
		$conexionMySqli = new ConexionMySqli();

		$conexion = $conexionMySqli->getConexion();
		$sql = "SELECT id,nombre,telefono,direccion FROM alumnos";
		$result = $conexion->query($sql);

		$listaAlumnos = array();
		if ($result->num_rows > 0) {
			//mientras haya filas que procesar, nos traemos el array asociativo
			//con las columnas
			while($row = $result->fetch_assoc()) {
				$alumno = new Alumno();

				$alumno->id = $row["id"];
				$alumno->nombre = $row["nombre"];
				$alumno->direccion = $row["direccion"];
				$alumno->telefono = $row["telefono"];

				$listaAlumnos[] = $alumno;
			}
		}

		$conexion->close();

		return $listaAlumnos;
	}
}
?>
