<?php

namespace Chloe\PhpEstoque\Controller\Product;

use Chloe\PhpEstoque\Controller\Controller;
use Chloe\PhpEstoque\Repository\ProductRepository;

class DeleteProductController implements Controller
{
    private ProductRepository $repository;
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function processRequest(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id === false) {
            header('Location: /?erro=produto_inexistente');
            exit();
        }

        $result = $this->repository->deleteProduct($id);

        if ($result === false) {
            header('Location: /?erro=falha_exclusao');

        } else {
            header('Location: /?sucesso=produto_excluido');
        }
    }
}