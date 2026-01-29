<?php

namespace Chloe\PhpEstoque\Controller;

use Chloe\PhpEstoque\Repository\UserRepository;

class LoginFormController implements Controller
{
    private UserRepository $repository;
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function processRequest(): void
    {
        require_once __DIR__ . '/../../views/login.php';
    }
}