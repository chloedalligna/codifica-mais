<?php

require_once __DIR__ . '/vendor/autoload.php';

use Chloe\PhpEstoque\ConnectionPdo;

$pdo = ConnectionPdo::connect();

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
if (!$email) { // (!$email) => ($email === false || $email === null || $email === '')
    $error_message = 'Por favor, digite um e-mail válido.';
    echo $error_message;
    header('Location: /index.php?erro=email_invalido');
    exit();
}
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
if (!$username) {
    $error_message = 'Por favor, digite um nome de usuário válido.';
    echo $error_message;
    header('Location: /index.php?erro=usuario_invalido');
    exit();
}
$password = filter_input(INPUT_POST, 'password');
if (!$password) {
    $error_message = 'Por favor, digite uma senha válida.';
    echo $error_message;
    header('Location: /index.php?erro=senha_invalida');
    exit();
}

if (isset($email, $username, $password)) {
    $sql = 'SELECT * FROM users WHERE email = :email';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: /dashboard.php');
        exit();
    } else {
        $error_message = 'Invalid email or password.';
    }
}