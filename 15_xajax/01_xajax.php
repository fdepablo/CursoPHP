<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/CursoPHP/14_xajax/xajax/xajax_core/xajax.inc.php";

$xajax = new xajax();

function si_no($entrada){
    if ($entrada=="true"){
        $salida = "Marcado";
    }else{
        $salida = "No marcado";
    }
 
    //instanciamos el objeto para generar la respuesta con ajax
    $respuesta = new xajaxResponse();
    //escribimos en la capa con id="respuesta" el texto que aparece en $salida
    $respuesta->assign("respuesta","innerHTML",$salida);
 
     //tenemos que devolver la instanciación del objeto xajaxResponse
    return $respuesta;
 }

 //asociamos la función creada anteriormente al objeto xajax
$xajax->registerFunction("si_no"); 

//El objeto xajax tiene que procesar cualquier petición
$xajax->processRequest(); 
?>
<html>
<head>
   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
   <META HTTP-EQUIV="Content-Type" CONTENT="text/html;charset=ISO-8859-1">
   <title>Si / No en Ajax</title>
   <?php
   //indicamos al objeto xajax se encargue de generar el javascript necesario
   $xajax->printJavascript("xajax");
   ?>
</head>

<body>

<div id="respuesta"></div>

<form name="formulario">
    <input type="checkbox" name="si" value="1" onclick="xajax_si_no(document.formulario.si.checked)">
</form>

<script type="text/javascript">
   //Llamando inicialmente a la función xajax_si_no inicializamos el valor de la capa con la respuesta
   //accedemos al campo checked
   xajax_si_no(document.formulario.si.checked); 
   </script>
</body>
</html> 