<?php

namespace Chloe\PhpEstoque\Controller\UserLogin;

use Chloe\PhpEstoque\Controller\Controller;
use Chloe\PhpEstoque\Repository\UserRepository;

class LoginFormController implements Controller
{
    private UserRepository $repository;
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function processRequest(): void
    {
        require_once __DIR__ . '/../../views/login.php';
    }
}