<?php

use React\EventLoop\Factory;
use React\Stream\ReadableResourceStream;

require_once __DIR__ . '/vendor/autoload.php';

$loop = Factory::create();

$stream = new ReadableResourceStream(fopen('io-naoBloqueante/arquivo1.txt', 'r'), $loop);

$stream->on('data', function (string $data) {
    echo $data;
});

$loop->run();
