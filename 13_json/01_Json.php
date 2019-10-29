<?php
//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//require_once "$root/CursoPHP/12_json/Cliente.php";

//__DIR__ nos da la ruta actual de donde se encuentra nuestra carpeta
require_once __DIR__ . 'Cliente.php';

//stdClass() es como la clase Object en java aunque no hay herencia
$myObj = new stdClass();
$myObj->name = "John";
$myObj->age = 30;
$myObj->city = "New York";

$cadena = json_encode($myObj);

echo $cadena;


$cadena = '{"name":"John","age":30,"city":"New York"}';
$miObjeto = json_decode($cadena);
echo '<BR/>';
echo "Nombre: $miObjeto->name Edad: $miObjeto->age Ciudad: $miObjeto->city";
echo '<BR/>';

///////
$cliente = new Cliente();
$cliente->setApellidos("de Pablo Lobo");
$cliente->setEdad(39);

//Para que convierta a json los atributos de la clase deben de ser publicos
$clienteJson = json_encode($cliente);

echo $clienteJson;
echo '<BR/>';

$clienteJson = '{"edad":39,"apellidos":"de Pablo Lobo"}';
//este codigo lo convierte a un ojbeto de la clase stdClass
$cliente = json_decode($clienteJson);
echo ($cliente instanceof Cliente)?'Cliente: Y':'Cliente: N';//N
echo '<BR/>';
echo ($cliente instanceof stdClass)?'stdClass: Y':'stdClass: N';//Y
echo '<BR/>';

// Arrays indexados
$colors = array("Red", "Green", "Blue", "Orange", "Yellow");
echo json_encode($colors);
echo '<BR/>';

//pasar un json a un array indexado
$json = '["Red","Green","Blue","Orange","Yellow"]';
$array = json_decode($json);
foreach ($array as $clave){
	echo "$clave <br/>";
}
echo '<BR/>';

//podemos forzar a que un array indexado se convierta en un objeto json
$colors = array("Red", "Green", "Blue", "Orange");
echo json_encode($colors, JSON_FORCE_OBJECT);
echo '<BR/>';

// Arrays asociativos
$marks = array("Snape"=>50, "Harry"=>18, "Ron"=>19, "Hermione"=>19);
echo json_encode($marks);
echo '<BR/>';

//Pasar un json a un array asociativo
$json = '{"Snape":50,"Harry":18,"Ron":19,"Hermione":19}';
$array = json_decode($json);
foreach ($array as $clave => $valor){
	echo "$clave : $valor<br/>";
}
//json_decode por defecto devuelve un objeto json
$json = '{"Snape":50,"Harry":18,"Ron":19,"Hermione":19}';
//pero si ponemos la opción true lo convertimos en un array asociativo
var_dump(json_decode($json, true));
echo '<BR/>';
//Ejemplo para ver la diferencia en su tratamiento
$json = '{"Snape":50,"Harry":18,"Ron":19,"Hermione":19}';
 
// Decodificamos el json en un array asociativo
$arr = json_decode($json, true);
// Accedemos a los valores del array asociativo
echo $arr["Snape"];  // Output: 50
echo $arr["Harry"];  // Output: 18
echo $arr["Ron"];   // Output: 19
echo $arr["Hermione"];  // Output: 19
echo '<BR/>';

// Decodificamos el json en un objeto php
$obj = json_decode($json);
// Access values from the returned object
echo $obj->Snape;   // Output: 50
echo $obj->Harry;   // Output: 18
echo $obj->Ron;    // Output: 19
echo $obj->Hermione;   // Output: 19
echo '<BR/>';

//Tambien los podemos recorrer con foreach
$arr = json_decode($json, true);
 
// Recorremos el array asociativo
foreach($arr as $key=>$value){
    echo $key . "=>" . $value . "<br>";
}
echo "<hr>";
// Decodificamos el json en un objeto php
$obj = json_decode($json);
 
// foreach al objeto, con esto imprimimos todos los atributos del objeto
foreach($obj as $key=>$value){
    echo $key . "=>" . $value . "<br>";
}

echo "<hr>";

//Un json puede tener objetos y valores anidados
$json = '{
    "book": {
        "name": "Harry Potter y el caliz de fuego",
        "author": "J. K. Rowling",
        "year": 2000,
        "characters": ["Harry Potter", "Hermione Granger", "Ron Weasley"],
        "genre": "Fantasia",
        "price": {
            "paperback": "$10.40", "hardcover": "$20.32", "kindle": "4.11"
        }
    }
}';

// Decodificamos el json en un array asociativo
$libro = json_decode($json, true);

// Imprimir valores
echo $libro["book"]["name"]. "<br>";  // 
echo $libro["book"]["author"] . "<br>";  // J. K. Rowling
echo $libro["book"]["characters"][0] . "<br>";  // Harry Potter
echo $libro["book"]["price"]["hardcover"] . "<br>";  // $20.32

var_dump($libro);
echo '<BR/>';
// Podriamos hacer una función recursiva para imprimir todos los valores
function printValues($arr) {
    //como va a ser llamada recursivamente declaramos los valores como globales
    //count representa el numero de elementos encontrados
    //values representa un array con todos los valores econtrados en el json
    global $count;
    global $values;
    
    // Podemos hacer una comprobación inicial para solamente aceptar arrays
    if(!is_array($arr)){
        die("ERROR: La entrada no es un array");
    }

    /*
    Recorremos el array y si se encuentra otro array llamamos recursivamente a la función para recorrer
    dicho array, en caso contrario add el elemento a los valores 
    Las claves no importan, importan los valores
    */
    foreach($arr as $key=>$value){
        if(is_array($value)){
            printValues($value);
        } else{
            $values[] = $value;
            $count++;
        }
    }
    
    // Return el numero y los valores en un array
    return array('total' => $count, 'values' => $values);
}

$result = printValues($libro);
echo "<h3>" . $result["total"] . " valor(es) encontrados: </h3>";
//con implode unimos un array en un string
echo implode("<br>", $result["values"]);
?>