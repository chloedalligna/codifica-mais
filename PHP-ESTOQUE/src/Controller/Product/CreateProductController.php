<?php

namespace Chloe\PhpEstoque\Controller\Product;

use Chloe\PhpEstoque\Controller\Controller;
use Chloe\PhpEstoque\Entity\Product;
use Chloe\PhpEstoque\ErrorLogMessage;
use Chloe\PhpEstoque\InvalidException;
use Chloe\PhpEstoque\Repository\ProductRepository;
use DateTime;
use Exception;
use Throwable;

//use http\Exception\InvalidArgumentException;

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
//                header('Location: /create?error=name');
                throw new InvalidException('nome', 'cadastro');
            }

            $subcategoryId = filter_input(INPUT_POST, 'subcategoryName');
            if (empty($subcategoryId)) {
//                header('Location: /create?error=subcategory');
                throw new InvalidException('subcategoria', 'cadastro');
            }

            $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
            if (empty($quantity) && $quantity !== 0) {
//                header('Location: /create?error=quantity');
                throw new InvalidException('quantidade', 'cadastro');
            }

            $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
            if (empty($price)) {
//                header('Location: /create?error=price');
                throw new InvalidException('preço', 'cadastro');
            }

            $description = filter_input(INPUT_POST, 'description');
            if (empty($description)) {
//                header('Location: /create?error=description');
                throw new InvalidException('descrição', 'cadastro');
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
//                    header('Location: /create?error=create');
                    throw new Exception('Erro ao criar o produto. Por favor, tente novamente mais tarde.');

                } else {
                    header('Location: /?success=product_created');
                }

            }
        } catch (InvalidException | Throwable $e) {
            ErrorLogMessage::log($e, $e->getMessage());
        }
    }
}
