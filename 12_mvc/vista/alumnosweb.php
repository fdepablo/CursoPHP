<html>
<body>
<?php
//realpath nos devuelve la ruta fisica real de donde esta algun fichero
//o directorio, en este caso preguntamos por la raiz de nuestros proyectos
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/CursoPHP/12_mvc/modelo/negocio/GestorAlumno.php";

//solamente vamos a trabajar con esta capa para traernos la información
//es decir, para mostrar la lista de usuarios en la tabla
$gestorAlumno = new GestorAlumno();

//en caso de que nos llegue el id del alumno
//quiere decir que debemos mostrarlo, asi que lo buscamos
//el id del alumno solo nos llegara cuando se seleccione desde la tabla
//donde se muestran todos los alumnos.
if(@$_GET["idAlumno"]){
	$alumnoSeleccionado = $gestorAlumno->obtenerAlumno($_GET["idAlumno"]);
}else{
	//si no llega el id del alumno, entonces simplemente
	//creamos uno vacio
	$alumnoSeleccionado = new Alumno();
}
$errorNombre = @$_GET["errorNombre"];
?>

<!-- este formulario se encarga de mostrar y mandar ifnoramción -->
<form action="../controlador/ControladorAlumno.php">

	<p>
		<!-- Limpia los registros del formulario -->
		<input type="submit" name="accion" value="Vaciar"/>
		<!-- Crea un nuevo alumno o modifica uno existente
				, para modificar un alumno primero debemos seleccionarlo
				en la tabla para que se nos cargue en el formulario
	   -->
		<input type="submit" name="accion" value="Guardar"/>
		<!-- Elimina un alumno de la BD -->
		<input type="submit" name="accion" value="Eliminar"/>
	</p>

	<!--
		guardamos el id del alumno ya que si seleccionamos borrar o guardar
		debemos de saber su id para borrarlo o modificarlo en la BD
	-->
	<input type="hidden" name="idAlumno" value="<?php echo $alumnoSeleccionado->id?>"/>
	<table>
		<tr>
			<td>Nombre:</td>
			<td>
				<input type="text" name="nombre" value="<?php echo $alumnoSeleccionado->nombre?>"/>
				<?= $errorNombre == "error" ? "Nombre obligatorio" : ""?>
			</td>
		</tr>
		<tr>
			<td>Direccion:</td>
			<td>
				<input type="text" name="direccion" value="<?php echo $alumnoSeleccionado->direccion?>"/>
			</td>
		</tr>
		<tr>
			<td>Telefono:</td>
			<td>
				<input type="text" name="0" value="<?php echo $alumnoSeleccionado->telefono?>"/>
			</td>
		</tr>

	</table>
</form>

<!-- Aqui se muestra una tabla con todos los alumnos de la base de datos -->
<table border="1">
	<tr>
		<th>id</th>
		<th>Nombre</th>
		<th>Dirección</th>
		<th>Teléfono</th>
	</tr>
	<?php
	//me traigo la lista para mostrarla
	$listaAlumnos = $gestorAlumno->listarAlumnos();
	foreach ($listaAlumnos as $alumno){
	?>
		<tr>
			<td><?php echo $alumno->id?></td>
			<td>
				<a href="alumnosweb.php?idAlumno=<?php echo $alumno->id?>">
					<?php echo $alumno->nombre?>
				</a>
			</td>
			<td><?php echo $alumno->direccion?></td>
			<td><?php echo $alumno->telefono?></td>
		</tr>
	<?php
	}
	?>
</table>
<h3>Seleccione primero un alumno para eliminarlo</h3>

</body>
</html>