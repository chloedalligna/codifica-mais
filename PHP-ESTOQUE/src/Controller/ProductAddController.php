<?php

namespace Chloe\PhpEstoque\Controller;

use Chloe\PhpEstoque\Entity\Product;
use Chloe\PhpEstoque\Repository\ProductRepository;

class ProductAddController implements Controller
{
    private ProductRepository $repository;
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function processRequest(): void
    {
        $nameProduct = filter_input(INPUT_POST, 'nameProduct', FILTER_SANITIZE_STRING);
        if ($nameProduct === false || $nameProduct === null) {
            header('Location: /?erro=nome_produto_invalido');
            exit();
        }

        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
        if ($price === false || $price === null) {
            header('Location: /?erro=preco_produto_invalido');
            exit();
        }

        $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
        if ($quantity === false || $quantity === null) {
            header('Location: /?erro=quantidade_produto_invalido');
            exit();
        }

        $imageUrl = filter_input(INPUT_POST, 'imageUrl', FILTER_SANITIZE_URL);
        if ($imageUrl === false || $imageUrl === null) {
            header('Location: /?erro=imagemUrl_produto_invalido');
            exit();
        }

        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        if ($description === false || $description === null) {
            header('Location: /?erro=descricao_produto_invalido');
            exit();
        }
        if (isset($_POST['cadastro'])){

            $nameSubcategory = $_POST['nameSubcategory'];
            $nameCategory = $this->repository->getCategoryFromSubcategory($_POST['nameSubcategory']);
            $idStatus = $this->repository->getIdStatus($_POST['nameStatus']);

            $product = new Product(
                $nameProduct,
                $nameCategory,
                $nameSubcategory,
                $price,
                $quantity,
                $imageUrl,
                $description,
                $idStatus);

            $result = $this->repository->addProduct($product);

            if ($result === false) {
                header('Location: /?erro=falha_cadastro');

            } else {
                header('Location: /?sucesso=produto_cadastrado');
            }

        }
    }
}