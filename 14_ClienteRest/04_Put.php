<?php
require __DIR__ . '/vendor/autoload.php';
use GuzzleHttp\Client;

$client = new Client([
  'base_uri' => 'https://jsonplaceholder.typicode.com/posts/3',
  'timeout' => 5.0,
]);
 
// =============================================
//Actualizar un articulo usando PUT
$actualizar = ['title'=>'Articulo actualizado',
             'body'=>'draft',
             'user_id'=>'1'
            ];
$res = $client->request('PUT',null,[
    'form_params' => $actualizar
]);

if ($res->getStatusCode() == '200') //Verifico que me retorne 200 = OK
{
  echo $res->getBody();
}
?>