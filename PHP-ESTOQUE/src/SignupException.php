<?php

namespace Chloe\PhpEstoque;

class SignupException extends \DomainException
{

    public function __construct() {
        $message = "O e-mail ou senha está errado.";
        parent::__construct($message);
    }

}