<?php

namespace Chloe\PhpEstoque;

class InvalidException extends \Exception
{
    private string $element;
    public function __construct(string $element, string $varname) {
        $this->element = $element;
        $_SESSION['varname'] = $varname;
        $message = "O campo $element está inválido.";
        parent::__construct($message);
    }
}