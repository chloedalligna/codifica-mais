<?php

// Solicite dois números e exiba a soma.

echo "Digite o primeiro número: ";
$number1 = trim(fgets(STDIN));

echo "Digite o segundo número: ";
$number2 = trim(fgets(STDIN));

$soma = $number1 + $number2;
echo "A soma dos números informados é igual a $soma.";