<?php

require_once __DIR__ . '/vendor/autoload.php';

use React\EventLoop\Factory;

//composer require react/event-loop:^1.1.1 Instalação da biblioteca que é necessário
$loop = Factory::create();

//$loop->addPeriodicTimer(1, function () {   //Loop que não para (a cada intervalo)
$loop->addTimer(1, function () {            //Loop que quando não tem mais evento, ele para
    echo '1 segundo' . PHP_EOL;
});

$loop->run();
