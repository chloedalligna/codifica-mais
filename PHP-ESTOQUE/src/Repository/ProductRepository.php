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
//
//    /**
//     * @return PDO
//     */
//    public function getPdo(): PDO
//    {
//        return $this->pdo;
//    }

    // READ
    public function listAll(): array
    {
        $sql = 'SELECT * FROM products';

        $statement = $this->pdo->query($sql);
        $productsData = $statement->fetchAll(PDO::FETCH_ASSOC);

        return array_map(
            function ($oneProductData) {
                return $this->databaseToModel($oneProductData);
            },
            $productsData
        );
    }

    // CREATE
    public function create(Product $product): bool
    {
        $sql = 'INSERT INTO products (
                      name,
                      category_id,
                      subcategory_id,
                      quantity,
                      price,
                      description
                      image_path,
                      status_id)
                VALUES (
                        :name,
                        :category_id,
                        :subcategory_id,
                        :quantity,
                        :price,
                        :description,
                        :image_path,
                        :status_id) ';

        $statement = $this->pdo->prepare($sql);

        $statement->bindValue(':name', $product->getName());
        $statement->bindValue(':category_id', $product->getCategoryId());
        $statement->bindValue(':subcategory_id', $product->getSubcategoryId());
        $statement->bindValue(':quantity', $product->getQuantity());
        $statement->bindValue(':price', $product->getPrice());
        $statement->bindValue(':description', $product->getDescription());
        $statement->bindValue(':image_path', $product->getImagePath());
        $statement->bindValue(':status_id', $product->getStatusId());

        $success = $statement->execute();

        if ($statement->rowCount() !== 1) {
            // FIRE ALARM JAVASCRIPT
            header('Location: /?error=row-count-not-1');
            exit();
//            throw new \Exception('Falha ao cadastrar o produto no banco de dados.');
        }

        $id = $this->pdo->lastInsertId();
        $product->setId(intval($id));

        return $success;
    }

    // UPDATE
    public function update(Product $product): bool
    {

        $sql = 'UPDATE products
                SET name = :name,
                    category_id = :category_id,
                    subcategory_id = :subcategory_id,
                    quantity = :quantity,
                    price = :price,
                    description = :description,
                    image_path = :image_path
                    status_id = :status_id
                WHERE id = :id';

        $statement = $this->pdo->prepare($sql);

        $statement->bindValue(':name', $product->getName());
        $statement->bindValue(':category_id', $product->getCategoryId());
        $statement->bindValue(':subcategory_id', $product->getSubcategoryId());
        $statement->bindValue(':quantity', $product->getQuantity());
        $statement->bindValue(':price', $product->getPrice());
        $statement->bindValue(':description', $product->getDescription());
        $statement->bindValue(':image_path', $product->getImagePath());
        $statement->bindValue(':status_id', $product->getStatusId());
        $statement->bindValue(':id', $product->getId(), PDO::PARAM_INT);

        return $statement->execute();
    }

    // DELETE
    public function delete($id): bool
    {
        $sql = 'DELETE FROM products
                WHERE id = :id';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);

        return $statement->execute();
    }

    // MAPPER
    public function databaseToModel(array $productData): Product
    {
        $product =  new Product(
                    $productData['name'],
                    $productData['category_id'],
                    $productData['subcategory_id'],
                    $productData['quantity'],
                    $productData['price'],
                    $productData['description'],
                    $productData['image_path'],
//                    $productData['status_id']
                    );

        $product->setId($productData['id']);

        return $product;
    }
//
//
//
//
//

