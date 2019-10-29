
<?php
class Vivienda{
  public $habitaciones;
  public $propietario;
  public $inquilinos;
  public $tipoVivienda;
  public $precio;
  public $direccion;

  public function __toString(){
      return implode(' - ', $this->habitaciones);
  }
}

class Habitacion{
  public $m2;
  public $tipoHabitacion;

  public function __toString(){
      return "m2 $this->m2 tipo $this->tipoHabitacion" . "<br/>";
  }
}

class Persona{
  public $nombre;
  public $dni;
  public $cuenta;

}

class Direccion{
  public $tipoVia;
  public $nombreVia;
  public $cp;
}

$salon = new Habitacion();
$salon->m2 = 30;
$salon->tipoHabitacion = "Salon";

$cocina = new Habitacion();
$cocina->m2 = 10;
$cocina->tipoHabitacion = "Cocina";

$arrayHabitaciones = [$salon,$cocina];

$propietario = new Persona();
$propietario->nombre = "Juan";
$propietario->dn1 = "3424324d";
$propietario->cuenta = "343434444444444";

$tipoVivienda = "Apartamento";

$inquilino1 = new Persona();
$inquilino1->nombre = "Marta";
$inquilino1->dn1 = "5555555555555h";
$inquilino1->cuenta = "111111111111";

$arrayInquilinos = [$inquilino1];

$precio = 500;

$direccion = new Direccion();
$direccion->tipoVia = "calle";
$direccion->nombreVia = "Ensanche de vallecas";
$direccion->cp = "28456";

$vivienda = new Vivienda();
$vivienda->habitaciones = $arrayHabitaciones;
$vivienda->propietario = $propietario;
$vivienda->inquilinos = $arrayInquilinos;
$vivienda->tipoVivienda = $tipoVivienda;
$vivienda->precio = $precio;
$vivienda->direccion = $direccion;

//Acceder a la cocina
echo $vivienda->habitaciones[1]->m2 . "<br/>";

echo $vivienda;


?>
