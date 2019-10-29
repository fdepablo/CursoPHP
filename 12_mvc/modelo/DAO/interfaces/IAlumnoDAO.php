<?php
//realpath nos devuelve la ruta fisica real de donde esta algun fichero
//o directorio, en este caso preguntamos por la raiz de nuestros proyectos
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

require_once "$root/CursoPHP/12_mvc/mysqli_utils/ConexionMySqli.php";
require_once "$root/CursoPHP/12_mvc/modelo/entidades/Alumno.php";


interface  IAlumnoDAO{

	public function insertarAlumno(Alumno $alumno);

	public function modificarAlumno(Alumno $alumno);

	public function borrarAlumno(Alumno $alumno);

	public function obtenerAlumno($idAlumno);

	public function listarAlumnos();
}
?>
