<?php

namespace Chloe\PhpEstoque\Controller\Product;

use Chloe\PhpEstoque\Controller\Controller;
use Chloe\PhpEstoque\Entity\Product;
use Chloe\PhpEstoque\Repository\ProductRepository;

class UpdateProductController implements Controller
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function processRequest(): void
    {
//        $listSubcategories = $this->productRepository->listSubcategories();

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id === false || $id === null) {
            header('Location: /?error=id');
            exit();
        }

        $name = filter_input(INPUT_POST, 'name');
        if ($name === false || $name === null) {
            header('Location: /?error=name');
            exit();
        }

        $subcategoryId = filter_input(INPUT_POST, 'subcategoryName', FILTER_VALIDATE_INT);
        if ($subcategoryId === false || $subcategoryId === null) {
            header('Location: /create?error=subcategory');
            exit();
        }

        $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
        if ($quantity === false || $quantity === null) {
            header('Location: /?error=quantity');
            exit();
        }

        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
        if ($price === false || $price === null) {
            header('Location: /?error=price');
            exit();
        }

        $description = filter_input(INPUT_POST, 'description');
        if ($description === false || $description === null) {
            header('Location: /?error=description');
            exit();
        }

        if (isset($_POST['update'])) {

            $categoryId = $this->productRepository->getCategoryFromSubcategory($subcategoryId);

            $product = new Product(
                $name,
                $categoryId,
                $subcategoryId,
                $quantity,
                $price,
                $description);

            $product->setId($id);

            if (isset($_FILES['image'])){
                $product->setImagePath(uniqid() . $_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'], $product->getImageDir());
            }

            $success = $this->productRepository->update($product);

            if ($success === false) {
                header('Location: /?error=update');
            } else {
                header('Location: /?success=product_updated');
            }

        }

    }

}