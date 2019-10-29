<?php
class Alumno{
	public $id;
	public $nombre;
	public $direccion;
	public $telefono;
	
	public function imprimirAlumno(){
		echo "id: " . $this->id . " - ".
			 "nombre: " . $this->nombre . " - ".
			 "direccion: " . $this->direccion . " - ".
			 "telefono: " . $this->telefono;
	}
}
?>