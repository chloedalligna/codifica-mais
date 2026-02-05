<?php

namespace Chloe\PhpEstoque\Controller\UserLogin;

use Chloe\PhpEstoque\Controller\Controller;

class LogoutController implements Controller
{

    public function processRequest(): void
    {
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['logado']);
        session_destroy();
        header('location: /login');
    }

}