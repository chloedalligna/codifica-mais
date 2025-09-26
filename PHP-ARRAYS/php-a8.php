<?php

/* CÁLCULO DE DESCONTO PROGRESSIVO
Crie um programa que calcule o valor final de uma compra com desconto progressivo. O 
programa deve conter as seguintes funções:
1 - aplicarDesconto($valorCompra, $percentualDesconto): Recebe o valor da compra e 
o percentual de desconto como parâmetros e retorna o valor final com o desconto aplicado.
2 - calcularDescontoProgressivo($valorCompra): Recebe o valor da compra como 
parâmetro e retorna o valor final com o desconto progressivo aplicado.
● Se o valor da compra for menor que R$ 100,00, não há desconto.
● Se o valor da compra for entre R$ 100,00 e R$ 500,00, aplica-se um desconto de 
10%.
● Se o valor da compra for maior que R$ 500,00, aplica-se um desconto de 20%.
O programa deve solicitar ao usuário o valor da compra e exibir o valor final após a 
aplicação do desconto progressivo. */

function aplicarDesconto($valorCompra, $percentualDesconto)
{
    $valorFinal = $valorCompra - ($valorCompra * $percentualDesconto);
    return $valorFinal;
}

function calcularDescontoProgressivo($valorCompra)
{
    switch ($valorCompra) {
        case ($valorCompra < 100.00):
            return 0.00; 
            break;
        case ($valorCompra > 500.00):
            return 20.00/100;
            break;
        default:
            return 10.00/100;
            break;
    }
}

$valorCompra = readline("Informe o valor da compra: R$");

$percentualDesconto = calcularDescontoProgressivo($valorCompra);

$valorFinal = aplicarDesconto($valorCompra, $percentualDesconto);

echo "Valor com desconto aplicado: R$$valorFinal" . ".";