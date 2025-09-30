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

$codigo; $nomeProduto; $tamanho; $cor; $quantidade = pedirDados();

// Função para oferecer as 5 opções ao usuário e continua em um loop até que o usuário escolha a opção de sair.

function exibirMenu()
{
  echo "(1) Adicionar um produto\n
  (2) Remover um produto\n
  (3) Verificar o estoque\n
  (4) Listar o estoque\n
  (5) Sair\n";
  $opcaoEscolhida = readline('Escolha uma das opções acima (digite o número correspondente):');
  switch ($opcaoEscolhida) {
    case 1:
      pedirDados();
      break;
    case 2:
      
      break;
    case 3:
      # code...
      break;
    case 4:
      # code...
      break;
    case 5:
      # code...
      break;
    default:
      echo "Número inválido.";
      exibirMenu();
      break;
  }
}

function pedirDados()
{
  $codigo = readline('Informe um código para o produto: ');
  $nomeProduto = readline('Informe um nome válido para o produto: ');
  $tamanho = readline('Informe um tamanho válido para o produto: ');
  $cor = readline('Informe uma cor para o produto: ');
  $quantidade = readline('Digite a quantidade do produto: ');
  return $codigo; $nomeProduto; $tamanho; $cor; $quantidade;
}

// Adiciona um novo produto ao estoque, com seus atributos.

function adicionarProduto(array $estoque, $codigo, string $nomeProduto, string $tamanho, string $cor, int $quantidade): array
{
  $estoque[] = [
    'codigo' => $codigo,
    'nome' => $nomeProduto,
    'tamanho' => $tamanho,
    'cor' => $cor,
    'quantidade' => $quantidade
  ];
  return $estoque;
}

// Remove um produto do estoque, com seus atributos.

function venderProduto($estoque, $codigo, $quantidade)
{

}

// Verifica se um produto com as características especificadas está disponível no estoque.

function verificarEstoque($estoque, $codigo)
{

}

// Imprime a lista completa do estoque, com todos os produtos e suas quantidades.

function listarEstoque($estoque)
{
  
}