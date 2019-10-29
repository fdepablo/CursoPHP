<?php
//realpath nos devuelve la ruta fisica real de donde esta algun fichero
//o directorio, en este caso preguntamos por la raiz de nuestros proyectos
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

//necesito la clase alumno para poder hacer que los parametros
//de entrada de los metodos sean de tipo Alumno
require_once "$root/CursoPHP/11_mysqli/modelo/entidades/Alumno.php";

//normalmente cuando implementamos un patron DAO, primero tenemos
//que crear una interfaz con todos los metodos que vamos a implementar
//mas adelante
//basicamente implemento los metodos de un CRUD
interface  IAlumnoDAO{

	//tengo insertar
	public function insertarAlumno(Alumno $alumno);

	//modificar
	public function modificarAlumno(Alumno $alumno);

	public function borrarAlumno(Alumno $alumno);

	public function obtenerAlumno($idAlumno);

	public function listarAlumnos();
}
?>
