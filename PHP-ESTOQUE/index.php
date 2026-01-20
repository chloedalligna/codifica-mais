<?php

// $pdo = new PDO('mysql:host=localhost;dbname=gestao_estoque', 'root', '');
// $sql1 = "";
// $statement = $pdo->prepare($sql1);
// $statement->execute();

// <?php foreach($categorias as $categoria) {
// <?= $categoria['nome']
// <?php }

// require_once __DIR__ . '/composer/autoload_real.php';
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>

    <header>
        <nav>
            <span class="nav">
                <ul class="nav nav-lista">
                    <li class="nav-item nav-menu-lateral"> 
                        <div class="nav-item-div nav-menu-lateral">
                            <button class="menu-lateral-botao button" onclick="mostrarMenu()">
                                <svg class="menu-lateral icon">
                                    <use href=".\vendor\fortawesome\font-awesome\sprites/solid.svg#bars" />
                                </svg>
                            </button>
                        </div>
                    </li>
                    <li class="nav-item home">
                        <div class="nav-item-div home">
                            <a href="" class="home-botao"><img class="logo" src=".\img\1-removebg-1.png" alt="logo"></a>
                        </div>
                    </li>
                    <li class="nav-item"> 
                        <div class="nav-item-div pesquisador">
                            <input type="search" id="pesquisa" name="q" placeholder=""/>
                            <button type="submit" class="pesquisador button">
                                <svg class="pesquisador icon">
                                    <use href=".\vendor\fortawesome\font-awesome\sprites/solid.svg#magnifying-glass" />
                                </svg>
                            </button>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-item-div login">
                            <button class="login-botao button">
                                Login
                            </button>
                            <a href="" class="login-avatar">
                                <svg class="avatar icon">
                                    <use href=".\vendor\fortawesome\font-awesome\sprites/solid.svg#user" />
                                </svg>
                            </a>
                        </div>
                    </li>
                </ul>
            </span>
        </nav>

    <!-- #1800ad #31edae #c7fae9 #ff751f #ffc099 #ffd9c2 -->

    </header>

    <section>
        <li><a href="" class="botao-adicionar-produto">Adicionar Produto</a></li>
    </section>
    
    <main>
        <!-- <div class="menu-lateral"> -->
            <div class="menu-lateral">
                <div class="menu-lateral-titulo"></div>
                    <h2>Categorias</h2>
                </div>
                <div class="menu-lateral-lista">
                    <ul>
                        <li class="menu-lateral-item"><a href="">Móveis</a></li>
                    </ul>
                </div>
            </div>
        <!-- </div> -->

        <div class="filtros">
            <h2 class="filtros-titulo">Filtros</h2>
            <span class="filtros-lista">
                <ul>
                    <li class="filtros-item"><a href="">Categorias</a></li>
                </ul>
            </span>
        </div>

        <div class="lista-estoque">
            <div class="lista-estoque cabecalho">
                <!-- <span>Imagem</span> -->
                <span class="coluna coluna-produto"><h3>Produto</h3></span>
                <span class="coluna coluna-qtd"><h3>Quantidade</h3></span>
                <span class="coluna coluna-preco"><h3>Preço</h3></span>
                <span class="coluna coluna-subcategoria"><h3>Subcategoria</h3></span>
                <span class="coluna coluna-categoria"><h3>Categoria</h3></span>
                <span class="coluna coluna-botao"><h3>Editar</h3></span>
                <span class="coluna coluna-botao"><h3>Excluir</h3></span>
            </div>
            <div class="lista-estoque itens-estoque">
                <!-- <img src="" alt="imagem-produto"> -->
                <!-- <div class="itens-estoque descricao"><h3>Descrição:</h3>Piriri póróró</div> -->
                <span class="coluna coluna-produto">Cadeira</span>
                <span class="coluna coluna-qtd">10</span>
                <span class="coluna coluna-preco">R$150,00</span>
                <span class="coluna coluna-subcategoria">Sala de estar</span>
                <span class="coluna coluna-categoria">Móveis</span>
                <span class="coluna coluna-botao"><button>Editar</button></span>
                <span class="coluna coluna-botao"><button>Excluir</button></span>
            </div>
        </div>
    </main>

    <!-- <footer>
    </footer> -->
</body>
</html>