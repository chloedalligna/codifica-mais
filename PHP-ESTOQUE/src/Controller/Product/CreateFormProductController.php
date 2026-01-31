<?php

namespace Chloe\PhpEstoque\Controller\Product;

use Alura\Mvc\Entity\Video;
use Chloe\PhpEstoque\Controller\Controller;
use Chloe\PhpEstoque\Repository\ProductRepository;

class CreateFormProductController implements Controller
{
    private ProductRepository $repository;
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function processRequest(): void
    {
        $listSubcategories = $this->repository->listSubcategories();
//        $listStatus = $this->repository->listStatus();
        $databaseCategorias = $this->repository->listCategories();

        require_once __DIR__ . '/../../views/add-product-form.php';
    }
}