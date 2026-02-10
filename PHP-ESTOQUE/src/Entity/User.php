<?php

namespace Chloe\PhpEstoque\Entity;

class User
{
    // ATRIBUTOS
    private int $id;
    private string $username;
    private string $email;
    private string $password;

    // CONSTRUTOR
    public function __construct(string $username, string $email, string $password)
    {
        $this->setEmail($email);
        $this->username = $username;
        $this->password = password_hash($password, PASSWORD_ARGON2ID);
    }

    // GETTERS E SETTERS
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    private function setEmail( string $email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new \InvalidArgumentException("E-mail inválido.");
//            header('Location: /signup?error=setEmail_email_invalido');
//            exit();
        }

        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

}