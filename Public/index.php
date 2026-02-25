<?php

require_once __DIR__.'/../vendor/autoload.php';

use app\Controllers\SiteController;
use app\Core\Application;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();    

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'] ?? '',
        'user' => $_ENV['DB_USER'] ?? '',
        'password' => $_ENV['DB_PASSWORD'] ?? '',
    ]
];

$app = new Application(dirname(__DIR__),$config);

$app->router->get('/', [SiteController::class,'home']);

$app->router->get('/contact', [SiteController::class,'contact']);
$app->router->post('/contacts',[SiteController::class,'handleContact']);

$app->router->post('/login', [\app\Controllers\AuthController::class,'login']);
$app->router->get('/login', [\app\Controllers\AuthController::class,'login']);
$app->router->post('/register', [\app\Controllers\AuthController::class,'register']);
$app->router->get('/register', [\app\Controllers\AuthController::class,'register']);


$app->run();