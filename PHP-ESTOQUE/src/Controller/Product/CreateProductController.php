<?php

namespace Chloe\PhpEstoque\Controller\Product;

use Chloe\PhpEstoque\Controller\Controller;
use Chloe\PhpEstoque\Entity\Product;
use Chloe\PhpEstoque\Repository\ProductRepository;

class CreateProductController implements Controller
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function processRequest(): void
    {

        $name = filter_input(INPUT_POST, 'name');
        if ($name === false || $name === null) {
            header('Location: /create?error=name');
            exit();
        }

        $subcategoryId = filter_input(INPUT_POST, 'subcategoryName');
        if (empty($subcategoryId)) {
            header('Location: /create?error=subcategory');
            exit();
        }

        $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
        if ($quantity === false || $quantity === null) {
            header('Location: /create?error=quantity');
            exit();
        }

        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
        if ($price === false || $price === null) {
            header('Location: /create?error=price');
            exit();
        }

        $description = filter_input(INPUT_POST, 'description');
        if ($description === false || $description === null) {
            header('Location: /create?error=description');
            exit();
        }

        if (isset($_POST['create'])){

            $categoryId = $this->productRepository->getCategoryFromSubcategory($subcategoryId);

            $product = new Product(
                $name,
                $categoryId,
                $subcategoryId,
                $quantity,
                $price,
                $description);

            if (isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])) {
                $product->setImagePath(uniqid() . $_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'], $product->getImageDir());
            }

            $success = $this->productRepository->create($product);

            if ($success === false) {
                header('Location: /create?error=create');

            } else {
                header('Location: /?success=product_created');
            }

        }
    }
}
