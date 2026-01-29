<?php

namespace Chloe\PhpEstoque\Controller;

use Chloe\PhpEstoque\Controller\Controller;
use Chloe\PhpEstoque\Repository\ProductRepository;

class SignupController implements Controller
{

    private ProductRepository $repository;
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function processRequest(): void
    {
        // TODO: Implement processRequest() method.
    }
}