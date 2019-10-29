<?php
require __DIR__ . '/vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
//Vamos a ver mas tipos de operaciones que podemos hacer con las peticiones

//Hay que tener en cuenta que el la Clase Client es inmutable, lo que
//quiere decir que no se puede cambiar el estado de un objeto una vez
//creado
$client = new Client([
    'base_uri' => 'https://jsonplaceholder.typicode.com',
    'timeout'  => 5.0,
]);

//Hacer la llamada al metodo get, pero esta vez le add a la uri base
$res = $client->request('GET','/todos/1');
if ($res->getStatusCode() == '200') //Verifico que me retorne 200 = OK
{
  echo $res->getBody();
}
echo "<br>";

//Tambien podemos usar los verbos directamente
//tenemos metodos para todos los verbos http (put,delete, post, etc)
$res = $client->get('/todos/1');
if ($res->getStatusCode() == '200') //Verifico que me retorne 200 = OK
{
  echo $res->getBody();
}
echo "<br>";

//Tambien podemos crear la petición y mandarla más adelante
$request = new Request('GET', 'https://jsonplaceholder.typicode.com/todos/1');
$res = $client->send($request, ['timeout' => 2]);
if ($res->getStatusCode() == '200') //Verifico que me retorne 200 = OK
{
  echo $res->getBody();
}
echo "<hr>";

//Peticiones asincronas
//Haciendo peticiones de esta manera nos devolvera un objeto Promise
//que sera el objeto que maneje nuestras funciones callback
echo "Asincronas <br>";
echo "No veremos nada porque se pinta antes la página de que llegue la respesta";
$promise = $client->getAsync('/todos/1');
$promise->then(
    function (ResponseInterface $res) {
        echo "Respuesta del servidor <br>";
        echo $res->getStatusCode() . "<br>";
        if ($res->getStatusCode() == '200'){
            echo $res->getBody();
        }
        echo "<br>";
    },
    function (RequestException $e) {
        echo "Errores del servidor <br>";
        echo $e->getMessage() . "\n";
        echo $e->getRequest()->getMethod();
    }
);
echo "<hr>";

?>