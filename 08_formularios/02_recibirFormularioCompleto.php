<?php
//voy a validar que todos los datos esten bien
$errores = "";

$nombre = $_REQUEST['name'];//recojo el nombre del usuario
if(trim($nombre) == ""){//le quito los blancos laterales
	//echo "pasamos por aqui";
	$errores .= "El campo nombre debe de estar relleno <BR>";
}

$telefono = $_REQUEST['telephone'];//recojo el telefono
if(!is_numeric($telefono)){//valoro que sea numerico
	//echo "y por aqui";
	$errores .= "El telefono debe de ser numerico" . "<BR>";
}else{
	//recordemos que los valores me llegan siempre en formato cadena
	$iTelefono = intval($telefono);//convertimos el valor del string en un int
}

$mail = $_REQUEST['mail'];//recogemos el email
$size = @$_REQUEST['size'];//recojemos el tamaño
$ingredientes = @$_REQUEST['topping'];//recogemos los ingredientes
$comentarios = $_REQUEST['comments'];//recogemos los comentarios

//si no hay errores
if($errores == ""){
	//simplemente muestro los datos, simulando como si los procesara
	var_dump($nombre);
	var_dump($iTelefono);
	var_dump($mail);
	var_dump($size);
	var_dump($ingredientes);
	var_dump($comentarios);
}else{//en caso de que SI haya errores
	echo "<H1> Se han encontrado los siguientes errores </H1>";
	echo "<h3 style='color:red'>";
	echo $errores;
	echo "</h3>";
}
//en ambos casos, creo un enlace para volver a rellenar el pedido
echo "<br/>";
echo "<a href='02_formularioCompleto.php'>Volver</a>";
?>
