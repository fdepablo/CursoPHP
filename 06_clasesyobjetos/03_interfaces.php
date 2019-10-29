<?php

//Alternativa cuando queremos extender de más de una clase
interface Movible {
	public function caminar();
	public function correr();
}

//cuando una clase implemente una interfaz debemos de implementar todos sus metodos
// en este caso debemos de implementar caminar() y correr()
class Caballo implements Movible{
	protected  $nombre;

	//Ponemos por defecto unos valores
	public function __construct($nombre = "Rocinante"){
		$this->nombre= $nombre;
	}

	public function presentarse(){
		echo "soy el caballo " . $this->nombre;
	}
	
	//y aqui implementamos los metodos de la interfaz
	//y le damos el comportamiento que estimemos oportuno ya 
	//que no todos los objetos van a correr y a caminar de la misma
	//manera
	public function caminar(){
		echo "Soy un caballo y ando a 10 km/h";
	}
	
	public function correr(){
		echo "Soy un caballo y corro a 30 km/h";
	}
}

//la persona tambien se mueve, pero su correr y su caminar van a ser
//diferentes al correr y al caminar de la clase caballo
class Persona implements Movible{
	public function caminar(){
		echo "Soy una persona y ando a 5 km/h";
	}
	
	public function correr(){
		echo "Soy una persona y corro a 10 km/h";
	}
}

$caballo = new Caballo();
$caballo->correr();

echo "<br>";

$persona = new Persona();
$persona->caminar();

echo "<br>";


?>