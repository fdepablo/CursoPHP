<?php

//Array indexado
$lista[0] = 'CERO';
$lista[1] = 'UNO';
//Si no introducimos indice, por defecto lo mete PHP de manera secuencial
//aqui meteria en los indices 2,3,4,5. Es una manera de hacer add en php
$lista[] = 'DOS';//indice 2
$lista[] = 'TRES';//indice 3, etc
$lista[] = 'CUATRO';
$lista[] = 'CINCO';

//accedemos a un dato
echo $lista[5].'<br/>';//imprimimos 'CINCO'
echo @$lista[6].'<br/>';//warning ya que no existe (lo evitamos con @)

//Array asociativo(Estructura Map)
$fruta['color'] = 'rojo';
$fruta['arbol'] = 'manzano';
$fruta['nombre'] = 'manzana';

echo $fruta['arbol'].'<br/>';

//Otra forma mas economica de declarar un array indexado
$nombres = array('Paul','Ringo','George','John');
//y en las ultimas versiones de php
$nombres = ['Paul','Ringo','George','John'];

//Otra forma mas economica de declarar un array asociativo
$pera = array('color'=>'verde', 'arbol'=>'peral', 'nombre'=>'pera');//claves=>valor separadas por ','
//en las ultimas versiones de php
$pera = ['color'=>'verde', 'arbol'=>'peral', 'nombre'=>'pera'];

echo $nombres[1].' '.$pera['arbol'].'<p/>';

//add elementos en un arrayPersonas
array_push($nombres,'Diana');
//o mas comoda como hemos visto antes, equivalentes
$nombres[] = 'Pepe';

//Recorrer un array, primero se pone el array y luego la referencia del objeto
foreach ($nombres as $valor){
	echo $valor.'<br/>';//$valor tendra en cada iteracion el contenido de la posicion del array
}

echo '<p/>';

//Recorrer un array de manera asociativa
foreach ($pera as $clave => $valor){
	echo "$clave : $valor <br/>";
}

echo '<p/>';

//tamaño de un array
$tamanio = count($lista); 
echo "Tamaño de la lista $tamanio" . "<br/>";;

//Eliminamos la posicion 4 del array
unset($lista[4]);
//Pero ojo esto no reordena la claves del array

$tamanio = sizeof($lista); //tambien existe sizeof, mas comun usar count
echo "Tamaño de la lista $tamanio" . "<br/>";

//Esta funcion muestra informacion estructurada sobre una o mas expresiones
//incluyendo su tipo y valor.
//Las matrices y los objetos son explorados recursivamente con valores
//sangrados para mostrar su estructura.
var_dump($lista);

echo '<p/>';
//Podemos reordenar las claves de esta manera
//y la posicion 4 tendra el valor de "CINCO"
$listaReordenada = array_values($lista);

var_dump($listaReordenada);

?>
