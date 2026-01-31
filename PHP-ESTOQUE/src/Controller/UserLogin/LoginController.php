<?php

namespace Chloe\PhpEstoque\Controller\UserLogin;

use Chloe\PhpEstoque\Controller\Controller;
use Chloe\PhpEstoque\Repository\UserRepository;

class LoginController implements Controller
{
    private UserRepository $repository;
    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function processRequest(): void
    {

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if ($email === false || $email === null) { //
            header('Location: /login?erro=credenciais_invalidas');
            exit();
        }

        $password = filter_input(INPUT_POST, 'password');
        if ($password === false || $password === null || $password === '') {
            header('Location: /login?erro=credenciais_invalidas');
            exit();
        }


//        $password = password_hash($password, PASSWORD_ARGON2ID);

        $this->repository->authenticateUser($email, $password);

    }

}


//$email = $_POST['email'] ?? '';
//$senha = $_POST['senha'] ?? '';
//
//// validar/autenticar...
//$autenticado = authenticate($email, $senha);
//
//if ($autenticado) {
//    // evitar anexar dados sensíveis na URL
//    header('Location: /');
//    exit;
//} else {