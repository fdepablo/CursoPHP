<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<!-- Creamos un formulario para mandar la petición -->
	<form ACTION="04_procesarFichero.php" METHOD="post"
   		ENCTYPE="multipart/form-data">
   		<input TYPE="file" name="fichero">
   		<!-- podemos configurar el tamaño maximo de
   		las subidas tambien a traves del metodo 'upload_max_filesize'
   		que podemos encontrar en el php.ini (en bytes) -->
   		<input type="hidden" name="MAX_FILE_SIZE" value="200000">
   		<input type="submit" value="Enviar">
	</form>

</body>
</html>
