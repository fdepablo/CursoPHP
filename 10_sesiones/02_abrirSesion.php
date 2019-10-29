<!DOCTYPE html>
<html>
<body>
<?php
//Arrancamos la session
//por lo que nos creará una cookie con la id de sessión
//siempre que queramos utilizar una sesion debemos de cargarla
//en memoria.
//Normalmente las sessiones en php se crean en fichero
//(aunque tambien es configurable para que se guarden en BBDD)
//el tiempo de vida de session depende de la configuración del 
//servidor (normalmente 30 minutos)
session_start();

//cogemos el parametro que nos envia el cliente
$texto = $_GET["parametro"];

//ahora metemos el parametro en la session, para poder acceder a el
//cuando queramos
//imaginad que por ejemplo tenemos que mostrar el nombre del usuario
//en todas nuestras paginas web, pues es un claro candidato para
//guardarla en la session
$_SESSION["parametro"] = $texto;

echo "Variables de sesion establecidas <br/>";

//Con esto mostramos el directorio donde se crean las
//sesiones, para ver donde estan
echo "Session salvada en: " . session_save_path() . "<br/>";
?>

<!-- vamos al ultimo paso donde cerramos la session -->
<a href="03_finSession.php"> Ir al ultimo paso</a>

</body>
</html>
