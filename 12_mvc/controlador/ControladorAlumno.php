<?php
//realpath nos devuelve la ruta fisica real de donde esta algun fichero
//o directorio, en este caso preguntamos por la raiz de nuestros proyectos
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/CursoPHP/12_mvc/modelo/negocio/GestorAlumno.php";

//Recogemos los parametros de nuestro formulario
$accion    = $_GET["accion"];//la accion a realizar, guardar, eliminar, etc
$idAlumno  = $_GET["idAlumno"];//por si necesito modificar o borrar a un alumno
$nombre    = $_GET["nombre"];
$direccion = $_GET["direccion"];
$telefono  = $_GET["telefono"];

//no nos comunicamos nunca directamente con el DAO, siempre
//pasamos por el Gestor, tambien en algunos sitios se le llama Servicio
$gestorAlumno = new GestorAlumno();

$alumno = new Alumno();
//en principio creo el alumno con todos los datos que me lleguen
//notese que es posible que no me lleguen todos, dependera de la accion
$alumno->id = $idAlumno;
$alumno->nombre = $nombre;
$alumno->direccion = $direccion;
$alumno->telefono = $telefono;
//si la accion es guardar debemos mirar si queremos dar de alta o modificar
if($accion=="Guardar"){
	//¿como sabemos si es dar de alta o modificar?
	//si NO nos llegua el id del alumno en la request, entonces debemos
	//de darlo de alta en la base de datos
	if($idAlumno==0 || $idAlumno==''){
		$errorNombre = $gestorAlumno->insertarAlumno($alumno);
	} else {
		//en caso de que llegue el id del alumno, entonces estamos ante una modificación
		$errorNombre = $gestorAlumno->modificarAlumno($alumno);
	}

//en este caso borraremos el alumno
} else if($accion=="Eliminar"){
	$gestorAlumno->borrarAlumno($alumno);
}
//En caso de que la accion que llegue sea 'Vaciar' no hacemos nada con ello
//simplemente volvemos a alumnosweb.php

//cuando has invocado una pagina php y quieres ir a otra (en este caso, queremos ir a la pagina
//que muestra los datos) podemos hacer un redirect
//hacemos un redirect a la pagina alumnosweb.php con la funcion header "location"
header ("location: ../vista/alumnosweb.php?errorNombre=$errorNombre");

?>
