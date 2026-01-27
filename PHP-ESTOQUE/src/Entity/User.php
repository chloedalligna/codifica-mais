<?php

namespace Chloe\PhpEstoque\Entity;

class User
{
    private ?int $id;

    private string $email;

    private string $username;

    private string $password;

    public function __construct(?int $id, string $email, string $username, string $password)
    {
        $this->id = $id;
        $this->setEmail($email);
        $this->username = $username;
        $this->password = $password;
    }

    private function setEmail( string $email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new \InvalidArgumentException("E-mail inválido.");
        }

        $this->email = $email;
    }

    public function getId(): ?int
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