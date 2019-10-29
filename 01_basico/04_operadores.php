<?php

//Incrementos y decrementos
echo 'Incremento y decremento: ' . '<br>';
$incrementar = 1;
$incrementar++;//sumamos 1
echo $incrementar . '<br/>';
$incrementar--;//restamos 1
echo $incrementar . '<br/>';;

//Multiplicacion y división
echo 'Multiplicación: ' . '<br>';
$numero1 = 10;
$numero2 = '25 veces';
//Si empieza por numerico, lo multiplica por el numerico que empieza
//ya que en tiempo de ejecución lo pasa a numero (ojo, solo si empieza)
//Aun así, podría dar un Notice de que el numero no esta bien formado 
//(dependiendo de la versión de php)
echo @($numero1 * $numero2) . '<br>';

echo 'División: ';
$numero1 = 10;
$numero2 = 2;
echo $numero1 / $numero2 . '<br>';

//Si dividimos algo por 0 daria un warning 
echo 'División por cero: ' . '<br>';
$numero1 = 10;
$numero2 = 0;
echo $numero1 / $numero2 . '<br>';//INF de infinito

echo 'División por cero evitando warnings: ' . '<br>';
$numero1 = 10;
$numero2 = 0;
//Con '@' (operador de control de errores) 
//evitariamos mostrar cualquier mensaje de error por pantalla
echo 'Resultado div por cero: ' . @($numero1 / $numero2) . '<br>';

//Modulo, resto de la division entera
echo 'Modulo: ' . '<br>';
echo (25 % 5) . '<br/>';

//Acumulacion
echo 'Acumulacion: ' . '<br>';
$a = 3;
$a += 5; // establece $a en 8, como si se hubiera dicho: $a = $a + 5;
echo $a . '<br/>';

//Asignacion por valor entre variables
echo 'Asignaciones por valor' . '<br>';
$a = 5;
$b = $a; // $b es una referencia que apunta al valor de $a

//ambos valen 5
echo $a . ' ';
echo $b . '<BR>';

$a = 4; // cambiamos $a a 4

echo $a . ' ';//$a vale 4
echo $b . '<BR>';//$b vale 5

//Asignacion por referencia
echo 'Asignaciones por referencia: ' . '<br>';
$a = 5;
//& trabajamos con punteros, con & le pedimos la posicion de memoria
//que tiene la variable "$a"
$b = &$a; // $b es una referencia que apunta a '$a'

echo $a . ' ';//ambos valen 5
echo $b . '<BR>';

$a = 4; // cambia $a

echo $a . ' ';//ahora ambos valen 4
echo $b . '<BR>';

//operadores logicos
//Diferencias entre && y and (lo mismo para || y or)
echo "Diferencia '&&' y 'and': " . '<br>';
$verdad = true;
$falso = false;

//el operador '=' tiene mas preferencia que 'and' por lo que
//$comprobacion da true
//Se suele utilizar combinado con una función en la parte
//de la derecha que espereamos que funcione adecuadamente
//(mas adelante se vera un ejemplo con ficheros)
$comprobacion = $verdad and $falso;

//Muestra informacion estructurada ademas del tipo y del valor
var_dump($comprobacion);

echo $b . '<BR>';
//el operador '=' NO tiene mas preferencia que '&&'
$comprobacion = $verdad && $falso;
//normalmente el && es el más utilizado (o || en caso del or logico)

var_dump($comprobacion);
echo $comprobacion;

echo $b . '<BR>';
//Operador === e ==
$numero = 5;
$cadena = '5';

//== comprueba que sea igual el valor, sin importar el tipo
if($numero == $cadena){
  echo 'iguales en numero' . '<br/>';
}

$numero2 = 5;
//=== comprueba que sean iguales en tipo y en valor
//si ponemos $cadena devolvera false, si ponemos numero2 devolvera true
if($numero === $cadena){//false
  echo 'iguales en numero y en tipo' . '<br/>';
}else{
  echo 'iguales en numero pero diferentes en tipo' . '<br/>';
}

?>
