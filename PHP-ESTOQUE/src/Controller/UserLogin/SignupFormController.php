<?php

namespace Chloe\PhpEstoque\Controller\UserLogin;

use Chloe\PhpEstoque\Controller\Controller;
use Chloe\PhpEstoque\Repository\UserRepository;

class SignupFormController implements Controller
{

    public function processRequest(): void
    {
        if (array_key_exists('logado', $_SESSION) && $_SESSION['logado'] === true) { // OU (($_SESSION['logado'] ?? false) === true)
            header('Location: /');
            return;
        }

        require_once __DIR__ . "/../../../views/UserLogin/signup.php";
    }

}