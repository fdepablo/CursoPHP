<?php
//definimos una constante de donde esta el fichero que vamos a leer
define("FICHERO", "archivos/fichero.txt");

//si se abre correctamente no se ejecutará la parte despues del or
//ya que si algo es verdadero no importa lo que haya despues
//la funcion 'die" es una funcion que acaba inmediatamente con la ejecución
//del programa php
//En caso de error(no se haya podido abrir el fichero)
// no se continuará ejecutando el resto del php
//con 'r' abrimos el fichero en modo lectura
$fichero = fopen(FICHERO, "r") or die("no se ha podido abrir el fichero!");
//fopen nos devuelve el fichero para poder leerlo
//y tenemos varias funciones para ello
//filesize nos devuelve el tamaño del fichero en bytes
//fread nos devuelve todo el contenido del fichero
$contenidoFichero = fread($fichero,filesize(FICHERO));//abreme todo el fichero
echo "El contenido del fichero es: " . $contenidoFichero;
//importante! Debemos cerrar siempre un fichero despues de utilizarlo
fclose($fichero);

echo "<br/> <br/> Procesando fichero linea a linea <br/>";

//Para procesar linea a linea, ya que a veces puede ser muy largo el contenido
//de un fichero para cargarlo en memoria. Se hace igual que antes pero esta vez
//notese que no lo paso el tamaño del fichero.
$fichero = @fopen(FICHERO, "r");
if($fichero){//preguntamos que no sea null
	while(!feof($fichero)) {//mientos no lleguemos al final del fichero
		echo "linea: " . fgets($fichero) . "<br>";//fgets nos devuelve la siguiente linea del fichero
	}
	fclose($fichero);//como siempre cerramos la conexión
}

//si queremos trabajar con fichero externos a nuestra aplicación podemos trabajar
//con rutas absolutas
echo "<br/> Abrimos fichero externo <br/>";

//tambien podriamos procesar fichero en una ruta
$ficheroExterno = fopen("C:/xampp/fichero.txt", "r") or die("no se ha podido abrir el fichero!");
echo fread($ficheroExterno,filesize("C:/xampp/fichero.txt"));
fclose($ficheroExterno);

?>
