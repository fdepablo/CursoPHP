<?php

function hola_mundo(){
	echo "Hola como estas?" . "<BR>";
}

hola_mundo() ;

//No hace falta que una funcion este declarada primero antes de llamarla
echo saludar() . "<BR>";

function saludar(){
	//podemos retornar valores con la palabra reservada RETURN
	return "Hola como estas con return?";
}


function contador(){
	//Mediante la palabra static inicializamos solamente una vez
	//la variable (la primera vez que se llame a la funcion)
	static $contador = 0;
	//incrementamos antes porque sino nos devolvera el valor sin incrementar
	//return tiene mayor prioridad que ++
	return ++$contador;
}

echo contador() . "<BR>";
echo contador() . "<BR>";
echo contador() . "<BR>";
//las variables de funcion son locales a dicha función

//Alcance de variables globales
// Ambito global por estar declarada fuera de cualquier funcion
$variableGlobal = "Valor 1";
//lo que pasa es que php da un tratamiento especial a las variables globales
//ya que no se pueden acceder a ellas directamente dentro de las funciones

function imprimirVariableGlobalError(){
	//no podemos acceder directamente a una variable global
	//con el operador ternario, si no me da fallo imprimo el valor de la variable
	//en caso de que me de fallo (es decir, no pueda acceder a ella), mostrare
	//un "no puedo acceder". Este ejemplo va a fallar porque no puedo acceder a la
	//variable globar directamente
	echo "Valor de variable Global: "
				. (@($variableGlobal) ? $variableGlobal : "No puedo acceder")
				. "<BR>";
}

imprimirVariableGlobalError();

echo "<br>";

function imprimirVariableGlobal(){
	//Decimos explicitamente que vamos a buscar una variable global
	//mediante la palabra reservada "global"
	global $variableGlobal;
	echo "Valor de variable Global: " . $variableGlobal . "<BR>";//
	//tambien podemos hacerlo con la variable $GLOBALS que es un array
	echo "Valor de variable Global: " . $GLOBALS['variableGlobal'] . "<BR>";
}

imprimirVariableGlobal();

//podemos pasar parametros a una función y darle un valor por defecto
//en caso de tener valores por defecto deben ir al final de los argumentos
function funcionConParametros($parametro1, $parametro2 = 'valor por defecto'){
	echo 'el parametro1 vale ' . $parametro1 . ' y el parametro2 vale ' . $parametro2 . '<br/>';
}

funcionConParametros('parametro1','parametro2');
funcionConParametros('parametro1');

//para devolver parametros la para return, notese que no ponemos en la declaracion de la función
//el tipo de retorno
function funcionRetorno ($numero1, $numero2){
	return $numero1 + $numero2;
}

echo funcionRetorno(3,4);
?>
