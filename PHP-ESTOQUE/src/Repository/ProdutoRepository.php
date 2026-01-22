<?php

namespace Chloe\PhpEstoque\Repository;

use Chloe\PhpEstoque\Entity\Produto;   
use Chloe\PhpEstoque\Repository\InterfaceRepository;
use Chloe\PhpEstoque\ConexaoPDO;
use PDO;

class ProdutoRepository implements InterfaceRepository {

    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = ConexaoPDO::criarConexao();
    }

    public function listarProdutos(): array
    {
        $statement = $this->pdo->query("SELECT * FROM produtos");
        $databaseProdutos = $statement->fetchAll(PDO::FETCH_ASSOC);

        $databaseProdutos = array_map(function ($produto) {
            return new Produto(
                $produto['id'],
                $produto['nome_produto'],
                $produto['id_categoria'],
                $produto['id_subcategoria'],
                $produto['preco'],
                $produto['qtd'],
                $produto['imagem_url'],
                $produto['descricao']
            );
        }, $databaseProdutos);

        return $databaseProdutos;
    }

    public function listarCategorias(): array
    {
        $statement = $this->pdo->query("SELECT * FROM categorias");
        $databaseCategorias = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $databaseCategorias;
    }

    public function listarSubategorias(): array
    {
        $statement = $this->pdo->query("SELECT * FROM categorias");
        $databaseSubcategorias = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $databaseSubcategorias;
    }

    public function obterNomeCategoria($idCategoria): string
    {
        $categoria = $this->pdo->prepare(
            "SELECT nome_categoria FROM categorias
            WHERE id_categoria = :id_categoria"
        );
        $categoria->bindValue(':id_categoria', $idCategoria);
        $categoria->execute();

        return $categoria;
    }

    public function obterNomeSubcategoria($idSubcategoria): string
    {
        $subcategoria = $this->pdo->prepare(
            "SELECT nome_subcategoria FROM subcategorias
            WHERE id_subcategoria = :id_subcategoria"
        );
        $subcategoria->bindValue(':id_subcategoria', $idSubcategoria);
        $subcategoria->execute();

        return $subcategoria;
    }

     public function obterIdCategoria($categoria)
    {
        $idCategoria = $this->pdo->prepare(
            "SELECT id_categoria FROM produtos p
            JOIN subcategorias s ON p.id_categoria = s.id_categoria
            JOIN categorias c ON s.id_categoria = c.id_categoria
            WHERE nome_categoria = :categoria"
        );
        $idCategoria->bindValue(':categoria', $categoria);
        $idCategoria->execute();

        return $idCategoria;
    }

    public function obterIdSubcategoria($subcategoria)
    {
        $idSubcategoria = $this->pdo->prepare(
            "SELECT id_subcategoria FROM produtos p
            JOIN subcategorias s ON p.id_subcategoria = s.id_subcategoria
            WHERE nome_subcategoria = :subcategoria"
        );
        $idSubcategoria->bindValue(':subcategoria', $subcategoria);
        $idSubcategoria->execute();
        return $idSubcategoria;
    }

    public function obterFaixaPreco()
    {
        $statement = $this->pdo->query("SELECT MIN(preco) AS min_preco and MAX(preco) AS max_preco FROM produtos");
        return $statement;
    }

    public function filtrarProdutos()
    {

    }

    public function cadastrarProduto()
    {

    }

    public function editarProduto()
    {

    }

    public function excluirProduto()
    {
        
    }

    public function visualizarProduto()
    {

    }
 
}