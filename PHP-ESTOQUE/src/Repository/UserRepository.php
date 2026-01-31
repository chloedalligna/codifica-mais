<?php

namespace Chloe\PhpEstoque\Repository;

use Chloe\PhpEstoque\ConnectionPdo;
use Chloe\PhpEstoque\Entity\User;
use PDO;

class UserRepository
{

    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = ConnectionPdo::connect();
    }

    /**
     * @return PDO
     */
    public function getPdo(): PDO
    {
        return $this->pdo;
    }

    public function databaseToModel(array $userData): User
    {
        $user =  new User(
            $userData['email'],
            $userData['password'],
            $userData['authorization_level']
        );

        $user->setId($userData['id']);

        return $user;
    }

    public function listAllUsers(): array
    {
        $sql = 'SELECT * FROM users';

        $statement = $this->pdo->query($sql);
        $databaseUsers = $statement->fetchAll(PDO::FETCH_ASSOC);

        return array_map(
            function ($userData) {
                return $this->databaseToModel($userData);
            },
            $databaseUsers
        );
    }

    public function addUser(User $user): bool
    {
        $sql = 'INSERT INTO users (
                      username, 
                      email, 
                      password, 
                      authorization_level) 
                VALUES (
                        :username, 
                        :email, 
                        :password, 
                        :authorization_level
                        )';

        $statement = $this->pdo->prepare($sql);

        $statement->bindValue(':username', $user->getUsername());
        $statement->bindValue(':email', $user->getEmail());
        $statement->bindValue(':password', $user->getPassword());
        $statement->bindValue(':authorization_level', $user->getAuthorization());

        $result = $statement->execute();

        if ($statement->rowCount() !== 1) {
            header('Location: /signup?erro=falha_cadastro_usuario');
            exit();
        }

        $id = $this->pdo->lastInsertId();
        $user->setId(intval($id));

        return $result;
    }

//    public function deleteProduct($id): bool
//    {
//        $sql = 'DELETE FROM produtos WHERE id = :id';
//        $statement = $this->pdo->prepare($sql);
//        $statement->bindValue(':id', $id);
//
//        return $statement->execute();
//    }

//    public function updateProduct(Product $product): bool
//    {
//        $sql = 'UPDATE produtos
//                SET nome_produto = :nome_produto,
//                    id_categoria = :id_categoria,
//                    id_subcategoria = :id_subcategoria,
//                    preco = :preco,
//                    quantidade = :quantidade,
//                    imagem_url = :imagem_url,
//                    descricao = :descricao,
//                    id_status = :id_status
//                WHERE id = :id';
//
//        $statement = $this->pdo->prepare($sql);
//
//        $statement->bindValue(':nome_produto', $product->getNameProduct());
//        $statement->bindValue(':id_categoria', $product->getIdCategory());
//        $statement->bindValue(':id_subcategoria', $product->getIdSubcategory());
//        $statement->bindValue(':preco', $product->getPrice());
//        $statement->bindValue(':quantidade', $product->getQuantity());
//        $statement->bindValue(':imagem_url', $product->getImageUrl());
//        $statement->bindValue(':descricao', $product->getDescription());
//        $statement->bindValue(':id_status', $product->getIdStatus());
//        $statement->bindValue(':id', $product->getId(), PDO::PARAM_INT);
//
//        return $statement->execute();
//    }

    public function findById(int $id): User
    {
        $sql = 'SELECT * FROM users WHERE id = ?';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id, \PDO::PARAM_INT);

        $statement->execute();

        if ($statement->rowCount() !== 1) {
            header('Location: /?erro=user_inexistente');
            exit();
        }

        $userData = $statement->fetch(\PDO::FETCH_ASSOC);

        return $this->databaseToModel($userData);
    }

    public function authenticateUser($email, $password): User
    {
        $sql = 'SELECT * FROM users 
                WHERE email = :email';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':email', $email);
        $statement->execute();

        $userData = $statement->fetch(PDO::FETCH_ASSOC);

        $correctPassword = $password == $userData['password'];

//        echo "<pre>";
//
//        var_dump($_POST, $correctPassword, $userData, $password);
//
//        echo "</pre>";
//        die();



        if ($correctPassword) {
            $_SESSION['email'] = $email;
            $_SESSION['logado'] = true;
            header('Location: /?sucesso=usuario_logado');
            exit();
        } else {
            header('Location: /login?erro=credenciais_invalidas');
            exit();
        }


    }

}