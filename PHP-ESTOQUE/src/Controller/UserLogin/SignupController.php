<?php

namespace Chloe\PhpEstoque\Controller\UserLogin;

use Chloe\PhpEstoque\Controller\Controller;
use Chloe\PhpEstoque\Entity\User;
use Chloe\PhpEstoque\Repository\UserRepository;

class SignupController implements Controller
{
    private UserRepository $repository;
    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function processRequest(): void
    {
        $username = $_POST['username'];

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if ($email === false || $email === null) {
            header('Location: /signup?erro=credenciais_invalidas');
            exit();
        }

        $password = filter_input(INPUT_POST, 'password');
        if ($password === false || $password === null) {
            header('Location: /signup?erro=credenciais_invalidas');
            exit();
        }

        $user = new User (
            $username,
            $email,
            $password);

        $result = $this->repository->addUser($user);

        if ($result === false) {
            header('Location: /login?erro=falha_signup');
            exit();
        } else {
            header('Location: /login?sucesso=usuario_cadastrado');
            exit();
        }

    }
}