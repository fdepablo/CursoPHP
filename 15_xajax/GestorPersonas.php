<?php
class GestorPersonas{

        public function __construct(){
            //solo la primera vez
			session_start();
            if(!isset($_SESSION['personas'])){
                $personas = array();
                for($indice=0;$indice<5;$indice++){
                    $persona = new stdClass();
                    $persona->nombre = "nombre $indice";
                    $persona->telefono = "telefono $indice";
                    $persona->direccion = "direccion $indice";
                    array_push($personas,$persona);
                }
                $_SESSION['personas'] = $personas;
            }
        }
        
        public function insertar($persona){
            $personas = $_SESSION['personas'];
            $personas[] = $persona;
            $_SESSION['personas'] = $personas;
        }
    
        public function listar(){
            return $_SESSION['personas'];
        }
    

}

?>