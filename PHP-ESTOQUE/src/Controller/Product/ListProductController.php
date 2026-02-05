<?php

namespace Chloe\PhpEstoque\Controller\Product;

use Chloe\PhpEstoque\Controller\Controller;
use Chloe\PhpEstoque\Entity\Product;
use Chloe\PhpEstoque\Repository\ProductRepository;

class ListProductController implements Controller
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function processRequest(): void
    {
        // REQUISIÇÕES HEADER
        $categoryId = filter_input(INPUT_GET, 'category', FILTER_VALIDATE_INT);
        if ($categoryId === false || $categoryId === null) {
            $products = $this->productRepository->listAll();
        } else {
            $products = $this->productRepository->findByCategory($categoryId);
        }
        $listCategories = $this->productRepository->listCategories();
        // FIM REQUISIÇÕES HEADER

        require_once __DIR__ . "/../../../views/Product/list-product.php";
    }
}

