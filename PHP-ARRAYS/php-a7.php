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

echo "CHURRASCO\n";
echo str_repeat("-=", 40) . "\n";

$totalPessoasChurrasco = readline("Informe o total de participantes do churrasco: ");

echo str_repeat("-=", 40) . PHP_EOL;

if ($totalPessoasChurrasco <= 1) {
    echo "O churrasco foi cancelado, todo mundo furou!";
} else {

    $maiorPreco = 0;
    while (True) {
        $item = readline("Informe um item do churrasco (aperte Enter para interromper a adição de itens): ");
        if ($item == null) {
            echo str_repeat("-=", 40) . PHP_EOL;
            echo "Fim da lista de itens do churrasco.\n";
            echo str_repeat("-=", 40) . PHP_EOL;

            break;
        }
        $itensChurrasco[] = $item;
        $precoItem = readline("Informe o preço do item do churrasco que você informou: R$");
        while ($precoItem <= 0) {
            $precoItem = readline("Informe um preço maior que 0 para o item do churrasco:");
        }
        $precoItensChurrasco[] = $precoItem;
        if ($precoItem > $maiorPreco) {
            $maiorPreco = $precoItem;
        }

        // alternativa:
        // $maiorPreco = max($precoItensChurrasco);

        echo str_repeat("--", 40) . PHP_EOL;

    }

    $indicesMaioresPrecos = [];
    foreach ($precoItensChurrasco as $indice => $preco) {
        if ($preco == $maiorPreco) {
            $indicesMaioresPrecos[] = $indice;
        }
    }

    $itensCaros = [];
    foreach ($indicesMaioresPrecos as $indice) {
        $itensCaros[] = $itensChurrasco[$indice];
    }

    $valorTotalItens = array_sum($precoItensChurrasco);
    $valorIndividual = calculoDivisaoChurras($valorTotalItens, $totalPessoasChurrasco);

    echo "Cada participante deve pagar $valorIndividual e o(s) item(ns) mais caro(s) do churrasco é(são):";

    for ($i=0; $i < count($itensCaros); $i++) { 
        echo ' ' . $itensCaros[$i];
        if ($i == (count($itensCaros)-2)) {
            echo ' e';
        } elseif ($i < (count($itensCaros)-2)) {
            echo ',';
        }
    }

    echo " por R$$maiorPreco cada.";

}

function calculoDivisaoChurras(float $valorTotalItens, int $totalPessoasChurrasco): float
{
    $valorIndividual = $valorTotalItens / $totalPessoasChurrasco;
    return $valorIndividual;
}