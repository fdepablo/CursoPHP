<?php
//realpath nos devuelve la ruta fisica real de donde esta algun fichero
//o directorio, en este caso preguntamos por la raiz de nuestros proyectos
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

require_once "$root/CursoPHP/12_mvc/modelo/DAO/AlumnoDAO.php";

//esta capa se encarga de validar las reglas de negocio, generalmente hace
//de intermediario entre el controlador y la capa de acceso a datos (DAOs)
//Toda capa que se encargue de acceder a la bbdd deberia de pasar por esta
//capa primero
class GestorAlumno
{
        public function insertarAlumno(Alumno $alumno)
        {               
                //compruebo mi regla de negocio de que no se pueden
                //insertar campos vacios en la bbdd
                if( strlen($alumno->nombre) == 0){
                        return "error";
                }else{//en caso de que haya ido bien, persistimos
                       $alumnoDao = new AlumnoDAO();
                       $alumnoDao->insertarAlumno($alumno);
                }
                
        }

        public function modificarAlumno(Alumno $alumno)
        {
                //esta regla tambien habria que ponerla en el modificar
                if( strlen($alumno->nombre) == 0){
                        return "error";
                }else{
                        $alumnoDao = new AlumnoDAO();
                        $alumnoDao->modificarAlumno($alumno);
                }
                
        }

        public function borrarAlumno(Alumno $alumno)
        {
                //si tubiermos otras reglas, podriamos ponerlas aqui
                $alumnoDao = new AlumnoDAO();
                $alumnoDao->borrarAlumno($alumno);
        }

        //a veces la capa de gestion se comunica sin mas con la capa
        //de persistencia, pero hay que entender que la capa DAO no tiene
        //ni debe conocer las reglas de negocio
        //la idea general seria que las capas podrian ser perfectamente
        //intercambiables sin que haya que tocar las otras capas, principalmente 
        //las capas exteriores como puede ser la vista y el DAO
        public function obtenerAlumno($idAlumno){
                $alumnoDao = new AlumnoDAO();
		return $alumnoDao->obtenerAlumno($idAlumno);
	}

	public function listarAlumnos(){
		$alumnoDao = new AlumnoDAO();
		return $alumnoDao->listarAlumnos();
	}
}

?>