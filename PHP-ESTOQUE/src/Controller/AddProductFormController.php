<?php

namespace Chloe\PhpEstoque\Controller;

use Alura\Mvc\Entity\Video;
use Chloe\PhpEstoque\Entity\Product;
use Chloe\PhpEstoque\Repository\ProductRepository;
use PDO;

class AddProductFormController implements Controller
{
    private ProductRepository $repository;
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function processRequest(): void
    {
        $listSubcategories = $this->repository->listSubcategories();
        $listStatus = $this->repository->listStatus();
        $databaseCategorias = $this->repository->listCategories();

        require_once __DIR__ . '/../../views/add-product-form.php';
    }
}