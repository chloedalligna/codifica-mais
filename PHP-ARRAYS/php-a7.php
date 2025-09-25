<?php

/* Você está organizando um churrasco com amigos e precisa dividir os custos 
igualmente entre todos. Sua tarefa é criar um programa que calcule quanto cada pessoa deve 
pagar com base nos itens comprados e no número de participantes. Aqui está o que o 
programa deve fazer:
1. Crie um array para armazenar os itens comprados no churrasco e outro array para 
armazenar o preço de cada item.
2. Solicite número total de participantes do churrasco.
3. Crie uma função que receba o valor total dos itens e o número de participantes como 
parâmetros, e retorne o valor que cada pessoa deve pagar.
4. Após calcular o valor que cada pessoa deve pagar, imprima o resultado, indicando 
quanto cada uma deve contribuir para o churrasco.
5. Imprima qual foi o item mais caro do churrasco.
6. Se o número de participantes for igual ou menor que um, imprima uma mensagem. “O 
churrasco foi cancelado, todo mundo furou!” */

$itensChurrasco = [];
$precoItensChurrasco = [];

$totalPessoasChurrasco = readline("Informe o total de participantes do churrasco: ");

if ($totalPessoasChurrasco <= 1) {
    echo "O churrasco foi cancelado, todo mundo furou!";
} else {

    $maiorPreco = 0;
    while (True) {
        $item = readline("Informe um item do churrasco (digite -1 para interromper a adição de itens): ");
        if ($item == -1) {
            echo "Fim da lista de itens do churrasco.\n";
            break;
        }
        $itensChurrasco[] = $item;
        $precoItem = readline("Informe o preço do item do churrasco que você informou: R$");
        while ($precoItem <= 0) {
            $precoItem = readline("Informe um preço maior que 0 para o item do churrasco: ");
        }
        $precoItensChurrasco[] = $precoItem;
        if ($precoItem > $maiorPreco) {
            $maiorPreco = $precoItem;
            echo "\n" . $maiorPreco . "\n";
        }
    }

    $indicesMaioresPrecos = [];
    foreach ($precoItensChurrasco as $indice => $preco) {
        if ($preco == $maiorPreco) {
            $indicesMaioresPrecos[] = $indice;
            echo "\n" . $indice . "\n";
        }
    }

    $itensCaros = [];
    foreach ($indicesMaioresPrecos as $indice) {
        $itensCaros[] = $indicesMaioresPrecos[$indice];
    }

    $valorTotalItens = array_sum($precoItensChurrasco);
    $valorIndividual = calculoDivisaoChurras($valorTotalItens, $totalPessoasChurrasco);

    echo "Cada participante deve pagar $valorIndividual e o(s) item(ns) mais caro(s) do churrasco é(são): " . $itensCaros . ", por R$$maiorPreco" . ".";

}

function calculoDivisaoChurras(float $valorTotalItens, int $totalPessoasChurrasco): float
{
    $valorIndividual = $valorTotalItens / $totalPessoasChurrasco;
    return $valorIndividual;
}