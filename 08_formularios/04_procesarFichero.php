<?php

//cogemos el name del parametro del fichero (dado en el formulario),
//así como el nombre del fichero donde se almacena
//temporalmente en nuestro apache
//para ello primero preguntamos si se ha subido correctamente el fichero
if (is_uploaded_file ($_FILES['fichero']['tmp_name'])){
	$nombreDirectorio = "subidas/";
	//conviene cambiar el nombre original del fichero subido por otro
	//por ejempolo podemos add un idUnico para asegurarnos que no se repita
	//que podria ser el time de la subida
	$idUnico = time();//me da los segundos pasados desde 1 de enero de 1970
	//el nombre del fichero será el id unico mas el nombre del fichero original
	$nombreFichero = $idUnico . "-" . $_FILES['fichero']['name'];

	//copiamos del temporal al fichero nuestro
	//1 argumentos, desde donde
	//2 argumento, a donde
	move_uploaded_file ($_FILES['fichero']['tmp_name'],
			$nombreDirectorio . $nombreFichero);

	echo "Tamaño en bytes subidos: " . $_FILES['fichero']['size'];
	echo "<br/>";
	echo "Fichero subido";
}else{//en caso de que no se haya podido subir
	print ("No se ha podido subir el fichero\n");
}
?>
