<?php
//esta clase es una entidad que tiene 4 atributos que mapearan
//los 4 campos de la bbdd
class Alumno{
	public $id;
	public $nombre;
	public $direccion;
	public $telefono;
	
	//funcion que muestra un alumno por pantalla
	public function imprimirAlumno(){
		echo "id: " . $this->id . " - ".
			 "nombre: " . $this->nombre . " - ".
			 "direccion: " . $this->direccion . " - ".
			 "telefono: " . $this->telefono;
	}
}
?>