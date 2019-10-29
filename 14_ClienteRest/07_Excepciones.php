<?php
require __DIR__ . '/vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

$client = new Client([
    'base_uri' => 'https://jsonplaceholder.typicode.com/todossss/1',
    'timeout'  => 5.0,
]);

try {
    $client->request('GET');
} catch (RequestException $e) {
    //este tipo de excepciones son lanzadas cuando hay algun error en la petición
    echo "Error: <br>";
    echo Psr7\str($e->getRequest());
    if ($e->hasResponse()) {
        echo Psr7\str($e->getResponse());
    }
}

//podemos usar otro tipo de excepciones mas concretas
//GuzzleHttp\Exception\ConnectException
//para excepciones de conexión
//GuzzleHttp\Exception\ClientException
//para excepciones 400
//GuzzleHttp\Exception\ServerException
//para excepciones 500

?>