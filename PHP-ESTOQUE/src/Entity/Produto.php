<?php

namespace Chloe\PhpEstoque\Entity;

class Produto {

    private ?int $id;

    private string $nomeProduto;

    private int $idCategoria;

    private int $idSubcategoria;

    private float $preco;
    
    private int $qtd;

    private string $imagemUrl;

    private string $descricao;
    
    private int $idStatus;

    public function __construct(?int $id, string $nomeProduto, int $idCategoria, int $idSubcategoria, float $preco, int $qtd, string $imagemUrl, string $descricao)
    {
        $this->id = $id;
        $this->nomeProduto = $nomeProduto;
        $this->idCategoria = $idCategoria;
        $this->idSubcategoria = $idSubcategoria;
        $this->preco = $preco;
        $this->qtd = $qtd;
        $this->imagemUrl = $imagemUrl;
        $this->descricao = $descricao;

        if ($qtd < 0) {
            $this->qtd = 0;
        }

        if ($qtd > 0) {
            $this->idStatus = 1;
        } else {
            $this->idStatus = 2;
        }
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nomeProduto;
    }

    public function getIdCategoria(): int
    {
        return $this->idCategoria;
    }

    public function getIdSubcategoria(): int
    {
        return $this->idSubcategoria;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function getQtd(): int
    {
        return $this->qtd;
    }

    public function getImagemUrl(): int
    {
        return $this->imagemUrl;
    }

    public function getDescricao(): int
    {
        return $this->descricao;
    }

    public function getIdStatus(): int
    {
        return $this->idStatus;
    }


}