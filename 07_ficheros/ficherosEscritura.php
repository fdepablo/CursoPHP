<?php
//para escribir, aunque es mas habitual usar BBDD
define("FICHERO", "archivos/escritura.txt");

//abrimos el fichero para escritura con "w"
$fichero = fopen(FICHERO, "w"); 
echo filesize(FICHERO);
//con la funcion fwrite escribimos en un fichero
fwrite($fichero, "Hola esto es una escritura\n en el fichero \t para una prueba");
fclose($fichero);//siempre cerrar las conexiones
?>
