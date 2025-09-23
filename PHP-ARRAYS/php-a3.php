<?php

/* CONVERSÃO DE TEMPERATURA
Escreva um programa que converta a temperatura de Celsius para Fahrenheit e vice-versa. 
O programa deve solicitar ao usuário a temperatura e a unidade de medida (Celsius ou 
Fahrenheit), e então exibir o resultado da conversão. 
Fórmula de conversão:
● De Celsius para Fahrenheit: °F = (°C * 9/5) + 32
● De Fahrenheit para Celsius: °C = (°F - 32) * 5/9
Exemplo:
● Temperatura: 25°C
● Temperatura em Fahrenheit: 77°F */

$conversor_temperatura = [
    'temp_inicial' => $temperatura_inicial = [
        'Temperatura' => 0,
        'Unidade' => ''
    ],
    'temp_convertida' => $temperatura_convertida = [
        'Temperatura' => 0,
        'Unidade' => ''
    ]
];

$conversor_temperatura['temp_inicial']['Temperatura'] = readline("Informe a temperatura (somente números): ");

$conversor_temperatura['temp_inicial']['Unidade'] = readline("Informe a unidade de medida (C ou F): ");

if ($conversor_temperatura['temp_inicial']['Unidade'] == 'C') {

    $conversor_temperatura['temp_convertida']['Temperatura'] = ($conversor_temperatura['temp_inicial']  ['Temperatura'] * 9/5) + 32;

    $conversor_temperatura['temp_convertida']['Unidade'] = 'F';

} else {

    $conversor_temperatura['temp_convertida']['Temperatura'] = ($conversor_temperatura['temp_inicial']['Temperatura'] - 32) * 5/9;

    $conversor_temperatura['temp_convertida']['Unidade'] = 'C';
}

echo "\n";

foreach ($conversor_temperatura as $conversao => $temperatura) {
    foreach ($temperatura as $chave => $valor) {
        if ($chave == 'Temperatura') {
            if ($conversao == 'temp_inicial') {
                echo $chave . ": " . $valor;
            } else {
                echo $chave . " convertida: " . $valor;
            }
        } else {
            echo " °" . $valor . "\n";
        }
    }
}