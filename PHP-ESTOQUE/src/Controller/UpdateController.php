<?php

namespace Chloe\PhpEstoque\Controller;

use Chloe\PhpEstoque\Entity\Product;
use Chloe\PhpEstoque\Repository\ProductRepository;
use Controller;

class UpdateController implements Controller
{
    private ProductRepository $repository;
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function processaRequisicao(): void
    {
        $listSubcategories = $this->repository->listSubcategories();

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id === false) {
            header('Location: /index.php?erro=produto_inexistente');
            exit();
        }

        $nameProduct = filter_input(INPUT_POST, 'nameProduct', FILTER_SANITIZE_STRING);
        if (!$nameProduct) {
            header('Location: /index.php?erro=nome_produto_invalido');
            exit();
        }

        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
        if (!$price) {
            header('Location: /index.php?erro=preco_produto_invalido');
            exit();
        }

        $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
        if (!$quantity) {
            header('Location: /index.php?erro=quantidade_produto_invalido');
            exit();
        }

        $imageUrl = filter_input(INPUT_POST, 'imageUrl', FILTER_SANITIZE_URL);
        if (!$imageUrl) {
            header('Location: /index.php?erro=imagemUrl_produto_invalido');
            exit();
        }

        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        if (!$description) {
            header('Location: /index.php?erro=descricao_produto_invalido');
            exit();
        }

        if (isset($_POST['cadastro'])) {

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

            $result = $this->repository->updateProduct($product);

            if ($result === false) {
                header('Location: /index.php?erro=falha_atualizacao');
            } else {
                header('Location: /index.php?sucesso=produto_atualizado');
            }

        }

    }

}