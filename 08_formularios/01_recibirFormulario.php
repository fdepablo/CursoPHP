<?php
$texto = $_REQUEST['texto'];
print ("El texto por request es: $texto");

echo "<br>";

//si lo enviamos por get podemos hacerlo así tambien
$texto = @$_GET["texto"];
print ("El texto por get es: $texto");

echo "<br>";

//Esto daria un error ya que no esta pasado por post
$texto = @($_POST['texto']);
print ("El texto por post es: $texto");
?>
