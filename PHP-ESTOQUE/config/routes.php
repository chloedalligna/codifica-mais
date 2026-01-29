<?php

return [
    'GET' => [
        '/' => \Chloe\PhpEstoque\Controller\ProductListController::class,
        '/cadastro' => \Chloe\PhpEstoque\Controller\AddProductFormController::class,
        '/edicao' => \Chloe\PhpEstoque\Controller\UpdateProductFormController::class,
        '/exclusao' => \Chloe\PhpEstoque\Controller\ProductDeleteController::class,
        '/login' => \Chloe\PhpEstoque\Controller\LoginFormController::class,
        '/signup' => \Chloe\PhpEstoque\Controller\SignupFormController::class,
    ],
    'POST' => [
        '/cadastro' => \Chloe\PhpEstoque\Controller\ProductAddController::class,
        '/edicao' => \Chloe\PhpEstoque\Controller\ProductUpdateController::class,
        '/login' => \Chloe\PhpEstoque\Controller\LoginController::class,
        '/signup' => \Chloe\PhpEstoque\Controller\SignupController::class,
    ],
];

//return [
//    'GET|/' => \Chloe\PhpEstoque\Controller\ProductListController::class,
//    'GET|/cadastro' => \Chloe\PhpEstoque\Controller\UpdateProductFormController::class,
//    'GET|/edicao' => \Chloe\PhpEstoque\Controller\UpdateProductFormController::class,
//    'POST|/cadastro' => \Chloe\PhpEstoque\Controller\ProductListController::class,
//    'POST|/edicao' => \Chloe\PhpEstoque\Controller\ProductListController::class,
//    'POST|/exclusao' => \Chloe\PhpEstoque\Controller\ProductDeleteController::class,
//];