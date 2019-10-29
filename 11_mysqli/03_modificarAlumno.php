<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/CursoPHP/11_mysqli/modelo/DAO/AlumnoDao.php";
require_once "$root/CursoPHP/11_mysqli/modelo/entidades/Alumno.php";

$alumnoDao = new AlumnoDAO();

$alumno = new Alumno();
$alumno->id = 11;
$alumno->nombre = "Ramon";
$alumno->direccion = "C\Ventura 23";
$alumno->telefono = "661435522";

$alumnoDao->modificarAlumno($alumno);
echo "alumno modificado <br/>";

$listaAlumnos = $alumnoDao->listarAlumnos();
echo "Imprimiendo lista de alumnos <br/>";

foreach ($listaAlumnos as $alumno){
	$alumno->imprimirAlumno();
	echo "<br>";
}


?>
