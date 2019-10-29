<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/CursoPHP/11_mysqli/modelo/DAO/AlumnoDao.php";
require_once "$root/CursoPHP/11_mysqli/modelo/entidades/Alumno.php";

$alumnoDao = new AlumnoDAO();

$id = 11;//jesus

$alumno = $alumnoDao->obtenerAlumno($id);
echo "alumno obtenido <br>";

if($alumno)
    $alumno->imprimirAlumno();
else
    echo "Alumno con id: $id no se ha encontrado";
?>
