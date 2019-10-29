<?php
class Empleado{
    public $nombre;
    public $dni;
    public $salarioBase;
    
    /*
    public function __toString(){
        return implode(' - ', [$this->nombre,$this->dni,$this->salarioBase]);
    }*/
  }

  //todas estas clases extienden de empleado para coger sus atributos
  //cada de estas clases tienen atributos especificos
class Programador extends Empleado{
    public $horasExtra;
    const precioHora = 30;

    public function calcularSalario(){
        return $this->salarioBase + ($this->horasExtra * self::precioHora);
    }
}

class Jefe extends Empleado{
    public $incentivos;

    public function calcularSalario(){
        return $this->salarioBase + $this->incentivos;
    }
}

class Director extends Empleado{
    public $empleados;
    const incentivoPorEmpleado = 100;

    public function calcularSalario(){
        return $this->salarioBase + ($this->empleados * self::incentivoPorEmpleado);
    }
}

$programador = new Programador();
$programador->nombre = "Pepe";
$programador->dni = "98338383k";
$programador->salarioBase = 1000;
$programador->horasExtra = 10;

$director = new Director();
$director->nombre = "Manuel";
$director->dni = "993338383j";
$director->salarioBase = 1500;
$director->empleados = 5;

$jefe = new Jefe();
$jefe->nombre = "Maria";
$jefe->dni = "7737737737p";
$jefe->salarioBase = 1300;
$jefe->incentivos = 250;

//calculamos el salario de cada uno de ellos
echo "$programador->nombre :" . $programador->calcularSalario() . "<br/>";
echo "$jefe->nombre :" . $jefe->calcularSalario() . "<br/>";
echo "$director->nombre :" . $director->calcularSalario() . "<br/>";
?>