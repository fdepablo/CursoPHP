
<?php

//En php las clases que no heredan de alguna no tienen padre
//Se declara con la palabra class
class Persona{
    //se declaran los atributos con sus visibilidades
    public $nombre;
    private $edad;
    private $apellidos;

    //los atributos estaticos son compartidos por todas las personas
    //en este caso sirve para tener en una variable localizada el numerero de  personas
    //qque llevamos creadas
    //porque private? si lo pongo public, cualquier me puede cambiar el valor, lo hago
    //private para que solamente pueda ser alterada por la clase, concretamente en los
    //constructores y los destructores
    private static $numPersonas = 0;

    //podemos declarar constante, la edad maxima de una persona por ejemplo
    public const edadMaxima = 100;

    //por defecto si no lo creamos, php creara uno por defecto para nosotros
    //este metodo se invoca cada vez que se hace un "new"
    function __construct(){
        echo "Creando persona" . "<br/>";
        self::$numPersonas++;//a los atributos estaticos se acceden con self
        $this->edad = 18;//quiero establecer cada vez que se instancia un objetto ponerle a 18
    }

    //podemos crear destructores, pero normalmente estan en desuso
    function __destruct(){
        echo "Destruyendo persona $this->nombre" . "<br/>";//al nombre accedo con $this
        self::$numPersonas--;//resto una persona al contador global
    }

    //Le proporciona a los programadores un metodo para que sepan el numero de personas
    //que llevan creadas. Este tipo de metodo se suele llamar get o metodo accesor
    //el otro tipo de metodo para modificar un atributo se suele llamar metodo set o 
    //metodo modificador, pero en este caso no voy a crear el metodo set ya que no quiero
    //permitir que la gente establezca el numero de personas
    public static function getNumPersonas(){
        return self::$numPersonas;
    }

    //En este caso si que permito a la edad tanto que sea modificada como que sea accedida
    //por tanto creo el metodo set y el metodo get de la edad. Esto es un convenio
    //es muy habitual crear atributos privados y get y set publicos
    //una ventaje
    public function setEdad($edad){
        if($edad > self::edadMaxima){
            $this->edad = self::edadMaxima;
        }else{
            $this->edad = $edad;
        }
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

    //null es un espacio de memoria especial que no guarda nada
    public function andar($metros){
        if($metros == null){
            echo "Soy la persona $this->nombre y voy a andar 5 pasos" . "</br>";
        }else{
            echo "Soy la persona $this->nombre y voy a andar $metros pasos" . "</br>";
        }
    }

    //este metodo se llamara cuando imprimamos directamente un objeto
    public function __toString(){
        return "Nombre: $this->nombre , apellidos $this->apellidos , edad $this->edad ";
    }

    //Desde las ultimas versiones de PHP podemos tipar
    //los metodos de las clases
    public function igual(Persona $aux){
        //echo "entrando <br/>";
        if($this == $aux)
          return true;
        else
          return false;
    }

    //Con esta función podemos interceptar llamadas a metodos que no existen
    /*
    public function __call($name, $arguments){
        // Nota: el valor $name es sensible a mayúsculas.
        //con implode unimos elementos de un arrya en un string
        echo "Llamando al método de objeto '$name' "
             . implode(' - ', $arguments). "<br/>";//unimos un array en formato string separado por '-'
    }*/
}

$persona1 = new Persona();//se ejecuta el constructor

echo "Asignado valores" . "<br/>";
$persona1->setEdad(23);
$persona1->nombre = "Pepe";//puedo acceder directamente porque es public
$persona1->setApellidos("Gomez");
//$persona1->apellidos = "Gomez";//error, el atributo es privado

echo $persona1->nombre . "<BR/>";
echo $persona1->getApellidos() . "<br/>";
echo $persona1->getEdad() . "<br/>";

echo $persona1 . "<br/>";//llama al metodo __toString por defecto

echo "Numero de personas hasta ahora: " . Persona::getNumPersonas() . "<br/>";

//hacemos que ande
echo 'hacemos que ande' . '<br/>';
$persona1->andar(null);
$persona1->andar(10);
//$persona1->andar();//Esto daria error, hay que pasarle algo aunque sea null

$persona2 = new Persona();//creamos otra persona
echo Persona::getNumPersonas() . "<br/>";//ahora son 2

$persona2->nombre = "Maria";
$persona2->setEdad(45);

$persona1 = $persona2;

//persona1 apunta al mismo objeto que persona2 por lo que el objeto al que apuntaba persona1 desaparece
//y llama a su destructor
echo Persona::getNumPersonas() . "<br/>";

$persona1->setEdad(55);

echo $persona1->getEdad() . "-" . $persona2->getEdad() . "<br/>";
//10 - 45
//55 - 45
//55 - 55

//diferencias entre == e ===
//me creo dos personas con los atributos exactamente iguales
$persona3 = new Persona();
$persona3->setEdad(12);
$persona3->nombre = "Sandra";
$persona3->setApellidos("Gonzalez");

$persona4 = new Persona();
$persona4->setEdad(12);
$persona4->nombre = "Sandra";
$persona4->setApellidos("Gonzalez");

if($persona3 == $persona4){//valora los atributos
  echo 'la persona tiene los mismos atributos' . "<br/>";
}else{
  echo 'la persona NO tiene los mismo atributos' . "<br/>";
}
//$persona3 = $persona4;
if($persona3 === $persona4){//valora que las referencias apunten exactamente al mismo objeto
  echo 'Las variables apuntan al MISMO objeto' . "<br/>";
}else{
  echo 'Las variables NO apuntan al MISMO objeto' . "<br/>";
}

echo 'Tienen los mismo atributos?: ';
echo $persona3->igual($persona4);

echo "<br/>";
//al metodo igual hay que pasarle una persona
class Clase{

}

$clase = new Clase();
//Esto daria un error ya que tenemos que pasarle una persona
//echo $persona3->igual($clase);

//Metodo inventado, entra por el __call
//$persona1->correr(20,30);

// A lo estatico accedemos con la clase
echo "Cuanto pudede vivir una persona?" . Persona::edadMaxima . "<br/>";
?>
