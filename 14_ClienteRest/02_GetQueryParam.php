<?php
require __DIR__ . '/vendor/autoload.php';
use GuzzleHttp\Client;
 
//Crear el cliente para llamadas al servicio
//Debes cambiar el valor de base_uri a la dirección en donde esta tu servicio
//El valor de timeout, en este caso es para decir que despues de 5 segundos
//si el servicio no responde, se cancela el proceso.
$client = new Client([
    'base_uri' => 'https://jsonplaceholder.typicode.com/posts',
    'timeout'  => 5.0,
]);
 
//Hago llamado a REST para recuperar un solo articulo
//Ahora le pasamos un parametro en la query al llamado del servicio
$res = $client->request('GET',null,[
    'query' => ['userId' => '1']  
]);
if ($res->getStatusCode() == '200') //Verifico que me retorne 200 = OK
{
  //Convertir el resultado que viene en formato JSON a un array
  //$json2Array = json_decode($res->getBody(), true);
 
  //Ahora que esta la informacion en Array, podemos acceder a ella de forma sencilla
  echo $res->getBody();
}
?>