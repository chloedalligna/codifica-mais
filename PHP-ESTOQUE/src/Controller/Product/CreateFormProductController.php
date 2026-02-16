<?php

namespace Chloe\PhpEstoque\Controller\Product;

use Chloe\PhpEstoque\Controller\Controller;
use Chloe\PhpEstoque\Repository\ProductRepository;

class CreateFormProductController implements Controller
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
        if (empty($categoryId)) {
            $products = $this->productRepository->listAll();
        } else {
            $products = $this->productRepository->findByCategory($categoryId);
        }
        $listCategories = $this->productRepository->listCategories();
        // FIM REQUISIÇÕES HEADER

        $listSubcategories = $this->productRepository->listSubcategories();

        require_once __DIR__ . '/../../../views/Product/create-form-product.php';
    }
}