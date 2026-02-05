<?php

return [
    'GET' => [
        '/' => \Chloe\PhpEstoque\Controller\Product\ListProductController::class,
        '/create' => \Chloe\PhpEstoque\Controller\Product\CreateFormProductController::class,
        '/update' => \Chloe\PhpEstoque\Controller\Product\UpdateFormProductController::class,
        '/products/delete' => \Chloe\PhpEstoque\Controller\Product\DeleteProductController::class,
        '/login' => \Chloe\PhpEstoque\Controller\UserLogin\LoginFormController::class,
        '/signup' => \Chloe\PhpEstoque\Controller\UserLogin\SignupFormController::class,
        '/logout' => \Chloe\PhpEstoque\Controller\UserLogin\LogoutController::class,
    ],
    'POST' => [
        '/create' => \Chloe\PhpEstoque\Controller\Product\CreateProductController::class,
        '/update' => \Chloe\PhpEstoque\Controller\Product\UpdateProductController::class,
        '/login' => \Chloe\PhpEstoque\Controller\UserLogin\LoginController::class,
        '/signup' => \Chloe\PhpEstoque\Controller\UserLogin\SignupController::class,
    ],
];

// ESCRITA ALTERNATIVA PARA ACESSAR AS ROTAS

//return [
//    'GET|/' => \Chloe\PhpEstoque\Controller\ListProductController::class,
//    'GET|/cadastro' => \Chloe\PhpEstoque\Controller\UpdateFormProductController::class,
//    'GET|/edicao' => \Chloe\PhpEstoque\Controller\UpdateFormProductController::class,
//    'POST|/cadastro' => \Chloe\PhpEstoque\Controller\ListProductController::class,
//    'POST|/edicao' => \Chloe\PhpEstoque\Controller\ListProductController::class,
//    'POST|/exclusao' => \Chloe\PhpEstoque\Controller\DeleteProductController::class,
//];