<?php

namespace Chloe\PhpEstoque\Controller;

use Chloe\PhpEstoque\Repository\ProductRepository;
use Controller;
use PDO;

class FormController implements Controller
{
    private ProductRepository $repository;
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function processaRequisicao(): void
    {
        $listSubcategories = $this->repository->listSubcategories();
        $listStatus = $this->repository->listStatus();

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id) { // ($id) => ($id !== false && $id !== null)
            $statement = $this->repository->getPdo()->prepare("SELECT * FROM products WHERE id = :id");
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->execute();

            if ($statement->rowCount() !== 1) {
                header('Location: /index.php?erro=produto_inexistente');
                exit();
            }

            $product = $statement->fetch(PDO::FETCH_ASSOC);
        }
    }
}