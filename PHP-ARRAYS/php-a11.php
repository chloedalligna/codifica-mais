<?php

/* Procedimentos:
1. Crie a branch com o nome de xx-cod-php-a11, onde xx são as suas iniciais.
2. Crie um array para armazenar os produtos e suas informações.
3. Utilize um switch case para oferecer opções ao usuário em um loop até que o
usuário escolha a opção de sair. Neste script, use a função exibirMenu() para 
exibir o menu de opções e solicitar ao usuário que insira uma escolha.
4. Utilize um loop while para continuar executando até que o usuário escolha a 
opção 5 para sair. As opções são:
  a. (1) Adicionar um produto
  b. (2) Remover um produto
  c. (3) Verificar o estoque
  d. (4) Listar o estoque
  e. (5) Sair
5. Utilize a função adicionarProduto() para inserir dados de estoque
6. Utilize a função venderProduto() para simular a venda de alguns produtos. Se a
quantidade for zero, remover o produto do array
7. Utilize a função verificarEstoque() para verificar a disponibilidade de um produto
específico.
8. Utilize a função listarEstoque() para exibir o estoque atualizado. */

// $estoque[$key] = [
//     'codigo' => 1,
//     'nome' => 'Camisa Polo',
//     'tamanho' => 'P',
//     'cor' => 'Branca',
//     'quantidade' => 1
// ];

$estoque = [];
$varivelSaida = true;

while ($varivelSaida) {
echo "\nESTOQUE";
$opcaoEscolhida = exibirMenu();

switch ($opcaoEscolhida) {
    case 1:
      list($codigo, $nomeProduto, $tamanho, $cor, $quantidade) = pedirDados();
      // echo "\n$codigo, $nomeProduto, $tamanho, $cor, $quantidade\n";
      adicionarProduto($estoque, $codigo, $nomeProduto, $tamanho, $cor, $quantidade);
      break;

    case 2:
      $codigoChave = readline('Informe o código do produto que deseja vender: ');
      $quantidadeVendas = readline('Informe a quantidade deseja vender do produto: ');
      venderProduto($estoque, $codigoChave, $quantidadeVendas);
      break;

    case 3:
      $codigoChave = readline('Informe o código do produto que deseja verificar a disponibilidade no estoque: ');
      verificarEstoque($estoque, $codigoChave);
      break;

    case 4:
      listarEstoque($estoque);
      break;

    case 5:
      echo "Programa encerrado.";
      $varivelSaida = false;
      break;
  }
  
}

// Função para oferecer as 5 opções ao usuário e continua em um loop até que o usuário escolha a opção de sair.

function exibirMenu()
{
  echo "\n(1) Adicionar um produto \n(2) Remover um produto \n(3) Verificar o estoque \n(4) Listar o estoque \n(5) Sair\n\n";

  $opcaoEscolhida = readline('Escolha uma das opções acima (digite o número correspondente): ');
  while ($opcaoEscolhida != 1 && $opcaoEscolhida != 2 && $opcaoEscolhida != 3 && $opcaoEscolhida != 4 && $opcaoEscolhida != 5 ) {
    echo "Número digitado inválido.\n";
    $opcaoEscolhida = readline('Escolha uma das opções acima (digite o número correspondente): ');
  }
  echo "\n";

  return $opcaoEscolhida;
}

function pedirDados()
{
  $codigo = readline('Informe o código do produto: ');
  $nomeProduto = readline('Informe o nome do produto: ');
  $tamanho = readline('Informe o tamanho do produto: ');
  $cor = readline('Informe a cor do produto: ');
  $quantidade = readline('Digite a quantidade do produto: ');
  echo "\n";

  return [$codigo, $nomeProduto, $tamanho, $cor, $quantidade];
}

// Adiciona um novo produto ao estoque, com seus atributos.

function adicionarProduto(array &$estoque, $codigo, string $nomeProduto, string $tamanho, string $cor, int $quantidade)
{
  $estoque[$codigo] = [
    'codigo' => $codigo,
    'nome' => $nomeProduto,
    'tamanho' => $tamanho,
    'cor' => $cor,
    'quantidade' => $quantidade
  ];

}

// Remove um produto do estoque, com seus atributos.

function venderProduto(array &$estoque, $codigoChave, int $quantidadeVendas): array
{
  $disponibilidade = verificarEstoque($estoque, $codigoChave);

  if ($disponibilidade) {

    $quantidade = $estoque[$codigoChave]['quantidade'];

    if ($quantidade > 0) {

      if ($quantidade > $quantidadeVendas || $quantidade == $quantidadeVendas) {
        $quantidade -= $quantidadeVendas;

        if ($quantidade == 0) {
          echo "Registro do produto será apagado do estoque, pois não há unidades restantes.";
          echo "\n";
          unset($estoque[$codigoChave]);

        } else {
          $estoque[$codigoChave]['quantidade'] = $quantidade;
          echo "Quantidade restante: $quantidade unidades.";
          echo "\n";
        }

      } else {
        echo "Não é possível vender esta quantidade deste produto, pois há somente $quantidade unidades.";
        echo "\n";
      }
    // } else {
    //   echo "Não é possível vender esta quantidade deste produto, pois não há unidades restantes.";
    //   echo "\n";
    //   unset($estoque[$codigoChave]);
    }
  }
  
  return $estoque;
}

// Verifica se um produto com as características especificadas está disponível no estoque.

function verificarEstoque($estoque, $codigoChave)
{
  $cont = 0;
  foreach ($estoque as $chave => $produto) {
    $cont++;
    if ($chave == $codigoChave) {
      echo "Há unidades desse produto no estoque.";
      echo "\n";
      return true;
      break;
    } elseif ($cont == count($estoque)){
      echo "Não há esse produto no estoque.";
      echo "\n";
      return false;
    }
  }
}

// Imprime a lista completa do estoque, com todos os produtos e suas quantidades.

function listarEstoque($estoque)
{
  foreach ($estoque as $produto) {
    list('codigo' => $codigo, 'nome' => $nomeProduto, 'tamanho' => $tamanho, 'cor' => $cor, 'quantidade' => $quantidade) = $produto;
    echo "Produto: $nomeProduto \n- Código: $codigo \n- Tamanho: $tamanho \n- Cor: $cor \n- Quantidade: $quantidade\n";
  }
  echo "\n";
}