<?php

namespace Chloe\PhpEstoque\Controller;

use Chloe\PhpEstoque\Repository\UserRepository;
use PDO;

class LoginController implements Controller
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

        if (isset($_POST['login'])) {

            $result = $this->repository->authenticateUser($email, $password);

            if ($result === false || $result === null) {
                $error_message = 'E-mail ou senha inválidos.';
                echo $error_message;
                header('Location: /login?erro=credenciais_invalidas');
                exit();

            } else {
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                $_SESSION['logado'] = true;

                header('Location: /?sucesso=usuario_logado');
                exit();

            }
        }

    }

}