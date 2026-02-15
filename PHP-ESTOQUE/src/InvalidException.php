<?php

namespace Chloe\PhpEstoque;

class InvalidException extends \Exception
{
    private string $element;

    public function __construct(string $element, string $operation, $specificMessage = '') {
        $this->element = $element;
        $message = "O campo '$element' está inválido. " . $specificMessage . "\nErro ao realizar $operation do produto.";
        parent::__construct($message);
    }
}