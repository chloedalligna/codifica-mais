<?php

namespace Chloe\PhpEstoque\Entity;

class User
{
    private int $id;

    private string $username;

    private string $email;

    private string $password;

    private string $authorization;

    public function __construct(string $username, string $email, string $password)
    {
        $this->setEmail($email);
        $this->username = $username;
        $this->password = password_hash($password, PASSWORD_ARGON2ID);
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setAuthorization(string $authorization): void
    {
        $this->authorization = $authorization;
    }

    private function setEmail( string $email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new \InvalidArgumentException("E-mail inválido.");
        }

        $this->email = $email;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
    

}