<?php

// Solicite ao usuário 2 números e informe qual é o maior entre eles.

$number1 = readline("Digite o primeiro número: ") . PHP_EOL;

$number2 = readline("Digite o segundo número: ") . PHP_EOL;

$maiorNumero = $number1;

if ($number2 > $maiorNumero) {
    $maiorNumero = $number2;
}

if (($maiorNumero == $number2) && ($maiorNumero == $number1)) {
    echo "Os números são iguais.";
} else {
    echo "O maior número é $maiorNumero";
}