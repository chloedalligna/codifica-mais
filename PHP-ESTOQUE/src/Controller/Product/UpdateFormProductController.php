<?php

namespace Chloe\PhpEstoque\Controller\Product;

use Alura\Mvc\Entity\Video;
use Chloe\PhpEstoque\Controller\Controller;
use Chloe\PhpEstoque\Repository\ProductRepository;

class UpdateFormProductController implements Controller
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

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id !== false && $id !== null) {
            $product = $this->productRepository->findById($id);
        }

        // Se utilizasse o mesmo view de form para cadastro e edição
//        /** @var ?Product $product */
//        $product = null;

        $listSubcategories = $this->productRepository->listSubcategories();

        require_once __DIR__ . '/../../../views/Product/update-form-product.php';

    }
}