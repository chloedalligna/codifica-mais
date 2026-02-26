<?php

namespace Chloe\PhpEstoque\Controller\Product;

use Chloe\PhpEstoque\Controller\Controller;
use Chloe\PhpEstoque\Entity\Product;
use Chloe\PhpEstoque\ErrorLogMessage;
use Chloe\PhpEstoque\InvalidException;
use Chloe\PhpEstoque\Repository\ProductRepository;
use Exception;
use Throwable;

class CreateProductController implements Controller
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @throws InvalidException
     */
    public function processRequest(): void
    {
        try {

            $name = filter_input(INPUT_POST, 'name');
            if (empty($name)) {
                throw new InvalidException('nome', 'name');
            }

            $subcategoryId = filter_input(INPUT_POST, 'subcategoryName');
            if (empty($subcategoryId)) {
                throw new InvalidException('subcategoria', 'subcategoryName');
            }

            $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
            if ((empty($quantity) || $quantity < 0) && $quantity !== 0) {
                throw new InvalidException('quantidade', 'quantity');
            }

            $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
            if (empty($price) || $price < 0) {
                throw new InvalidException('preço', 'price');
            }

            $description = filter_input(INPUT_POST, 'description');
            if (empty($description)) {
                throw new InvalidException('descrição', 'description');
            }

            if (isset($_POST['create'])) {

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
                    throw new Exception('Erro ao criar o produto. Por favor, tente novamente mais tarde.');

                } else {
                    header('Location: /?success=product_created');
                }

            }
        } catch (InvalidException | Throwable $e) {
            ErrorLogMessage::log($e, $e->getMessage());

            if ($e instanceof InvalidException) {
                $_SESSION['error_message'] = $e->getMessage();
            } else {
                $_SESSION['error_message'] = "Erro ao realizar o cadastro do produto.";
            }
            header('Location: /create?error');
        }
    }
}
