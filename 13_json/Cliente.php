<?php
class Cliente{
    public $edad;
    public $apellidos;

    public function setEdad($edad){
        $this->edad = $edad;
    }

    public function getEdad(){
        return $this->edad;
    }

    public function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }

    public function getApellidos(){
        return $this->apellidos;
    }

    public function __toString(){
        return "Apellidos $this->apellidos , edad $this->edad ";
    }

    public function equal(Persona $aux){
        if($this == $aux)
          return true;
        else
          return false;
    }   
}

?>