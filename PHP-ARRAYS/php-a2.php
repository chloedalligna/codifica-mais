<?php

/* CÁLCULO DE ÁREA E PERÍMETRO DE UM RETÂNGULO
Crie um programa que calcule a área e o perímetro de um retângulo. O programa deve 
solicitar ao usuário a largura e a altura do retângulo, e então exibir os resultados.
Fórmulas:
● Área = largura * altura
● Perímetro = 2 * (largura + altura)
Exemplo:
● Largura: 5 metros
● Altura: 3 metros
● Área: 15 m²
● Perímetro: 16 metros */

$retangulo = [
    'Largura' => 0,
    'Altura' => 0,
    'Área' => 0,
    'Perímetro' => 0
];

$retangulo['Largura'] = readline("Informe a largura do retângulo: ");
$retangulo['Altura'] = readline("Informe a altura do retângulo: ");
$retangulo['Área'] = $retangulo['Largura'] * $retangulo['Altura'];
$retangulo['Perímetro'] =  2 * ($retangulo['Largura'] + $retangulo['Altura']);
echo "\n";

foreach ($retangulo as $chave => $valor) {
    echo $chave . ": " . $valor;
    if ($chave == 'Área') {
        echo " m² \n";
    } else {
        echo " metros \n";
    }
}