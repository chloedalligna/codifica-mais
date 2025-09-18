<?php

/* Escreva um script PHP que solicita ao usuário uma série de números inteiros
até que ele digite um valor específico (por exemplo, -1) para parar a entrada.
O script deve então determinar e exibir o maior e o menor número digitado
pelo usuário. */

$number = 0;
$maior = 0;
$menor = 0;

while ($number != -1) {
    $number = readline("Digite um número inteiro (digite -1 para sair): ");
    if ($number > $maior) {
        $maior = $number;
    } elseif ($number < $menor) {
        $menor = $number;
    }
}

echo "O maior número digitado foi $maior e o menor digitado foi $menor.";