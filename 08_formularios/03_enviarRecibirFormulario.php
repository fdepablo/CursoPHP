<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<?php
	$botonSubmit = @($_REQUEST['botonSubmit']);
	$texto = @$_REQUEST['texto'];//si no existe daria un warning
	$errorTexto = "";

	if(isset($texto)){//si existe la variable y no esta vacia
		if(trim($texto) == ""){//si no nos llega el texto habra que mostrar un error
			$errorTexto = "<span style='color:red'>Falta Texto!!</span>";
		}
	}

	//Si NO nos llega el boton submit como parametro en la request debemos de mostrar el formulario
	//ya que es la primera vez que llega el cliente
	//Si hay algun error quiere decir que tenemos que mostrar el formulario pero con los 
	//errores encontrados
	if(!isset($botonSubmit) || ($errorTexto != "")){
	?>
	<form action="03_enviarRecibirFormulario.php">
		<input type="text" name="texto"></input><?php echo $errorTexto;?>
		<br>
		<input type="submit" name="botonSubmit"></input>
	</form>
	<?php
	//en caso contrario mostramos el resultado de haber procesado el formulario
	} else{
		print ("<h1>El texto por request es: $texto</h1>");
		echo "<br>";
	}
	?>
</body>
</html>
