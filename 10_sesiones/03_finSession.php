<!DOCTYPE html>
<html>
<body>
<?php

//siempre que queramos trabajar con la session debemos de arrancarla
//para cargarla en memoria
session_start();

echo "<h1>La variable de sesion que establecimos es: " . $_SESSION["parametro"] . "</h1>";

//preguntamos si la coockie existe en nuestro sistema de ficheros
if ( isset( $_COOKIE[session_name()] ) ){
    echo "Session establecida. Borrando...<br/>";
    //el primer paso para borrar la session es borrar la cookie de session
    //Eliminar la cookie del navegador estableciendo una cookie caducada (hace 1 hora)
    //le pongo una cookie que tenia que haber caducado en 1 hora, por lo tanto
    //vamos a eliminarla
    setcookie( session_name(), '', time()-3600, '' );
}
//el segundo paso
//limpiar la sesión de la memoria (petición actual)
$_SESSION = array();//borramos todos sus datos

//el tercer paso
//eliminar la sesión de disco (o de bb.dd.)
session_destroy();

echo "<BR>";
echo "La session ha sido destruida";

?>

<a href="01_inicioAbrirSesion.php"> Ir al primer paso</a>

</body>
</html>

<!--
//Otra manera de eliminar la sessión
session_start();
//Con esto se elimina la session pero no la cookie de session del navegador
session_destroy();

//Eliminamos la cookie de session 
//Obtenemos un array con los parametros con los que se inicio
//la cookie de sesion
$parametros_cookies = session_get_cookie_params();

//Machacamos
//session_name=clave de la cookie
//0=nuevo valor
//1=tiempo de vida (si ponemos 0 expirara al cerrar el navegador)
//$parametros_cookies["path"]=la ruta dentro del servidor donde
//							esta disponible la cookie(por defecto '/')
setcookie(session_name(),0,1,$parametros_cookies["path"]);

-->