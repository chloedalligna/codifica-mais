<?php

namespace Chloe\PhpEstoque\Controller\Product;

use Chloe\PhpEstoque\Controller\Controller;
use Chloe\PhpEstoque\Entity\Product;
use Chloe\PhpEstoque\ErrorLogMessage;
use Chloe\PhpEstoque\InvalidException;
use Chloe\PhpEstoque\Repository\ProductRepository;
use Exception;
use http\Exception\InvalidArgumentException;
use Throwable;

class UpdateProductController implements Controller
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

            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            if (empty($id)) {
//                header('Location: /?error=id');
                throw new InvalidArgumentException();
            }

            $name = filter_input(INPUT_POST, 'name');
            if (empty($name)) {
//                header('Location: /?error=name');
                throw new InvalidException('nome', 'edição');
            }

            $subcategoryId = filter_input(INPUT_POST, 'subcategoryName', FILTER_VALIDATE_INT);
            if (empty($subcategoryId)) {
//                header('Location: /?error=subcategory');
                throw new InvalidException('subcategoria', 'edição');
            }

            $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
            if (empty($quantity) && $quantity !== 0) {
//                header('Location: /?error=quantity');
                throw new InvalidException('quantidade', 'edição');
            }

            $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
            if (empty($price) ) {
//                header('Location: /?error=price');
                throw new InvalidException('preço', 'edição');
            }

            $description = filter_input(INPUT_POST, 'description');
            if (empty($description)) {
//                header('Location: /?error=description');
                throw new InvalidException('descrição', 'edição');
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
//                    header('Location: /?error=update');
                    throw new Exception('Erro ao editar o produto. Por favor, tente novamente mais tarde.');

                } else {
                    header('Location: /?success=product_updated');
                }

            }

        } catch (InvalidException | Throwable $e) {
            ErrorLogMessage::log($e, $e->getMessage());
        }

    }

}