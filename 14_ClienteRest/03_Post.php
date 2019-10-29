<?php
require __DIR__ . '/vendor/autoload.php';
use GuzzleHttp\Client;

$client = new Client([
  'base_uri' => 'https://jsonplaceholder.typicode.com/posts',
  'timeout' => 5.0,
]);
 
 
// =============================================
//Hago la llamada al servicio rest, para insertar un articulo
$post = [
  'title' => 'Insertar usando Rest',
  'body' => 'draft',
  'user_id' => '1'
];

$res = $client->request('POST', null, ['form_params' => $post]);
if ($res->getStatusCode() == '201') //Verifico que me retorne 201 = Created
{
  echo "Se inserto un post (articulo)" ."<br>";
  echo $res->getBody();
}else{
  echo $res->getStatusCode();
}
echo '<hr>';

//Hago la llamada al servicio rest, para insertar un articulo
$post = new stdClass();
$post->title = 'Insertar usando Rest';
$post->body = 'draft';
$post->user_id = '1';

$res = $client->request('POST', '', ['form_params' => $post]);
if ($res->getStatusCode() == '201') //Verifico que me retorne 201 = Created
{
  echo "Se inserto un post (articulo)" ."<br>";
  echo $res->getBody();
}
echo '<hr>';

?>