<?php
require __DIR__ . '/vendor/autoload.php';
use GuzzleHttp\Client;

$client = new Client([
  'base_uri' => 'https://jsonplaceholder.typicode.com/posts/1',
  'timeout' => 5.0,
]);
 
// =============================================
//Hago llamado a REST para borrar un  articulo
$res = $client->request('DELETE');

if ($res->getStatusCode() == '200') //Verifico que me retorne 200 = OK
{
echo $res->getBody() . "<br>";
echo "post id 1 borrado";
}
?>