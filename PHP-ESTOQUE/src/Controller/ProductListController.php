<?php

namespace Chloe\PhpEstoque\Controller;

use Chloe\PhpEstoque\Repository\ProductRepository;

class ProductListController implements Controller
{
    private ProductRepository $repository;
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function processRequest(): void
    {
        $databaseSubcategorias = $this->repository->listSubcategories();

        $idCategoria = filter_input(INPUT_GET, 'categoria', FILTER_VALIDATE_INT);

        if ($idCategoria === false || $idCategoria === null) {
            $products = $this->repository->listAllProducts();
        } else {
            $products = $this->repository->findByCategory($idCategoria);
        }

        $databaseCategorias = $this->repository->listCategories();
        require_once __DIR__ . "/../../views/product-list.php";
    }
}

