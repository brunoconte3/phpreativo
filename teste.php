<?php

use GuzzleHttp\Client;
use GuzzleHttp\Promise\Utils;

require_once __DIR__ . '/vendor/autoload.php';

$client = new Client();

/**************** Modo processamento normal *********************/
// $resposta1 = $client->get('http://localhost/BackEnd/PHP/Cursos/Alura/phpReativo/http-server.php');
// $resposta2 = $client->get('http://localhost/BackEnd/PHP/Cursos/Alura/phpReativo/http-server.php');

// echo 'Resposta 1: ' . $resposta1->getBody()->getContents() . '<br>';
// echo 'Resposta 2: ' . $resposta2->getBody()->getContents() . '<br>';
/****************************************************************/
$start = microtime(true);
$promessa1 = $client->getAsync('http://localhost/BackEnd/PHP/Cursos/Alura/phpReativo/http-server.php');
$promessa2 = $client->getAsync('http://httpbin.org/?foo=bar');

/** @var ResponseInterface[] $respostas */
$respostas = Utils::unwrap([
    $promessa1, $promessa2
]);
$end = microtime(true);

echo 'Resposta 1: ' . $respostas[0]->getBody()->getContents() . '<br>';
echo 'Resposta 2: ' . $respostas[1]->getBody()->getContents() . '<br>';

echo '<hr>';
echo $start . '<br>';
echo $end . '<br>';
$diferenca = $end - $start;
echo intval($diferenca);
