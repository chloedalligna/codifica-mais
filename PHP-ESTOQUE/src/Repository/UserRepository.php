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

//    /**
//     * @return PDO
//     */
//    public function getPdo(): PDO
//    {
//        return $this->pdo;
////    }

    // READ ALL
    public function listAll(): array
    {
        $sql = 'SELECT * FROM users';

        $statement = $this->pdo->query($sql);
        $usersData = $statement->fetchAll(PDO::FETCH_ASSOC);

        return array_map(
            function ($oneUserData) {
                return $this->dataToModel($oneUserData);
            },
            $usersData
        );
    }

    // CREATE
    public function create(User $user): bool
    {
        $sql = 'INSERT INTO users (
                      username,
                      email,
                      password)
                VALUES (
                        :username,
                        :email,
                        :password)';

        $statement = $this->pdo->prepare($sql);

        $statement->bindValue(':username', $user->getUsername());
        $statement->bindValue(':email', $user->getEmail());
        $statement->bindValue(':password', $user->getPassword());

        $success = $statement->execute();

        if ($statement->rowCount() !== 1) {
            header('Location: /signup?error=create-row-count-not-1');
            exit();
        }

        $id = $this->pdo->lastInsertId();
        $user->setId(intval($id));

        return $success;
    }

    // DELETE
    public function deleteProduct($id): bool
    {
        $sql = 'DELETE FROM produtos WHERE id = :id';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id', $id);

        return $statement->execute();
    }

    // MAPPER
    public function dataToModel(array $userData): User
    {
        $user =  new User(
            $userData['username'],
            $userData['email'],
            $userData['password']
        );

        $user->setId($userData['id']);

        return $user;
    }

    // READ BY ID
    public function findById(int $id): User
    {
        $sql = 'SELECT * FROM users
                WHERE id = :id';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);

        $statement->execute();

        if ($statement->rowCount() !== 1) {
            header('Location: /?error=findById-row-count-not-1');
            exit();
        }

        $userData = $statement->fetch(\PDO::FETCH_ASSOC);

        return $this->dataToModel($userData);
    }

    // AUTENTICAÇÃO DO LOGIN DO USER
    public function loginAuthentication($email, $password): void
    {
        $sql = 'SELECT * FROM users
                WHERE email = :email';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':email', $email);
        $statement->execute();

        $userData = $statement->fetch(PDO::FETCH_ASSOC);

        $correctPassword = password_verify($password, $userData['password']);

        if ($correctPassword) {
            $_SESSION['username'] = $userData['username'];
            $_SESSION['email'] = $email;
            $_SESSION['logado'] = true;
            header('Location: /?success=user_logged_in');
        } else {
            header('Location: /login?error=loginAuthentication');
        }
    }

    // VERIFICA A DISPONIBILIDADE DO EMAIL ('number' === 0 para estar disponível)
    // (1 cadastro por email)
    public function verifyEmailAvailability(string $email): bool
    {
        $sql = 'SELECT COUNT(*) as number FROM users
                WHERE email = :email';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':email', $email);

        $statement->execute();

        $emailAvailability = $statement->fetch(PDO::FETCH_ASSOC);

        return $emailAvailability['number'] === 0;
    }

}