//
//
//
//    public function findById(int $id): Product
//    {
//        $sql = 'SELECT * FROM produtos WHERE id = ?';
//
//        $statement = $this->pdo->prepare($sql);
//        $statement->bindValue(1, $id, \PDO::PARAM_INT);
//
//        $statement->execute();
//
//        if ($statement->rowCount() !== 1) {
//            header('Location: /?erro=produto_inexistente');
//            exit();
//        }
//
//        $productData = $statement->fetchAll(PDO::FETCH_ASSOC);
//
//        return $this->databaseToModel($productData);
//    }
//
//    public function findByCategory(int $idCategory): array
//    {
//        $sql = 'SELECT * FROM produtos
//                WHERE id_categoria = :id_categoria';
//
//        $statement = $this->pdo->prepare($sql);
//        $statement->bindValue(':id_categoria', $idCategory);
//
//        $statement->execute();
//
//        $databaseProducts = $statement->fetchAll(PDO::FETCH_ASSOC);
//
//        return array_map(
//            function ($productData) {
//                return $this->databaseToModel($productData);
//            },
//            $databaseProducts
//        );
//    }
//
//    public function listCategories(): array
//    {
//        $sql = 'SELECT * FROM categorias';
//
//        $statement = $this->pdo->query($sql);
//        $databaseCategorias = $statement->fetchAll(PDO::FETCH_ASSOC);
//
//        return $databaseCategorias;
//    }
//
//    public function listSubcategories(): array
//    {
//        $sql = 'SELECT * FROM subcategorias';
//
//        $statement = $this->pdo->query($sql);
//        $databaseSubcategorias = $statement->fetchAll(PDO::FETCH_ASSOC);
//
//        return $databaseSubcategorias;
//    }
//
//    public function listStatus(): array
//    {
//        $sql = 'SELECT * FROM status_estoque';
//
//        $statement = $this->pdo->query($sql);
//        $databaseStatus = $statement->fetchAll(PDO::FETCH_ASSOC);
//
//        return $databaseStatus;
//    }
//
//    public function getCategoryFromSubcategory(string $subcategory): string
//    {
//        $idSub = $this->getIdSubcategory($subcategory);
//
//        $sql = 'SELECT nome_categoria FROM categorias c
//                JOIN subcategorias s ON c.id_categoria = s.id_categoria
//                WHERE id_subcategoria = :id_subcategoria';
//
//        $statement = $this->pdo->prepare($sql);
//        $statement->bindValue(':id_subcategoria', $idSub);
//        $statement->execute();
//        $categoria = $statement->fetchColumn();
//
//        return $categoria;
//    }
//
//    public function getNameCategory(int $idCategoria): string
//    {
//        $sql = 'SELECT nome_categoria FROM categorias
//                WHERE id_categoria = :id_categoria';
//
//        $statement = $this->pdo->prepare($sql);
//        $statement->bindValue(':id_categoria', $idCategoria);
//        $statement->execute();
//        $categoria = $statement->fetchColumn();
//
//        return $categoria;
//    }
//
//    public function getIdCategory(string $categoria): int
//    {
//        $sql = 'SELECT id_categoria FROM categorias
//                WHERE nome_categoria = :categoria';
//
//        $statement = $this->pdo->prepare($sql);
//        $statement->bindValue(':categoria', $categoria);
//        $statement->execute();
//        $idCategoria = $statement->fetchColumn();
//
//        return $idCategoria;
//    }
//
//    public function getNameSubcategory(int $idSubcategoria): string
//    {
//        $sql = 'SELECT nome_subcategoria FROM subcategorias
//                WHERE id_subcategoria = :id_subcategoria';
//
//        $statement = $this->pdo->prepare($sql);
//        $statement->bindValue(':id_subcategoria', $idSubcategoria);
//        $statement->execute();
//        $subcategoria = $statement->fetchColumn();
//
//        return $subcategoria;
//    }
//
//    public function getIdSubcategory(string $subcategoria): int
//    {
//        $sql = 'SELECT id_subcategoria FROM subcategorias
//                WHERE nome_subcategoria = :subcategoria';
//
//        $statement = $this->pdo->prepare($sql);
//        $statement->bindValue(':subcategoria', $subcategoria);
//        $statement->execute();
//        $idSubcategoria = $statement->fetchColumn();
//
//        return $idSubcategoria;
//    }
//
//    public function getIdStatus(string $nameStatus): int
//    {
//        $sql = 'SELECT id_status FROM status_estoque
//                WHERE nome_status = :nome_status';
//
//        $statement = $this->pdo->prepare($sql);
//        $statement->bindValue(':nome_status', $nameStatus);
//        $statement->execute();
//        $idStatus = $statement->fetchColumn();
//
//        return $idStatus;
//    }
//
//    public function getNameStatus(int $idStatus): string
//    {
//        $sql = 'SELECT nome_status FROM status_estoque
//                WHERE id_status = :id_status';
//
//        $statement = $this->pdo->prepare($sql);
//        $statement->bindValue(':id_status', $idStatus);
//        $statement->execute();
//        $status = $statement->fetchColumn();
//
//        return $status;
//
//    }
}