<?php

namespace Chloe\PhpEstoque\Controller\UserLogin;

use Chloe\PhpEstoque\Controller\Controller;
use Chloe\PhpEstoque\Entity\User;
use Chloe\PhpEstoque\Repository\UserRepository;

class SignupController implements Controller
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function processRequest(): void
    {
        $username = filter_input(INPUT_POST, 'username');
        if ($username === false || $username === null) {
            header('Location: /signup?error=username');
            exit();
        }

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if ($email === false || $email === null) {
            header('Location: /signup?error=email');
            exit();
        }

        $password = filter_input(INPUT_POST, 'password');
        if ($password === false || $password === null) {
            header('Location: /signup?error=passaword');
            exit();
        }

        $user = new User (
            $username,
            $email,
            $password);

        $success = $this->userRepository->create($user);

        if ($success === false) {
            header('Location: /login?error=signup');
        } else {
            header('Location: /login?success=usuario_cadastrado');
        }
    }

}