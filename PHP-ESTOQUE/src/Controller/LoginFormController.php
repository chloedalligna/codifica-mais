<?php

namespace Chloe\PhpEstoque\Controller;

use Chloe\PhpEstoque\Controller\Controller;
use Chloe\PhpEstoque\Repository\ProductRepository;

class LoginFormController implements Controller
{

    private ProductRepository $repository;
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function processRequest(): void
    {
        // TODO: Implement processRequest() method.

        require_once __DIR__ . '/../../views/login.php';
    }
}