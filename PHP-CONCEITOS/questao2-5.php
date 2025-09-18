<?php

// Informe se um número digitado pelo usuário é par ou ímpar.

echo "Digite um número: ";
$number = trim(fgets(STDIN));

if ($number % 2 == 0) {
    echo "O número informado é par.";
} else {
    echo "O número informado é ímpar.";
}