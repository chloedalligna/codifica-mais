<?php

/* CALCULADORA DE IMC (ÍNDICE DE MASSA CORPORAL)
Solicite ao usuário seu peso (em quilogramas) e altura (em metros) e calcule o IMC utilizando 
a fórmula: IMC = peso / (altura * altura). 
Depois de obter o resultado de IMC, deve-se interpretar o valor utilizando a seguinte tabela: 
Imprima o resultado do IMC (kg/m²) mais o resultado da classificação. */

function calculadoraIMC(float $peso_, float $altura_): float
{
    return $peso_ / ($altura_ * $altura_);
}

$peso = readline("Informe o seu peso em quilogramas (kg): ");
$altura = readline("Informe a sua altura em metros (m): ");

$imc = calculadoraIMC($peso, $altura);

echo "Seu IMC é $imc kg/m² e sua classificação é: ";

switch ($imc) {
    case $imc < 18.5:
        echo 'Magreza.';
        break;
    case 18.5 <= $imc && $imc <= 24.9:
        echo 'Normal.';
        break;
    case 25 <= $imc && $imc <= 29.9:
        echo 'Sobrepeso.';
        break;
    case 30 <= $imc && $imc <= 34.9:
        echo 'Obesidade grau I.';
        break;
    case 35 <= $imc && $imc <= 39.9:
        echo 'Obesidade grau II.';
        break;
    default:
        echo 'Obesidade grau III.';
}

