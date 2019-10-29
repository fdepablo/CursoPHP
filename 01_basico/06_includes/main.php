<?php
	//Podemos eliminar todo el reporte de errores
	//mediante la funcion error_reporting(0), 
	//seria como poner '@' todas las expresiones 
	//de la pagina que puedan soltar warnings
	//o errores

	//error_reporting(0);
	include 'cabecera.php';
	echo 'Hola mundo con cabecera';
	//Include nos mostrara WARNINGS en caso de
	//no encontrar el archivo
	include 'piedepagina.php';
	echo "hola mundo de nuevo";
	//Required nos mostrara ERRORS en caso de
	//no encontrar el archivo
	require 'piedepagina.php';
	echo "hola hola hola";
	//Tambien tenemos require_once que hace que si no esta incluido
	//el fichero, lo incluye, y si lo esta, no lo incluye, muy util
	//cuando tenemos muchos ficheros que dependen de otros
	require_once 'piedepagina.php';


	//Tambien podemos trabajar de manera absoluta con los ficheros
	//realpath nos devuelve la ruta fisica real de donde esta algun fichero
	//o directorio, en este caso preguntamos por la raiz de nuestros proyectos
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	//así pues luego podemos hacer algo así
	require_once "$root/CursoPHP/01_basico/06_includes/cabecera.php";
?>
