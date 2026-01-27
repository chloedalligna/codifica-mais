<?php

return [
    'GET' => [
        '/' => \Chloe\PhpEstoque\Controller\ListController::class,
        '/cadastro' => \Chloe\PhpEstoque\Controller\FormController::class,
        '/edicao' => \Chloe\PhpEstoque\Controller\FormController::class,
    ],
    'POST' => [
        '/cadastro' => \Chloe\PhpEstoque\Controller\ListController::class,
        '/edicao' => \Chloe\PhpEstoque\Controller\ListController::class,
        '/exclusao' => \Chloe\PhpEstoque\Controller\DeleteController::class,
    ],
];