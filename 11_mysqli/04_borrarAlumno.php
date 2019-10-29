<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/CursoPHP/11_mysqli/modelo/DAO/AlumnoDao.php";
require_once "$root/CursoPHP/11_mysqli/modelo/entidades/Alumno.php";

$alumnoDao = new AlumnoDAO();
$alumno = new Alumno();

$alumno->id = 11;
$alumnoDao->borrarAlumno($alumno);

$listaAlumnos = $alumnoDao->listarAlumnos();

echo "Imprimiendo lista de alumnos <br/>";

foreach ($listaAlumnos as $alumno){
	$alumno->imprimirAlumno();
	echo "<br>";
}


?>
