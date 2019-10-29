<?php
//Algunas funciones predefinidas

//Notese los espacion en los laterales
$cadena = "  esto es una cadena  ";//esta cadena no podemos cambiar su valor
var_dump($cadena);

echo "<br/>";

//Los strings son inmutables por lo que siempre
//que tratemos un string nos devolvera un string nuevo, string antiguo no se altera
//por lo tanto, las funciones que cambian un string SIEMPRE nos devuelven un string 
//nuevo
//Partir la cadena por algo, en este caso por espacio en blanco
$cadenaDividida = explode(" ", $cadena);
//el resultado es un array
var_dump($cadenaDividida[2]);//los espacios en blanco del principio tambien cuentan, que son el 0 y el 1,
//es decir en la posicion 2 tendremos el valor "esto"
echo "<br/>";
var_dump($cadenaDividida);
echo "<br/>";
//inmutable, la cadena original no ha cambiado
var_dump($cadena);
echo "<br/>";

//para este caso, es mejor quitar los espacios de los lados de los laterales
$cadenaSinBlancosLaterales = trim($cadena);
var_dump($cadenaSinBlancosLaterales);

echo "<br/>";

$cadenaDivididaSinBlancosLaterales = explode(" ", $cadenaSinBlancosLaterales);
var_dump($cadenaDivididaSinBlancosLaterales);
echo "<br/>";

//convertir a mayusculas
$cadenaMayusculas = strtoupper($cadenaSinBlancosLaterales);
var_dump($cadenaMayusculas);
echo "<br/>";

//convertir a minusculas
$cadenaMinusculas = strtolower($cadenaSinBlancosLaterales);
var_dump($cadenaMinusculas);
echo "<br/>";

//numero de caracteres
$longitudCadena = strlen($cadenaMayusculas);
echo "longitud de la cadena " . $longitudCadena;
echo "<br/>";

//contar el numero de elementos de un array
echo "Elementos del array: " . count($cadenaDivididaSinBlancosLaterales) . "<br/>";

//De la siguiente manera mostramos los valores de un array
//sin mostrar las claves
echo "Contamos todos los valores de un array: ";
var_dump(array_count_values($cadenaDivididaSinBlancosLaterales));
echo "<br/>";

//Devuelve la clave donde se encuentra el valor buscado
//Devuelve vacio en caso de no encontrar la clave
$encontrada = array_search("es", $cadenaDivididaSinBlancosLaterales);//true en caso de que encuentre la palabra
echo "Clave encontrada: " . $encontrada .  "<br>";

//Ordenacion alfabetica
sort($cadenaDivididaSinBlancosLaterales);
var_dump($cadenaDivididaSinBlancosLaterales);
echo "<br/>";

//Ordenacion al reves
rsort($cadenaDivididaSinBlancosLaterales);
var_dump($cadenaDivididaSinBlancosLaterales);
echo "<br/>";
?>