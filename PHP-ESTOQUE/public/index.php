<?php

use Chloe\PhpEstoque\ConnectionPdo;
use Chloe\PhpEstoque\Controller\Controller;
use Chloe\PhpEstoque\Controller\Error404Controller;
use Chloe\PhpEstoque\Repository\ProductRepository;

require_once __DIR__ . '/../vendor/autoload.php';

$pdo = ConnectionPdo::connect();
$repository = new ProductRepository($pdo);

$routes = require_once __DIR__ . "/../config/routes.php";

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

session_start();
$routeLogin = ($pathInfo === '/login');
if (!array_key_exists('logado', $_SESSION) && !$routeLogin) {
    header('Location: /login');
}

$mainKey = "$httpMethod";
$secondaryKey = "$pathInfo";

if (array_key_exists($mainKey, $routes) && array_key_exists($secondaryKey, $routes[$mainKey])) {
    $controllerClass = $routes[$mainKey][$secondaryKey];
    $controller = new $controllerClass($repository);
} else {
    $controller = new Error404Controller();
}

/** @var Controller $controller */
$controller->processRequest();

//$key = "$httpMethod|$path_info";

//if (array_key_exists($key, $routes)) {
//    $controllerClass = $routes["$httpMethod|$path_info"];
//    $controllerClass = $routes[$key];
//    $controller = new $controllerClass($repository);
//} else {
//    $controller = new Error404Controller();
//}
