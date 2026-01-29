<?php

namespace Chloe\PhpEstoque\Controller;

use Chloe\PhpEstoque\Repository\ProductRepository;

class LoginController implements Controller
{

    private ProductRepository $repository;
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function processRequest(): void
    {

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if (!$email) { // (!$email) => ($email === false || $email === null || $email === '')
            $error_message = 'Por favor, digite um e-mail válido.';
            echo $error_message;
            header('Location: /login?erro=email_invalido');
            exit();
        }
        $username = filter_input(INPUT_POST, 'username');
        if (!$username) {
            $error_message = 'Por favor, digite um nome de usuário válido.';
            echo $error_message;
            header('Location: /login?erro=usuario_invalido');
            exit();
        }
        $password = filter_input(INPUT_POST, 'password');
        if (!$password) {
            $error_message = 'Por favor, digite uma senha válida.';
            echo $error_message;
            header('Location: /login?erro=senha_invalida');
            exit();
        }

        if (isset($email, $username, $password)) {
            $sql = 'SELECT * FROM users WHERE email = :email';
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':email', $email);
            $statement->execute();
            $user = $statement->fetch(PDO::FETCH_ASSOC);


                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header('Location: /dashboard.php');
                exit();
            } else {
                $error_message = 'Invalid email or password.';
            }
        }

    }

}