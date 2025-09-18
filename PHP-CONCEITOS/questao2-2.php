<?php

// Solicite o nome e exiba "Olá, [nome]!".

echo "Digite seu nome: ";
$nome = trim(fgets(STDIN));

echo "Olá, $nome!";