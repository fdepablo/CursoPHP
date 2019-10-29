<?php
//abro script de php

//IF
$a = 50;
$b = 100;

// == igual a
// < menor que
// > mayor que
// >=
// <=
// && AND
// || OR
// != NOT

if($a>$b){?><!-- aqui cierro el script de php para pintar html comodamente -->
	<h1 align="center"><!-- align="center" hace que la etiqueta h1 se muestre centrada-->
		<font color="green"><!-- Cambiamos el color de fondo -->
			<?php echo $a?> > <?php echo $b?>
		</font>
	</h1>
<?php } else {?><!-- Aqui vuelvo a abrir un script php para poner el "}" que cierra el "{" de arriba
				y ademas para poner el else -->
	<h1 align="center">
		<font color="green">
			<?php echo "$a <= $b"?><!-- Otra manera de hacerlo -->
		</font>
	</h1>
<?php }?><!-- cerramos las llaves del "else" de arriba -->

<?php
if($a==1){//podemos abrir llaves en caso de que queramos escribir varias sentencias
	echo "OPCION1";
} else if ($a==2){//podemos ponerlo junto o separado
	echo "OPCION2";
} elseif ($a==3){
	echo "OPCION3";
} else {
	echo "OPCION != 1,2,3";
}

//operador ternario
echo "<h2> El valor es:";
$variable = true;
//este operador valoramos una variable ($variable), en el lado de la "?" ponemos
//la sentencia que tiene que ejecutar en caso de que sea verdadera la $variable
//en el lado del ":" ponemos la sentencia a ejecutar en caso de que la $variable
//sea falsa. Es parecido a un if-else solo que se hace todo en una misma linea
echo ($variable ? "valor true" : "valor false");
echo "</h2>";
?>



<?php
$a = 2;
//SWITCH
//si no ponemos el break, seguira
//ejecutando aunque no cumpla la condicion
switch($a){
	case 1: echo "OPCION1<br/>";
			break;
	case 2: echo "OPCION2<br/>";
			break;
	case 3: echo "OPCION3<br/>";
			break;
	default: echo "OPCION es distinto de 1,2,3"; //Default No es obligatorio
}
?>
<br/>
<?php
//Bucle FOR
for($i=0; $i<=10; $i++){?>
	<h1 align="center">
		<font color="orange">
			<?php echo $i?><!-- por cada iteracion vuelvo a crear un script php para que imprima $i -->
		</font>
	</h1>

<?php } ?>

<?php
//WHILE 0..N
$x = 0;

while($x<10){
	$x++;
	echo $x;
}

echo "<h1>$x</h1>";

//DO WHILE 1..N al menos se ejecuta una vez
$i = 0;
do {
	$i++;
    echo $i;
} while ($i < 10);//la valoración va al final
?>
