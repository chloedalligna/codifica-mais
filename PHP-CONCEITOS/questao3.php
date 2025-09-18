<?php

/* Escreva um código PHP que solicita ao usuário dois números inteiros, a e b,
e calcula a soma de todos os números ímpares no intervalo [a, b] (inclusive).
Certifique-se de que a seja menor ou igual a b. Se a for maior que b, solicite
ao usuário que insira novamente os valores */

$a = readline("Digite um número: ");
$b = readline("Digite um segundo número: ");

while ($a > $b) {
    echo "Inválido, o segundo número precisa ser maior ou igual ao primeiro.\n";
    $a = readline("Digite o valor do primeiro número novamente: ");
    $b = readline("Digite o valor do segundo número novamente: ");
}

$somaImpares = 0;

for ($i=$a; $i <= $b; $i++) { 
    if ($i % 2 != 0) {
        $somaImpares += $i;
    }
}

echo "Soma de todos os números ímpares no intervalo [$a, $b]: $somaImpares.";
