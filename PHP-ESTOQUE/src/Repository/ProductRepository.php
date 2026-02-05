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

    // READ ALL
    public function listAll(): array
    {
        $sql = 'SELECT * FROM products';

        $statement = $this->pdo->query($sql);
        $productsData = $statement->fetchAll(PDO::FETCH_ASSOC);

        return array_map(
            function ($oneProductData) {
                return $this->dataToModel($oneProductData);
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
                      description,
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
                        :status_id)';

//        $sql2 = 'IF EXISTS (SELECT product, c, CONSTRAINT_NAME, REFERENCED_TABLE_NAME, REFERENCED_COLUMN_NAME
//        FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
//        WHERE REFERENCED_TABLE_NAME = referenceTableName AND TABLE_SCHEMA  = schemaName AND TABLE_NAME = mainTableName AND CONSTRAINT_NAME = constraintName
//
//        END IF';

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
            header('Location: /?error=create-row-count-not-1');
            exit();
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
                WHERE id = :id';

        $statement = $this->pdo->prepare($sql);

        $statement->bindValue(':name', $product->getName());
        $statement->bindValue(':category_id', $product->getCategoryId());
        $statement->bindValue(':subcategory_id', $product->getSubcategoryId());
        $statement->bindValue(':quantity', $product->getQuantity());
        $statement->bindValue(':price', $product->getPrice());
        $statement->bindValue(':description', $product->getDescription());
        $statement->bindValue(':image_path', $product->getImagePath());
        $statement->bindValue(':id', $product->getId(), PDO::PARAM_INT);

        $success = $statement->execute();

        if ($statement->rowCount() !== 1) {
            // FIRE ALARM JAVASCRIPT
            header('Location: /?error=update-row-count-not-1');
            exit();
        }

        return $success;
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
    private function dataToModel(array $productData): Product
    {
        $product =  new Product(
            $productData['name'],
            $productData['category_id'],
            $productData['subcategory_id'],
            $productData['quantity'],
            $productData['price'],
            $productData['description'],
            $productData['image_path'],
            $productData['status_id']
        );

        $product->setId($productData['id']);

        return $product;
    }

    // READ BY ID
    public function findById(int $id): Product
    {
        $sql = 'SELECT * FROM products
                WHERE id = :id';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);

        $statement->execute();

        if ($statement->rowCount() !== 1) {
            // FIRE ALARM JAVASCRIPT
            header('Location: /?error=findById-row-count-not-1');
            exit();
        }

        $productData = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->dataToModel($productData);
    }

    // READ BY CATEGORY
    public function findByCategory(int $categoryId): array
    {
        $sql = 'SELECT * FROM products
                WHERE category_id = :category_id';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':category_id', $categoryId);

        $statement->execute();

        $producstData = $statement->fetchAll(PDO::FETCH_ASSOC);

        return array_map(
            function ($oneProductData) {
                return $this->dataToModel($oneProductData);
            },
            $producstData
        );
    }

    // GET CATEGORY ID A PARTIR DA SUBCATEGORY ID (inner join categories table e subcategories table)
    public function getCategoryFromSubcategory(int $subcategoryId): int
    {
        $sql = 'SELECT categories.id
                FROM categories
                INNER JOIN subcategories ON categories.id = subcategories.category_id
                WHERE subcategories.id = :subcategory_id';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':subcategory_id', $subcategoryId, PDO::PARAM_INT);

        $statement->execute();

        return $statement->fetchColumn();
    }

    // GET CATEGORY ID PELO NAME
    public function getCategoryId(string $category): int
    {
        $sql = 'SELECT id FROM categories
                WHERE name = :category';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':category', $category);

        $statement->execute();

        return $statement->fetchColumn();
    }

    // GET SUBCATEGORY ID PELO NAME
    public function getSubcategoryId(string $subcategory): int
    {
        $sql = 'SELECT id FROM subcategories
                WHERE name = :subcategory';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':subcategory', $subcategory);

        $statement->execute();

        return $statement->fetchColumn();
    }

    // GET CATEGORY NAME PELO ID
    public function getCategoryName(int $category): string
    {
        $sql = 'SELECT name FROM categories
                WHERE id = :category';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':category', $category);

        $statement->execute();

        return $statement->fetchColumn();
    }

    // GET SUBCATEGORY NAME PELO ID
    public function getSubcategoryName(int $subcategory): string
    {
        $sql = 'SELECT name FROM subcategories
                WHERE id = :subcategory';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':subcategory', $subcategory);

        $statement->execute();

        return $statement->fetchColumn();
    }

    // LISTA AS CATEGORIAS
    public function listCategories(): array
    {
        $sql = 'SELECT * FROM categories';

        $statement = $this->pdo->query($sql);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // LISTA AS SUBCATEGORIAS
    public function listSubcategories(): array
    {
        $sql = 'SELECT * FROM subcategories';

        $statement = $this->pdo->query($sql);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // LISTA OS STATUS
    public function listStatus(): array
    {
        $sql = 'SELECT * FROM product_status';

        $statement = $this->pdo->query($sql);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}