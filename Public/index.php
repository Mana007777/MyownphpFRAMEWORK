<?php

require_once __DIR__.'/../vendor/autoload.php';

use app\Controllers\SiteController;
use app\Core\Application;


$app = new Application(dirname(__DIR__));

$app->router->get('/', [SiteController::class,'home']);

$app->router->get('/contact', [SiteController::class,'contact']);
$app->router->post('/contacts',[SiteController::class,'handleContact']);

$app->router->post('/login', [\app\Controllers\AuthController::class,'login']);
$app->router->get('/login', [\app\Controllers\AuthController::class,'login']);
$app->router->post('/register', [\app\Controllers\AuthController::class,'register']);
$app->router->get('/register', [\app\Controllers\AuthController::class,'register']);


$app->run();