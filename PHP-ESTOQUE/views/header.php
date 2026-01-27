<?php

require_once __DIR__ . '/vendor/autoload.php';

use Chloe\PhpEstoque\ConnectionPdo;
use Chloe\PhpEstoque\Repository\ProductRepository;

$pdo = ConnectionPdo::connect();

$productRepository = new ProductRepository($pdo);

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./css/reset-and-body.css">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/menu.css">
    <link rel="stylesheet" href="./css/listagem.css">
    <link rel="stylesheet" href="./css/cadastro.css">
    <link rel="stylesheet" href="./css/editar.css">
    <link rel="stylesheet" href="./css/excluir.css">
<!--    --><?php //=  FA::css(); ?>
<!--    <link rel="stylesheet" href="./public/css/visualizar.css">-->
<!--    <link rel="stylesheet" href="./public/css/footer.css">-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Special+Gothic+Expanded+One&display=swap" rel="stylesheet">
</head>
<body>

    <header>
        <nav>
            <ul class="nav-ul">
                <li class="nav-li nav-menu-lateral">
                    <div class="nav-li-div nav-menu-lateral-div">
                        <button class="nav-menu-lateral-botao button" onclick="switchModal()">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"/></svg>
                        </button>
                    </div>
                </li>
                <li class="nav-li nav-home">
                    <div class="nav-li-div nav-home-div">
                        <a href=".\public\index.php" class="nav-home-botao">
                            <picture>
                                <source srcset=".\assets\2-removebg-2.png" media="(max-width: 790px)">
                                <source srcset=".\assets\1-removebg-1.png" media="(min-width: 1024px)">
                                <img class="logo" src=".\assets\1-removebg-1.png" alt="logo">
                            </picture>
                        </a>
                    </div>
                </li>
                <li class="nav-li nav-pesquisador">
                    <div class="nav-li-div pesquisador-div">
                        <input type="search" id="pesquisa" name="nome_produto" placeholder=""/>
                        <button type="submit" class="pesquisador button" onclick="pesquisar()">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376C296.3 401.1 253.9 416 208 416 93.1 416 0 322.9 0 208S93.1 0 208 0 416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
                        </button>
                    </div>
                </li>
                <li class="nav-li nav-login">
                    <div class="nav-li-div login-div">
                        <button class="login-botao button">
                            LOGIN
                        </button>
<!--                        <a href="" class="login-avatar">-->
<!--                            ICONE-->
<!--                        </a>-->
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <div class="modal">
        <div class="menu-lateral">
            <div class="menu-lateral-content">
                <div class="menu-lateral-titulo">
                    <h2>Categorias</h2>
                </div>
                <div class="menu-lateral-div">
                    <ul class="menu-lateral-ul">
                        <?php foreach ($databaseCategorias as $chave => $categoria): ?>
                            <a href="">
                                <li class="menu-lateral-li">
                                        <?= $categoria['nome_categoria'] ?>
                                </li>
                            </a>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>