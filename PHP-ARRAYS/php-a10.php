<?php

/* SISTEMA DE CONTROLE DE FUNCIONÁRIOS E SALÁRIOS
Você foi contratado para desenvolver um sistema que gerencie os funcionários de uma 
empresa e seus respectivos salários. Considere as seguintes informações:
Dados dos Funcionários:
● Funcionário 1: Pedro
○ Salário Base: R$ 2500,00
○ Horas Extras: 10
● Funcionário 2: Renata
○ Salário Base: R$ 3000,00
○ Horas Extras: 5
● Funcionário 3: Sérgio
○ Salário Base: R$ 2800,00
○ Horas Extras: 8
● Funcionário 4: Vanessa
○ Salário Base: R$ 3200,00
○ Horas Extras: 12
● Funcionário 5: André
○ Salário Base: R$ 1700,00
○ Horas Extras: Não tem
Nota: Armazene os dados dos funcionários em um array
Com base nas informações acima, aqui está o que o programa deve fazer:
Funções para implementar:
1. calcularSalarioTotal($salarioBase, $horasExtras, $valorHoraExtra)
a. Recebe o salário base, as horas extras e o valor da hora extra.
b. Retorna o salário total do funcionário.
2. listarFuncionarios($funcionarios)
a. Imprime todos os funcionários e suas respectivas informações (nome, salário 
base, horas extras, salário total).
Procedimentos:
1. Imprimir a lista inicial de funcionários, salários base e horas extras.
2. Calcular o salário total de cada funcionário, considerando que o valor da hora extra é 
1,5 vezes o valor da hora normal.
3. Imprimir o salário total de cada funcionário.
Nota: Considere 160 horas trabalhadas por mês ao calcular o valor da hora normal. */

$funcionarios = [
    ['nome' => "Pedro", 'salário base' => 2500.00, 'horas extras' => 10], // Funcionário 1
    ['nome' => "Renata", 'salário base' => 3000.00, 'horas extras' => 5], // Funcionário 2
    ['nome' => "Sérgio", 'salário base' => 2800.00, 'horas extras' => 8], // Funcionário 3
    ['nome' => "Vanessa", 'salário base' => 3200.00, 'horas extras' => 12], // Funcionário 4
    ['nome' => "André", 'salário base' => 1700.00, 'horas extras' => 0]  // Funcionário 5
];

function calcularValorHoraExtra(float $salarioBase): float
{
    $valorHoraNormal = $salarioBase / 160; // 160 horas trabalhadas por mês
    return $valorHoraNormal * 1.5; // valor da hora extra é  1.5 vezes o valor da hora normal
}

function calcularSalarioTotal(float $salarioBase, int $horasExtras, float $valorHoraExtra): float
{
    return $salarioBase + ($horasExtras * $valorHoraExtra);
}

function listarFuncionarios(array $funcionarios)
{
    $i = 0;
    foreach ($funcionarios as $colaborador) {
        $i++;
        echo "Funcionário $i:\n ● Nome: " . $colaborador['nome'] . "\n ● Salário base: R$ " . $colaborador['salário base'] . "\n ● Horas extras: " . $colaborador['horas extras'] . "\n";
        if (array_key_exists('salário total', $colaborador)) {
            echo " ● Salário total: R$ " . $colaborador['salário total'] . "\n";
        }
        if ($i < count($funcionarios)) {
            echo "\n";
        }
    }
}

echo str_repeat("--", 40) . "\nLista inicial de funcionários:\n" . str_repeat("--", 40) . "\n";

listarFuncionarios($funcionarios);

echo str_repeat("--", 40) . "\n";

foreach ($funcionarios as $colaborador) {
    $valorHoraExtra = calcularValorHoraExtra($colaborador['salário base']);
    $salarioTotal = calcularSalarioTotal($colaborador['salário base'], $colaborador['horas extras'], $valorHoraExtra);
    $colaborador['salário total'] = $salarioTotal;
    echo "Salário total de " . $colaborador['nome'] . ": R$ $salarioTotal.\n";
}

echo str_repeat("--", 40);

