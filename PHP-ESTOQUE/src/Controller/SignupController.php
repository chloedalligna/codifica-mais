<?php

namespace Chloe\PhpEstoque\Controller;

use Chloe\PhpEstoque\Controller\Controller;
use Chloe\PhpEstoque\Entity\Product;
use Chloe\PhpEstoque\Entity\User;
use Chloe\PhpEstoque\Repository\UserRepository;

class SignupController implements Controller
{
    private UserRepository $repository;
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function processRequest(): void
    {
        $username = filter_input(INPUT_POST, 'username');
        if (!$username) {
            $error_message = 'Por favor, digite um nome de usuário válido.';
            echo $error_message;
            header('Location: /login?erro=usuario_invalido');
            exit();
        }

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if (!$email) { // (!$email) => ($email === false || $email === null || $email === '')
            $error_message = 'Por favor, digite um e-mail válido.';
            echo $error_message;
            header('Location: /login?erro=email_invalido');
            exit();
        }

        $password = filter_input(INPUT_POST, 'password');
        if (!$password) {
            $error_message = 'Por favor, digite uma senha válida.';
            echo $error_message;
            header('Location: /login?erro=senha_invalida');
            exit();
        }

        if (isset($_POST['signup'])){

            $password=password_hash($password, PASSWORD_BCRYPT);

            $user = new User (
                $username,
                $email,
                $password);

            $result = $this->repository->addUser($user);

            if ($result === false) {
                header('Location: /login?erro=falha_signup');

            } else {
                header('Location: /login?sucesso=usuario_cadastrado');
            }

        }




    }
}