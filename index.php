<?php

require_once __DIR__.'/vendor/autoload.php';

$app = new \app\core\Application();

$app->router->get('/', function() {
    echo 'Hello, World!';
});

$app->run();