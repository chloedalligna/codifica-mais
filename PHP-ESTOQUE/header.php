<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/reset.css">
    <link rel="stylesheet" href="./styles/header.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Special+Gothic+Expanded+One&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>

<header>
        <nav>
            <ul class="nav-ul">
                <li class="nav-li nav-menu-lateral"> 
                    <div class="nav-li-div nav-menu-lateral-div">
                        <button class="nav-menu-lateral-botao button" onclick="mostrarMenu()">
                            <svg class="nav-menu-lateral icon">
                                <use href=".\vendor\fortawesome\font-awesome\sprites/solid.svg#bars" />
                            </svg>
                        </button>
                    </div>
                </li>
                <li class="nav-li nav-home">
                    <div class="nav-li-div nav-home-div">
                        <a href=".\index.php" class="nav-home-botao">
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
                            <svg class="pesquisador icon">
                                <use href=".\vendor\fortawesome\font-awesome\sprites/solid.svg#magnifying-glass" />
                            </svg>
                        </button>
                    </div>
                </li>
                <li class="nav-li nav-login">
                    <div class="nav-li-div login-div">
                        <button class="login-botao button">
                            LOGIN
                        </button>
                        <a href="" class="login-avatar">
                            <svg class="avatar icon">
                                <use href=".\vendor\fortawesome\font-awesome\sprites/solid.svg#user" />
                            </svg>
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
