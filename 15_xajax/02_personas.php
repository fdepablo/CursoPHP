<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/CursoPHP/14_xajax/xajax/xajax_core/xajax.inc.php";
require_once "$root/CursoPHP/14_xajax/GestorPersonas.php";

$xajax = new xajax();
/*
	- enable deubgging if desired
	- location of xajax js files
*/
//$xajax->configure('debug', true);
$xajax->configure('javascript URI', 'xajax');
/*
	Function: helloWorld
	
	Modify the innerHTML of div1.
*/
function helloWorld($isCaps)
{
	if ($isCaps)
		$text = 'HELLO WORLD!';
	else
		$text = 'Hello World!';
		
	$objResponse = new xajaxResponse();
	$objResponse->assign('div1', 'innerHTML', $text);
	
	return $objResponse;
}
/*
	Function: setColor	
	Modify the style.color of div1
*/
function setColor($sColor)
{
	$objResponse = new xajaxResponse();
	$objResponse->assign('div1', 'style.color', $sColor);
	
	return $objResponse;
}

function listarPersonas(){
	$objResponse = new xajaxResponse();
	
	$gp = new GestorPersonas();
	$personas = $gp->listar();

	$salida = "";
	foreach($personas as $persona){
		$salida.= "<tr>";
		$salida.= "<td>$persona->nombre</td>";
		$salida.= "<td>$persona->direccion</td>";
		$salida.= "<td>$persona->telefono</td>";
		$salida.= "</tr>";
    }
	$objResponse->assign('tablaPersonas', 'innerHTML', $salida);
	
	return $objResponse;
}

function insertarPersona($nombre,$direccion,$telefono){
	$persona = new stdClass();
	$persona->nombre 	= $nombre;
	$persona->direccion = $direccion;
	$persona->telefono 	= $telefono;

	$gp = new GestorPersonas();
	$gp->insertar($persona);
	return listarPersonas();
}
/*
	Section:  Registramos las funciones
*/
$reqHelloWorldMixed = $xajax->registerFunction('helloWorld');
//le pasamos un valor fijo como primer parametro a la función helloWorld
$reqHelloWorldMixed->setParameter(0, XAJAX_JS_VALUE, 0);//$isCaps = false
$reqHelloWorldAllCaps = $xajax->registerFunction('helloWorld');
$reqHelloWorldAllCaps->setParameter(0, XAJAX_JS_VALUE, 1);//$isCaps = true
$reqSetColor = $xajax->registerFunction('setColor');
//se llamara a la función setColor con el value del desplegable colorSeleccionado
$reqSetColor->setParameter(0, XAJAX_INPUT_VALUE, 'colorSeleccionado');
//damos de alta el relleno de la tabla
$reqListarPersonas = $xajax->registerFunction('listarPersonas');
//damos de alta el insertar personas
$reqInsertarPersona = $xajax->registerFunction('insertarPersona');
$reqInsertarPersona->setParameter(0, XAJAX_INPUT_VALUE, 'nombre');
$reqInsertarPersona->setParameter(1, XAJAX_INPUT_VALUE, 'direccion');
$reqInsertarPersona->setParameter(2, XAJAX_INPUT_VALUE, 'telefono');
/*
	Section: processRequest
	
	This will detect an incoming xajax request, process it and exit.  If this is
	not a xajax request, then it is a request to load the initial contents of the page
	(HTML).
	
	Everything prior to this statement will be executed upon each request (whether it
	is for the initial page load or a xajax request.  Everything after this statement
	will be executed only when the page is first loaded.
*/
$xajax->processRequest();

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>xajax example</title>
<?php
	// output the xajax javascript. This must be called between the head tags
	$xajax->printJavascript();
?>
	<script type='text/javascript'>
		/* <![CDATA[ */
		window.onload = function() {
			// call the helloWorld function to populate the div on load
			<?php $reqHelloWorldMixed->printScript(); ?>;
			// call the setColor function on load
			<?php $reqSetColor->printScript(); ?>;
			//llamamos a la función 
			<?php $reqListarPersonas->printScript(); ?>
		}
		/* ]]> */
	</script>
</head>
<body style="text-align:center;">
	<div id="div1">&#160;</div>
	<br/>
	
	<button onclick='<?php $reqHelloWorldMixed->printScript(); ?>' >Pulsame</button>
	<button onclick='<?php $reqHelloWorldAllCaps->printScript(); ?>' >PULSAME</button>
	<select id="colorSeleccionado" name="colorselect"
		onchange='<?php $reqSetColor->printScript(); ?>;'>
		<option value="black" selected="selected">Black</option>
		<option value="red">Red</option>
		<option value="green">Green</option>
		<option value="blue">Blue</option>
	</select>
	<hr/>
	<table align="center" border="1">
		<tr>
			<th>Nombre</th>
			<th>Direccion</th>
			<th>Telefono</th>
		</tr>
		<tbody id="tablaPersonas"/>
	</table>
	<hr/>
	<table align="center" >
		<tr>
			<td>Nombre: </td>
			<td><input type="text" id="nombre"/></td>
		</tr>
		<tr>
			<td>Direccion: </td>
			<td><input type="text" id="direccion"/></td>
		</tr>
		<tr>
			<td>Telefono: </td>
			<td><input type="text" id="telefono"/></td>
		</tr>
	</table>
	<button onclick='<?php $reqListarPersonas->printScript(); ?>' >Refrescar Datos</button>
	<button onclick='<?php $reqInsertarPersona->printScript(); ?>' >Insertar personas</button>
</body>
</html>