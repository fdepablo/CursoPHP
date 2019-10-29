<?php
//realpath nos devuelve la ruta fisica real de donde esta algun fichero
//o directorio, en este caso preguntamos por la raiz de nuestros proyectos
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

require_once "$root/CursoPHP/11_mysqli/mysqli_utils/ConexionMySqli.php";
require_once "$root/CursoPHP/11_mysqli/modelo/entidades/Alumno.php";
require_once "$root/CursoPHP/11_mysqli/modelo/DAO/interfaces/IAlumnoDAO.php";

//esta clase es la que va a implementar la interfaz de IAlumnoDAO
//por lo sera esta la que codifique sus metodos
class AlumnoDAO implements IAlumnoDAO{

	//metodo que recibe un alumno para insertar
	public function insertarAlumno(Alumno $alumno){
		//creamos un objeto que realice las conexiones
		$conexionMySqli = new ConexionMySqli();

		//pedimos una conexión
		$conexion = $conexionMySqli->getConexion();
		//utilizamos consultas preparadas que son mas optimas y mas seguras
		//de esta manera, evitamos la inyeccion sql, usando '?'
		//el id es autoincremental, así que no se lo paso
		$preparedStmt = $conexion->prepare("INSERT INTO alumnos
													(nombre, direccion, telefono) VALUES (?, ?, ?)");
		//en esta parte sustituyo los interrogantes por el valor
		//el primer parametros corresponde
		//con la primera '?' y así sucesivamente
		//ademas tenemos que decirle el tipo de dato que va a 
		//representamos. como todos los datos son strings, pues ponemos 3 's', 
		$preparedStmt->bind_param("sss",$alumno->nombre , $alumno->direccion,
										$alumno->telefono);
		//con este ultimo ejecutamos la consulta
		$preparedStmt->execute();

		//podemos preguntar por el id insertado
		$idInsertado = $conexion->insert_id;

		//muy IMPORTANTE cerrar el preparedStmt y la conexión
		//las conexiones hay que liberarlas
		$preparedStmt->close();
		$conexion->close();

		//devolvemos el ultimo id insertado
		return $idInsertado;
	}

	//modificamos un alumno a partir de su id
	//le pasamos el alumno que queremos modificar
	public function modificarAlumno(Alumno $alumno){
		$conexionMySqli = new ConexionMySqli();
		echo "modificando alumno con id: $alumno->id <br/>";
		$conexion = $conexionMySqli->getConexion();
		//Esta consulta no es preparada, es menos segura y menos optima
		//no usar, pero un ejemplo para pruebas rapidas por ejemplo
		//no se usan '?' se pone directamente el valor
		$sql = "UPDATE alumnos SET nombre='$alumno->nombre',
						direccion='$alumno->direccion',telefono='$alumno->telefono'
						WHERE id=$alumno->id";
		//lanzamos la consulta
		$result = $conexion->query($sql);
		//cerramos la conexión
		$conexion->close();
	}

	//muy parecido a insertar pero cambia la query
	public function borrarAlumno(Alumno $alumno){
		$conexionMySqli = new ConexionMySqli();

		$conexion = $conexionMySqli->getConexion();

		//siempre consultas preparadas '?'
		$preparedStmt = $conexion->prepare("DELETE FROM alumnos WHERE id=?");
		$preparedStmt->bind_param("i",$alumno->id);
		$preparedStmt->execute();

		//cerramos las conexiones
		$preparedStmt->close();
		$conexion->close();
	}

	//normalmente la idea es siempre la misma, lo que cambia es la query
	//y alguna idea menor
	public function obtenerAlumno($idAlumno){
		$conexionMySqli = new ConexionMySqli();
		$conexion = $conexionMySqli->getConexion();
		$sql = "SELECT id,nombre,telefono,direccion FROM alumnos
						WHERE id=?";

		$preparedStmt = $conexion->prepare($sql);
		//en este caso como es un entero lo que sustitumos, ponemos una 'i'
		$preparedStmt->bind_param("i",$idAlumno);
		$preparedStmt->execute();

		//en este caso tambien cambia, porque nos devuelve un registro que
		//vamos a mapear a un objeto de la clase Alumno
		//con esta esta función me devuelve un array con los posibles
		//resultados de la consulta (en principio de 0 a 1 ya que es busqueda por
		//primary key)
		$result = $preparedStmt->get_result();

		$alumno = null;
		//si el numero de filas que hemos obtenido es mayor que cero
		if ($result->num_rows > 0) {
			//nos traemos las columnas en un array asociativo
			//sabemos que solo hay una fila ya que el id es unico
			//este array asociativo representa un registro de la bbdd
			$row = $result->fetch_assoc();
			//creo un nuevo alumno para poner ahi la información
			$alumno = new Alumno();

			$alumno->id = $row["id"];//igualo al valor del campo id de la tabla
			$alumno->nombre = $row["nombre"];
			$alumno->direccion = $row["direccion"];
			$alumno->telefono = $row["telefono"];

		}
		//cerramos la conexión
		$conexion->close();

		return $alumno;
	}

	//muy parecido a obtenerAlumno pero esta vez devolvemos un array
	//con todos los alumnos
	public function listarAlumnos(){
		$conexionMySqli = new ConexionMySqli();

		$conexion = $conexionMySqli->getConexion();
		//creamos la query
		$sql = "SELECT id,nombre,telefono,direccion FROM alumnos";
		$result = $conexion->query($sql);

		//esta vez un array devolvemos
		$listaAlumnos = array();
		if ($result->num_rows > 0) {//ahora puede haber de 0 a N registros
			//mientras haya filas que procesar, nos traemos el array asociativo
			//con las columnas
			//esta funcion me devuelve el siguiente registro de la bbdd que ha encontado
			//cuando esta función devuelva false se dejara de ejecutar
			while($row = $result->fetch_assoc()) {
				//por cada registro que encontremos, creamos un alumno
				//y lo metemos en el array
				$alumno = new Alumno();

				$alumno->id = $row["id"];
				$alumno->nombre = $row["nombre"];
				$alumno->direccion = $row["direccion"];
				$alumno->telefono = $row["telefono"];

				$listaAlumnos[] = $alumno;//esto es un add
			}
		}

		$conexion->close();

		return $listaAlumnos;
	}
}
?>
