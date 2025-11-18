<?php

class Produto {
    
    private $nome;
    private $preco;
    private $quantidade;

    public function __construct($nome, $preco, $quantidade) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->quantidade = $quantidade;
    }

    public function alterarPreco($novoPreco)
    {
        echo "Alteração de preço! \nPreço anterior: R$ $this->preco \nNovo preço: R$ $novoPreco\n\n";
        $this->preco = $novoPreco;
    }
    
    public function alterarQuantidade($novaQuantidade)
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
        echo "DADOS DO PRODUTO \nNome: $this->nome \nPreço: R$ $this->preco \nEstoque: $this->quantidade unidades" . PHP_EOL;
    }

}

$produto1 = new Produto('Bola de futebol', 12.90, 50);

$produto1->alterarPreco(15.99);

$produto1->alterarQuantidade(48);

$produto1->exibirDetalhes();