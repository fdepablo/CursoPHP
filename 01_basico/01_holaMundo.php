
<!-- Un fichero php es una conbinación entre etiquetas html y etiquetas php
	podemos intercambiarlo como queramos, tienen extension .php
 -->
<!-- si quiero poner un comentario fuera de unas etiquetas php, seria
como en html -->

<?php
//Esto es un comentario en PHP, igual que en c o en java
//van dentro del script php
/*Esto es un comentario
 * que afecta a varias lineas
 * Estos comentarios no se ven en el html
 */
?>
<H1>Hola mundo!!!</H1>

<?php
	//no podemos escribir php en otro lado que no sean
	//las etiquetas php, lo que esta fuera es html

	//declaramos una variable
	$variable = 'Valor 1';
	//con echo imprimimos un valor en la pagina web
	echo $variable;
?>

<H2>adios mundo</H2>

<!-- el script puede ir con php en mayusculas o en minusculas -->
<?PHP echo 'Esto es otro valor'?><br/><!-- salto de linea 'br' -->

<!-- Equivalente a 'php echo'-->
<?=' Y con esto añadimos más cosas' ?>

<!-- Esto es un comentatio en html y se verá en la pagina web como comentatio --> 

<!-- 
	Para ver esta pagina la direccion normalmente seria la siguiente
	http://localhost/CursoPHP/01_basico/01_holaMundo.php
-->