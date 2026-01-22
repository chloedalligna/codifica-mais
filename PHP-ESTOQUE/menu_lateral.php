<?php

require_once __DIR__ . '/composer/autoload_real.php';

use Chloe\PhpEstoque\ConexaoPDO;
use Chloe\PhpEstoque\Repository\ProdutoRepository;

$pdo = ConexaoPDO::criarConexao();

$produtoRepository = new ProdutoRepository($pdo);

$databaseCategorias = $produtoRepository->listarCategorias();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/reset.css">
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Special+Gothic+Expanded+One&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <script></script>
</head>
<body>

    <!-- CORES DA PAG: #1800ad #31edae #c7fae9 #ff751f #ffc099 #ffd9c2 -->
    
    
    <div class="menu-lateral hidden">
        <div class="menu-lateral-titulo"></div>
            <h2>Categorias</h2>
        </div>
        <div class="menu-lateral-div">
            <ul class="menu-lateral-ul">
                <?php foreach ($databaseCategorias as $chave => $categoria): ?>
                <li class="menu-lateral-li"><a href=""><?= $categoria['nome_categoria'] ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>