<?php

//Podriamos declararla abstract poniendo delate la palabra "abstract"
//y no podriamos instanciarla
class Pez{
	//recordar que con protected tenemos visibilidad en esta clase y en las clases que hereden
	protected  $nombre;
	protected  $color;
	private  $velocidad;
	private $variablePrivada = "variablePrivada";

	//Ponemos por defecto unos valores
	//al constructor
	public function __construct($nombre = "Ramon",$color = "Verde",$velocidad = 5){
		$this->nombre= $nombre;
		$this->color= $color;
		$this->velocidad = $velocidad;
	}

	public function presentarse(){
		echo "soy el pez $this->nombre y soy de color $this->color";
	}

	public function moverse(){
		echo "Me estoy moviendo a $this->velocidad";
	}

	//doy metodos accesores para que los programadores puedan acceder a los valores
	//de pez, no doy metodos modificadores porque no lo quiero permitir
	public function getNombre(){
		return $this->nombre;
	}

	public function getColor(){
		return $this->color;
	}

	public function getVelocidad(){
		return $this->velocidad;
	}
}

//Esta clase obtendra todos los metodos y los atributos de la clase Pez
//que tiene por defecto
class Trucha extends Pez{

	//me creo un contructor propio e invoco con la palabra parent:: el contructor de la clase
	//Pez
	public function __construct($nombre = "Maria",$color = "Plateada",$velocidad = 10){
		parent::__construct($nombre,$color,$velocidad);
	}
}

//otra clase que extienda de Pez
class Tiburon extends Pez{
	
	public function __construct($nombre = "Paco",$color = "Azul",$velocidad = 50){
		parent::__construct($nombre,$color,$velocidad);
	}

	//podemos sobrecargar los metodos que queramos, si no lo hicieramos, obtendriamos
	//los metodos con el mismo comportamiento que la clase padre (Pez)
	public function moverse(){
		echo "Soy $this->nombre y me estoy moviendo a " . $this->getVelocidad();
	}

	public function presentarse(){
		echo "soy el tiburon " . $this->nombre . " y soy de color " . $this->color;
		//esto no podriamos ya que la variable es privada, lo pongo para que se aprecie
		echo @(" " . $this->getVelocidad());
	}

	//las clases que hereden tambien pueden tener metodos propios
	//metodo especifico de la clase Tiburon
	public function comerPersona($nombre){
		echo "Soy el tiburon peligroso $this->nombre y me voy a comer a la persona $nombre";
	}

	public function comerPez(Pez $pez){
		echo "Soy el tiburon $this->nombre y me voy a comer a la persona $pez->getNombre";
	}
}

//algunos ejemplos
$pez1 = new Pez();
$pez1->presentarse();

echo "<br/>";

$pez2 = new Pez("Manuel","Negro",20);
$pez2->presentarse();

echo "<br/>";//ponemos un salto de linea

$trucha1 = new Trucha();
$trucha1->presentarse();//en este caso se presentará como la clase padre

echo "<br/>";

echo "La velocidad de la trucha es " . $trucha1->getVelocidad();

echo "<br/>";

echo $trucha1->moverse();

//Debemos usar un accesor
echo "nombre de pez: " . $pez1->getNombre();
//Este codigo daria error ya que estoy intentando acceder a una propiedad protected
//desde fuera de su visibilidad
//echo "nombre de pez:" . $pez1->nombre;

echo "<br/>";
$tiburon1 = new Tiburon();
echo $tiburon1->presentarse();
echo "<br/>";
echo $tiburon1->moverse();
echo "<br/>";
echo $tiburon1->comerPersona("Felix");
echo "<br/>";

//ojo si cambiamos la referencia de objeto daria un error
//php es un lenguaje no tipado por lo que cualquier referencia
//puede apuntar a cualquier objeto. Pero si el objeto no tiene el
//metodo en cuestión, daría un error
$tiburon1 = $trucha1;
//el objeto trucha no tiene el metodo comerPersona, ya que es 
//exclusivo del la clase tiburon
echo $tiburon1->comerPersona("Felix");//error
echo "<br/>";
?>
