<?php

namespace Chloe\PhpEstoque\Controller;

use Chloe\PhpEstoque\Repository\ProductRepository;
use Controller;

class DeleteController implements Controller
{
    private ProductRepository $repository;
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id === false) {
            header('Location: /index.php?erro=produto_inexistente');
            exit();
        }

        $result = $this->repository->deleteProduct($id);

        if ($result === false) {
            header('Location: /index.php?erro=falha_exclusao');

        } else {
            header('Location: /index.php?sucesso=produto_excluido');
        }
    }
}