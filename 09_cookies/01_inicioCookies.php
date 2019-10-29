<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<?php 
		//Establecemos una cookie de prueba con la función setcookie
		//nombre -> cookiePrueba
		//valor -> Esto es una prueba de cookie
		//tiempo de vida en segundos (desde 1 del 1 de 1970) -> en este caso 1 hora
		setcookie("cookiePrueba","Esto es una prueba de cookie",time()+3600);
		//esta cookie estará activa durante 1 hora en el navegador del cliente
	?>
	<a href="02_finCookies.php">Pulsar para ver la cookie</a>
</body>
</html>
