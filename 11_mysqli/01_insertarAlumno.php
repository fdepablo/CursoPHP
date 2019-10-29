<?php
//necesito el AlumnoDao y el alumno para hacer las conexiones
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/CursoPHP/11_mysqli/modelo/DAO/AlumnoDao.php";
require_once "$root/CursoPHP/11_mysqli/modelo/entidades/Alumno.php";

$alumnoDao = new AlumnoDAO();

$alumno = new Alumno();
$alumno->nombre = "Jesus";
$alumno->direccion = "C\Mayor 44";
$alumno->telefono = "913456789";

//primero inserto el alumno
$idInsertado = $alumnoDao->insertarAlumno($alumno);
echo "alumno insertado con id:$idInsertado <br>";

//y leugo los listo (luego veremos este metodo)
$listaAlumnos = $alumnoDao->listarAlumnos();
echo "Imprimiendo lista de alumnos <BR>";

//recorro la lista y muestro a los alumnos
foreach ($listaAlumnos as $alumno) {
	$alumno->imprimirAlumno();
    echo "<br>";
}
