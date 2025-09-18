<?php

// Solicite ano de nascimento e calcule a idade do usuário.

echo "Digite o seu ano de nascimento: ";
$anoNascimento = trim(fgets(STDIN));

$anoAtual = 2025;

$idade = $anoAtual - $anoNascimento;

echo "Sua idade em $anoAtual é $idade anos.";