<?php

namespace Chloe\PhpEstoque\Controller;

use Chloe\PhpEstoque\Repository\ProductRepository;
use Controller;

class ListController implements Controller
{
    private ProductRepository $repository;
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function processaRequisicao(): void
    {
        $databaseSubcategorias = $this->repository->listSubcategories();
        $products = $this->repository->listAllProducts();
        require_once __DIR__ . "/../../views/listagem-produtos.php.";
    }
}

