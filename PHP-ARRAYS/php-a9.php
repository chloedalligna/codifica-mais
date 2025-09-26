<?php

/* ARRAYS ASSOCIATIVOS
1 - Crie uma variável em array para armazenar o estoque de produtos de uma loja. Utilize o 
array abaixo:
$estoque = [
 [“Bermuda”, 59.9, 6], // Produto 1
 [“Camisa”, 89.9, 5], // Produto 2
 [“Sapato”, 179.9, 10], // Produto 3
 [“Calça”, 99.9, 7] // Produto 4
];
2 – Você deve calcular e imprimir o valor total que a loja tem de estoque, no array que segue 
o padrão [nome , valor, quantidade]. Resultado esperado: R$ 3.307,20 */

$estoque = [
 ['nome' => "Bermuda", 'valor' => 59.9, 'quantidade' => 6], // Produto 1
 ['nome' => "Camisa", 'valor' => 89.9, 'quantidade' => 5], // Produto 2
 ['nome' => "Sapato", 'valor' => 179.9, 'quantidade' => 10], // Produto 3
 ['nome' => "Calça", 'valor' => 99.9, 'quantidade' => 7] // Produto 4
];

$valorTotalEstoque = 0;

foreach ($estoque as $produto) {
    $valorTotalEstoque += $produto['valor'] * $produto['quantidade'];
}

echo "Valor total do estoque da loja: R$ $valorTotalEstoque" . ".";