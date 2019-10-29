<html>

<?php

//Declaramos unas variables
//deben empezar por '$' seguida de letra o '_'
//PHP es un lenguaje no tipado a diferencia de otros como Java
//por lo que con una variable podemos apuntar a cualquier tipo de variable
$variableString = 'Hola';
//$variableString = 5;
//$variableString = true;

// Para mostrar datos podemos usar las funciones print y echo que son similares. 
// echo -> muestra una o mas cadenas separadas por comas
// print -> muestra UNA SOLA cadena 
// NOTA: echo se procesa más rapido que print
// NOTA: Con '.' SIEMPRE concateamos strings.

//Podemos empezar por comillas simples o dobles, aunque hay alguna diferencia (ver más adelante)
print $variableString . ' a todos con print y comillas simples \' \\';
print '<br/>';
//Esta linea no funcionaria con la funcion print, ya que solo acepta un parametro
echo $variableString , " a todos con echo y comillas dobles \" ";

print '<br/>';
//Un string es un array de caracteres
echo $variableString[0];//H
echo $variableString[3];//a
print '<br/>';

echo 'Numero:';
$variableNumero = 25;//no hay tipo en las variables
echo $variableNumero;

print '<br/>';
//en PHP los numeros decimales se declaran con '.'
echo 'Numero con decimales:';
$variableNumero = 25.34;
echo $variableNumero;

print '<br/>';

$variableBooleana = false;
//Variables booleanas a false imprimen '' (vacio)
echo 'variable booleana(false): ' , $variableBooleana;
$variableBooleana = true;
print '<br/>';
//Variables booleanas a true imprimen '1'
echo 'variable booleana(true): ' , $variableBooleana;
print '<br/>';

//constantes con la palabra 'define' (hay otra manera en poo desde la v5)
define ('CONSTANTE','valor de constante');//clave-valor
echo CONSTANTE;
print '<br/>';

//Con dobles comillas se expanden las variables
echo "valor de la variable " . $variableString . "<br/>";//Hola
echo "valor de la variable $variableString";//Hola
echo '<br/>';
//Con comillas simples no
print 'valor de la variable $variableString';

//tipos de datos, se deciden en tiempo de ejecucion
echo '<hr/>';
$cadena = 'esto es una cadena';
$entero = 34;
$decimal = 34.45;
$booleano = true;
//tambien podemos apuntar a null
$nulo = null;//no apuntamos a nada, tiene mas sentido en poo

//podemos obtener el tipo y preguntar por su tipo
echo gettype($cadena) . '<br/>';
echo gettype($entero) . '<br/>';
echo gettype($decimal) . '<br/>';
echo gettype($booleano) . '<br/>';
echo gettype($nulo) . '<br/>';//NULL, tambien es un tipo

echo '<hr/>';

echo is_null($nulo) . '<br/>';
echo is_string($cadena) . '<br/>';
echo is_numeric($decimal) . '<br/>';
echo is_numeric($entero) . '<br/>';
echo is_integer($entero) . '<br/>';
echo is_float($decimal) . '<br/>';
echo is_bool($booleano) . '<br/>';

//Con var_dump sacamos información referente a la variable
//muy util en desarrollo
var_dump($cadena);
?>

</html>