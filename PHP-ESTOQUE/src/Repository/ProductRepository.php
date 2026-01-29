<?php

namespace Chloe\PhpEstoque\Repository;

use Chloe\PhpEstoque\Entity\Product;
use Chloe\PhpEstoque\ConnectionPdo;
use PDO;

class ProductRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = ConnectionPdo::connect();
    }

    /**
     * @return PDO
     */
    public function getPdo(): PDO
    {
        return $this->pdo;
    }

    public function databaseToModel(array $productData): Product
    {
        $product =  new Product(
                    $productData['nome_produto'],
                    $this->getNameCategory($productData['id_categoria']),
                    $this->getNameSubcategory($productData['id_subcategoria']),
                    $productData['preco'],
                    $productData['quantidade'],
                    $productData['imagem_url'],
                    $productData['descricao'],
                    $productData['id_status']
                    );

        $product->setId($productData['id']);

        return $product;
    }

    public function listAllProducts(): array
    {
        $sql = 'SELECT * FROM produtos';

        $statement = $this->pdo->query($sql);
        $databaseProducts = $statement->fetchAll(PDO::FETCH_ASSOC);

        return array_map(
            function ($productData) {
                return $this->databaseToModel($productData);
            },
            $databaseProducts
        );
    }

    public function addProduct(Product $product): bool
    {
        $sql = 'INSERT INTO produtos (
                      nome_produto, 
                      id_categoria, 
                      id_subcategoria, 
                      preco, 
                      quantidade, 
                      imagem_url, 
                      descricao, 
                      id_status) 
                VALUES (
                        :nome_produto, 
                        :id_categoria, 
                        :id_subcategoria, 
                        :preco, :quantidade, 
                        :imagem_url, 
                        :descricao, 
                        :id_status
                        )';

        $statement = $this->pdo->prepare($sql);

        $statement->bindValue(':nome_produto', $product->getNameProduct());
        $statement->bindValue(':id_categoria', $product->getIdCategory());
        $statement->bindValue(':id_subcategoria', $product->getIdSubcategory());
        $statement->bindValue(':preco', $product->getPrice());
        $statement->bindValue(':quantidade', $product->getQuantity());
        $statement->bindValue(':imagem_url', $product->getImageUrl());
        $statement->bindValue(':descricao', $product->getIdStatus());
        $statement->bindValue(':id_status', 1); // Definindo status padrão como 1 (ativo)

        $result = $statement->execute();

        if ($statement->rowCount() !== 1) {
            throw new \Exception('Falha ao cadastrar o produto no banco de dados.');
        }

        $id = $this->pdo->lastInsertId();
        $product->setId(intval($id));

        return $result;
    }

    public function deleteProduct($id): bool
    {
        $sql = 'DELETE FROM produtos WHERE id = :id';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id', $id);

        return $statement->execute();
    }

    public function updateProduct(Product $product): bool
    {
        $sql = 'UPDATE produtos
                SET nome_produto = :nome_produto,
                    id_categoria = :id_categoria,
                    id_subcategoria = :id_subcategoria,
                    preco = :preco,
                    quantidade = :quantidade,
                    imagem_url = :imagem_url,
                    descricao = :descricao,
                    id_status = :id_status
                WHERE id = :id';

        $statement = $this->pdo->prepare($sql);

        $statement->bindValue(':nome_produto', $product->getNameProduct());
        $statement->bindValue(':id_categoria', $product->getIdCategory());
        $statement->bindValue(':id_subcategoria', $product->getIdSubcategory());
        $statement->bindValue(':preco', $product->getPrice());
        $statement->bindValue(':quantidade', $product->getQuantity());
        $statement->bindValue(':imagem_url', $product->getImageUrl());
        $statement->bindValue(':descricao', $product->getDescription());
        $statement->bindValue(':id_status', $product->getIdStatus());
        $statement->bindValue(':id', $product->getId(), PDO::PARAM_INT);

        return $statement->execute();
    }

    public function findById(int $id): Product
    {
        $sql = 'SELECT * FROM produtos WHERE id = ?';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id, \PDO::PARAM_INT);

        $statement->execute();

        if ($statement->rowCount() !== 1) {
            header('Location: /?erro=produto_inexistente');
            exit();
        }

        $productData = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $this->databaseToModel($productData);
    }

    public function findByCategory(int $idCategory): array
    {
        $sql = 'SELECT * FROM produtos
                WHERE id_categoria = :id_categoria';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id_categoria', $idCategory);

        $statement->execute();

        $databaseProducts = $statement->fetchAll(PDO::FETCH_ASSOC);

        return array_map(
            function ($productData) {
                return $this->databaseToModel($productData);
            },
            $databaseProducts
        );
    }

    public function listCategories(): array
    {
        $sql = 'SELECT * FROM categorias';

        $statement = $this->pdo->query($sql);
        $databaseCategorias = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $databaseCategorias;
    }

    public function listSubcategories(): array
    {
        $sql = 'SELECT * FROM subcategorias';

        $statement = $this->pdo->query($sql);
        $databaseSubcategorias = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $databaseSubcategorias;
    }

    public function listStatus(): array
    {
        $sql = 'SELECT * FROM status_estoque';

        $statement = $this->pdo->query($sql);
        $databaseStatus = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $databaseStatus;
    }

    public function getCategoryFromSubcategory(string $subcategory): string
    {
        $idSub = $this->getIdSubcategory($subcategory);

        $sql = 'SELECT nome_categoria FROM categorias
                JOIN subcategorias s ON c.id_categoria = s.id_categoria
                WHERE id_subcategoria = :id_subcategoria';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id_subcategoria', $idSub);
        $statement->execute();
        $categoria = $statement->fetchColumn();

        return $categoria;
    }

    public function getNameCategory(int $idCategoria): string
    {
        $sql = 'SELECT nome_categoria FROM categorias
                WHERE id_categoria = :id_categoria';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id_categoria', $idCategoria);
        $statement->execute();
        $categoria = $statement->fetchColumn();

        return $categoria;
    }

    public function getIdCategory(string $categoria): int
    {
        $sql = 'SELECT id_categoria FROM categorias
                WHERE nome_categoria = :categoria';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':categoria', $categoria);
        $statement->execute();
        $idCategoria = $statement->fetchColumn();

        return $idCategoria;
    }

    public function getNameSubcategory(int $idSubcategoria): string
    {
        $sql = 'SELECT nome_subcategoria FROM subcategorias
                WHERE id_subcategoria = :id_subcategoria';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id_subcategoria', $idSubcategoria);
        $statement->execute();
        $subcategoria = $statement->fetchColumn();

        return $subcategoria;
    }

    public function getIdSubcategory(string $subcategoria): int
    {
        $sql = 'SELECT id_subcategoria FROM subcategorias
                WHERE nome_subcategoria = :subcategoria';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':subcategoria', $subcategoria);
        $statement->execute();
        $idSubcategoria = $statement->fetchColumn();

        return $idSubcategoria;
    }

    public function getIdStatus(string $nameStatus): int
    {
        $sql = 'SELECT id_status FROM status_estoque
                WHERE nome_status = :nome_status';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':nome_status', $nameStatus);
        $statement->execute();
        $idStatus = $statement->fetchColumn();

        return $idStatus;
    }

    public function getNameStatus(int $idStatus): string
    {
        $sql = 'SELECT nome_status FROM status_estoque
                WHERE id_status = :id_status';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id_status', $idStatus);
        $statement->execute();
        $status = $statement->fetchColumn();

        return $status;

    }
}