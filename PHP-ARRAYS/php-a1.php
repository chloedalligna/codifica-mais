<?php

/* CÁLCULO DE GORJETA EM UM RESTAURANTE
Crie um programa que calcule a gorjeta a ser paga em um restaurante. O programa deve 
solicitar ao usuário o valor total da conta e a porcentagem da gorjeta. Em seguida, o programa 
deve calcular o valor da gorjeta e o valor total a ser pago, incluindo a gorjeta.

Exemplo:
● Valor da conta: R$ 120,00
● Porcentagem da gorjeta: 10%
● Valor da gorjeta: R$ 12,00
● Valor total a ser pago: R$ 132,00 */

$conta = [
    'Valor da conta' => 0,
    'Porcentagem da gorjeta' => 0,
    'Valor da gorjeta' => 0,
    'Valor total a ser pago' => 0
];

$conta['Valor da conta'] = readline("Informe o valor da conta: R$ ");
$conta['Porcentagem da gorjeta'] = readline("Informe a porcentagem da gorjeta (em %): ");
$conta['Valor da gorjeta'] = $conta['Valor da conta'] * ($conta['Porcentagem da gorjeta']/100);
$conta['Valor total a ser pago'] = $conta['Valor da conta'] + $conta['Valor da gorjeta'];
echo "\n";

foreach ($conta as $chave => $valor) {
    echo $chave . ": ";
    if ($chave != 'Porcentagem da gorjeta') {
        echo "R$ ";
    }
    echo $valor;
    if ($chave == 'Porcentagem da gorjeta') {
        echo "% \n";
    } else {
        echo "\n";
    }
}