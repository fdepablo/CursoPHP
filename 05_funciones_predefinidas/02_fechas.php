<?php
//Fecha con la hora actual, numero de segundos desde el 1 de enero de 1970
$fecha = time();
echo 'Numero de segundos desde 1970: ' . $fecha . '<br/>';

//Podemos pasarlo a un formato establecido
//d=dias numerico D=dias en string(ingles)
//m=meses numerico M=meses en string(ingles)
//y=año en dos digitos Y=año en cuatro digitos
//h=hora en 12 horas y H=hora en 24 horas
//i=minutos
//s=segundos
$fechaString = date('d/m/y h:i:s',$fecha);
echo 'Fecha: ' . $fechaString . '<br/>';

//Tambien podemos hacerlo mas automático
//sin necesidad de pasarle el numero de segundos
$fechaDirecta = date('d/m/y h:i:s');
echo 'Fecha directa: ' . $fechaDirecta . '<br/>';;

//Podemos jugar con la fecha sumando segundos, le sumamos dos dias
$pasadoMañana = time() + (60 * 60 * 24 * 2);
$fechaPasadoMañana = date('d/m/y h:i',$pasadoMañana);
//aun así para trabajar con fechas de una manera más seria
//alguna libreria de terceros
echo 'Fecha: ' . $fechaPasadoMañana . '<br/>';

//tambien podemos crear fechas de esta manera
//desde la version php 5 con la orientación a objetos
//podemos crear fechas dado un string
$test = new DateTime('01/01/2011');//notese el new, con new creamos objetos en php, como en java
//y darles el formato que queramos con date_format
echo date_format($test, 'Y-m-d H:i:s');//H en mayuscula es formato 24 horas
echo "<br/>";
//O crear un dateTime con la fecha actual
$test = new DateTime();//sin parametros de entrada
echo date_format($test, 'Y-m-d H:i:s');
?>
