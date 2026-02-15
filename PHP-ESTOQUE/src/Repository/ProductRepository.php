<?php

namespace Chloe\PhpEstoque\Repository;

use Chloe\PhpEstoque\Entity\Product;
use Chloe\PhpEstoque\ConnectionPdo;
use Chloe\PhpEstoque\ErrorLogMessage;
use DateTime;
use PDO;
use PDOException;

class ProductRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = ConnectionPdo::connect();
    }

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
        try {
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

        } catch (PDOException $e) {
//            if ($statement->rowCount() !== 1) {
//                header('Location: /?error=update-row-count-not-1');
//            }

            ErrorLogMessage::log($e, $e->getMessage());
            return false;
        }

        $id = $this->pdo->lastInsertId();
        $product->setId(intval($id));

        return $success;
    }

    // UPDATE
    public function update(Product $product): bool
    {
        try {
            $sql = 'UPDATE products
                    SET name = :name,
                        category_id = :category_id,
                        subcategory_id = :subcategory_id,
                        quantity = :quantity,
                        price = :price,
                        description = :description,
                        image_path = :image_path,
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

            $success = $statement->execute();
        } catch (PDOException $e) {
//            if ($statement->rowCount() !== 1) {
//                header('Location: /?error=update-row-count-not-1');
//            }

            ErrorLogMessage::log($e, $e->getMessage());
            return false;
        }

        return $success;
    }

    // DELETE
    public function delete($id): bool
    {
            $sql = 'DELETE FROM products
                    WHERE id = :id';

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);

            return $statement->execute();

        } catch (PDOException $e) {
            ErrorLogMessage::log($e, $e->getMessage());
            return false;
        }
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
    public function findById(int $id): ?Product
    {
            $sql = 'SELECT * FROM products
                    WHERE id = :id';

        try {
                $statement = $this->pdo->prepare($sql);
                $statement->bindValue(':id', $id, PDO::PARAM_INT);

                $statement->execute();

        } catch (PDOException $e) {
//            if ($statement->rowCount() !== 1) {
//                // FIRE ALARM JAVASCRIPT
//                header('Location: /?error=findById-row-count-not-1');
//            }

            ErrorLogMessage::log($e, $e->getMessage());
            return null;
        }

        $productData = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->dataToModel($productData);
    }

    // READ BY CATEGORY
    public function findByCategory(int $categoryId): ?array
    {
            $sql = 'SELECT * FROM products
                    WHERE category_id = :category_id';

        try {
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

        } catch (PDOException $e) {
            ErrorLogMessage::log($e, $e->getMessage());
            return null;
        }
    }

    // GET CATEGORY ID A PARTIR DA SUBCATEGORY ID (inner join categories table e subcategories table)
    public function getCategoryFromSubcategory(int $subcategoryId): int
    {
        $sql = 'SELECT categories.id
                FROM categories
                INNER JOIN subcategories ON categories.id = subcategories.category_id
                WHERE subcategories.id = :subcategory_id';

        try {
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':subcategory_id', $subcategoryId, PDO::PARAM_INT);

        $statement->execute();

        } catch (PDOException $e) {
            ErrorLogMessage::log($e, $e->getMessage());

        } finally {
            return $statement->fetchColumn();
        }
    }

    // GET CATEGORY ID PELO NAME
    public function getCategoryId(string $category): int
    {
        $sql = 'SELECT id FROM categories
                WHERE name = :category';

        try {
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':category', $category);

        $statement->execute();

        } catch (PDOException $e) {
            ErrorLogMessage::log($e, $e->getMessage());

        } finally {
            return $statement->fetchColumn();
        }
    }

    // GET SUBCATEGORY ID PELO NAME
    public function getSubcategoryId(string $subcategory): int
    {
        $sql = 'SELECT id FROM subcategories
                WHERE name = :subcategory';

        try {
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':subcategory', $subcategory);

        $statement->execute();

        } catch (PDOException $e) {
            ErrorLogMessage::log($e, $e->getMessage());

        } finally {
            return $statement->fetchColumn();
        }
    }

    // GET CATEGORY NAME PELO ID
    public function getCategoryName(int $category): string
    {
        $sql = 'SELECT name FROM categories
                WHERE id = :category';

        try {
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':category', $category);

        $statement->execute();

        } catch (PDOException $e) {
            ErrorLogMessage::log($e, $e->getMessage());

        } finally {
            return $statement->fetchColumn();
        }
    }

    // GET SUBCATEGORY NAME PELO ID
    public function getSubcategoryName(int $subcategory): string
    {
        $sql = 'SELECT name FROM subcategories
                WHERE id = :subcategory';

        try {
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':subcategory', $subcategory);

        $statement->execute();

        } catch (PDOException $e) {
            ErrorLogMessage::log($e, $e->getMessage());

        } finally {
            return $statement->fetchColumn();
        }
    }

    // LISTA AS CATEGORIAS
    public function listCategories(): array
    {
        $sql = 'SELECT * FROM categories';

        try {
        $statement = $this->pdo->query($sql);

        return $statement->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            ErrorLogMessage::log($e, $e->getMessage());
            return [];
        }
    }

    // LISTA AS SUBCATEGORIAS
    public function listSubcategories(): array
    {
        $sql = 'SELECT * FROM subcategories';

        try {
        $statement = $this->pdo->query($sql);

        return $statement->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            ErrorLogMessage::log($e, $e->getMessage());
            return [];
        }
    }

    // LISTA OS STATUS
    public function listStatus(): array
    {
        $sql = 'SELECT * FROM product_status';

        try {
        $statement = $this->pdo->query($sql);

        return $statement->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            ErrorLogMessage::log($e, $e->getMessage());
            return [];
        }
    }

}