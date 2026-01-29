<?php

namespace Chloe\PhpEstoque\Controller;

use Alura\Mvc\Entity\Video;
use Chloe\PhpEstoque\Entity\Product;
use Chloe\PhpEstoque\Repository\ProductRepository;
use PDO;

class UpdateProductFormController implements Controller
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

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

//        /** @var ?Product $product */
//        $product = null;

        if ($id !== false && $id !== null) {

            $product = $this->repository->findById($id);

        }

        $databaseCategorias = $this->repository->listCategories();

        require_once __DIR__ . '/../../views/update-product-form.php';

    }
}