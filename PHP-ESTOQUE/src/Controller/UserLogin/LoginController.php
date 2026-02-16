<?php

namespace Chloe\PhpEstoque\Controller\UserLogin;

use Chloe\PhpEstoque\Controller\Controller;
use Chloe\PhpEstoque\Repository\UserRepository;

class LoginController implements Controller
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function processRequest(): void
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if (empty($email)) { //
            header('Location: /login?error=email');
            exit();
        }

        $password = filter_input(INPUT_POST, 'password');
        if (empty($password)) {
            header('Location: /login?error=password');
            exit();
        }

        $this->userRepository->loginAuthentication($email, $password);
    }

}