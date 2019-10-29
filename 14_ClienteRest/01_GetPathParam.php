<?php
require __DIR__ . '/vendor/autoload.php';
//usamos la clase que esta en el namespace GuzzleHttp\Client
//https://diego.com.es/namespaces-en-php
//Muy util para evitar problemas de duplicidades de clase
use GuzzleHttp\Client;

//Crear el cliente para llamadas al servicio
//Debes cambiar el valor de base_uri a la dirección en donde esta tu servicio
//El valor de timeout, en este caso es para decir que despues de 5 segundos
//si el servicio no responde, se cancela el proceso.
$client = new Client([
    'base_uri' => 'https://jsonplaceholder.typicode.com/todos/1',//1 userId
    'timeout'  => 5.0,
]);

//Hacer la llamada al metodo get, sin ningún parametro
$res = $client->request('GET');
if ($res->getStatusCode() == '200') //Verifico que me retorne 200 = OK
{
  //podemos acceder a mucha información referente a la respuesta HTTP
  echo $res->getReasonPhrase() . "<br>";
  echo $res->getStatusCode() . "<br>";
  echo $res->getHeader('Content-Length')[0] . "<br>";//solo tiene un elemento el array
  echo $res->getBody();
}

?>