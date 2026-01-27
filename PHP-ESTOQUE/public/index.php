<?php

use Chloe\PhpEstoque\ConnectionPdo;
use Chloe\PhpEstoque\Controller\Controller;
use Chloe\PhpEstoque\Controller\Error404Controller;
use Chloe\PhpEstoque\Repository\ProductRepository;

require_once __DIR__ . '/../vendor/autoload.php';

$pdo = ConnectionPdo::connect();
$repository = new ProductRepository($pdo);

$routes = require_once __DIR__ . "/../config/routes.php";

$path_info = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

$key = $routes[$httpMethod][$path_info];

if (array_key_exists($key, $routes)) {
    $controllerClass = $routes[$httpMethod][$path_info];
    $controller = new $controllerClass($repository);

} else {
    $controllerClass = new Error404Controller();
}

/** @var Controller $controller */
$controller->processaRequisicao();