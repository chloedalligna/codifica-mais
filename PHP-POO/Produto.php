<?php

class Produto {
    
    private $nome;
    private $preco;
    private $quantidade;

    public function __construct(string $nome, float $preco, int $quantidade) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->quantidade = $quantidade;

        if ($preco < 0) {
            $this->preco = 0;
        }

        if ($quantidade < 0) {
            $this->quantidade = 0;
        }
    }

    public function alterarPreco($novoPreco)
    {
        if ($novoPreco < 0) {
            $novoPreco = 0;
        }

        $novoPrecoFormatado = number_format($novoPreco, 2, ',', '.');   
        echo "Alteração de preço! \nPreço anterior: R$ $this->preco \nNovo preço: R$ $novoPrecoFormatado\n\n";
        $this->preco = $novoPreco;
    }
    
    public function alterarQuantidade(int $novaQuantidade)
    {
        if ($novaQuantidade < 0) {
            echo "Estoque não pode ser negativo.\n\n";
            return;
        }
            
        echo "Alteração de estoque! \nEstoque anterior: $this->quantidade unidades\nNovo estoque: $novaQuantidade unidades\n\n";
        $this->quantidade = $novaQuantidade;
        
    }
    
    public function exibirDetalhes()
    {
        $precoTratado = number_format($this->preco, 2, ',', '.');
        echo "DADOS DO PRODUTO \nNome: $this->nome \nPreço: R$ $precoTratado \nEstoque: $this->quantidade unidades" . PHP_EOL;
    }

}

$produto1 = new Produto('Bola de futebol', 12.90, 50);
$produto1->exibirDetalhes();

$produto1->alterarPreco(15.99);

$produto1->alterarQuantidade(48);

$produto1->exibirDetalhes();