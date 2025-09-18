<?php

// Solicite ao usuário para escolher um número e mostre a tabuada dele (1 ao 10).

echo "Digite um número: ";
$number = trim(fgets(STDIN));

echo "TABUADA DO $number" . PHP_EOL;

for ($i=1; $i <= 10; $i++) { 
    echo "$i x $number = " . ($number * $i) . PHP_EOL;
}