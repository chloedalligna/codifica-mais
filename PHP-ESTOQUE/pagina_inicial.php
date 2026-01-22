<?php

// $sql1 = "";
// $statement = $pdo->prepare($sql1);
// $statement->execute();

// <?php foreach($categorias as $categoria) {
// <?= $categoria['nome']
// <?php }

// require_once __DIR__ . '/composer/autoload_real.php';
 
// ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/reset.css">
    <link rel="stylesheet" href="./styles/inicio.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Special+Gothic+Expanded+One&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- CORES DA PAG: #1800ad #31edae #c7fae9 #ff751f #ffc099 #ffd9c2 -->

    <?php include 'header.php'; ?>
    
    <section>
        <li><a href="" class="botao-adicionar-produto">Adicionar Produto</a></li>
    </section>
    
    <main>

    <?php include 'menu_lateral.php'; ?>

        <div class="filtros">
            <h2 class="filtros-titulo">Filtros</h2>
            <div class="filtros-container">
                <ul class="filtros-ul">
                    <?php for($i = 0; $i < 3; $i++): ?>
                    <li class="filtros-li">
                        <div class="filtros-div">
                            <input type="checkbox" id="" name="">
                            <label for="">Categoria X</label>
                        </div>
                        <div class="filtros-div-dropdown">
                            <?php for($i = 0; $i < 3; $i++): ?>
                            <div>
                                <input type="checkbox" id="" name="">
                                <label for="">Subategoria X</label>
                            </div>
                            <?php endfor; ?>
                        </div>
                    </li>
                    <?php endfor; ?>
                    <!-- <li class="filtros-li">
                        <div class="filtros-div">
                            <input type="checkbox" id="categoria_Y" name="categoria_Y" value="Categoria Y">
                            <label for="categoria_Y">Categoria Y</label>
                        </div>
                    </li>
                    <li class="filtros-li">
                        <div class="filtros-div">
                            <input type="checkbox" id="categoria_Z" name="categoria_Z" value="Categoria Z">
                            <label for="categoria_Z">Categoria Z</label>
                        </div>
                    </li>
                    <li class="filtros-li">
                        <div class="filtros-div">
                            <input type="checkbox" id="categoria_W" name="categoria_W" value="Categoria W">
                            <label for="categoria_W">Categoria W</label>
                        </div>
                    </li> -->
                    <li class="filtros-li">
                        <div class="filtros-div filtro-preco">
                            <label for="preco_range">Preço:</label>
                            <!-- Ajustar min="" . $minpreco max="" . $maxpreco -->
                            <input type="range" id="preco_range" name="preco_range" min="0" max="10000">
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="lista-estoque">
            <ul class="lista-estoque-ul">
                <li class="lista-estoque-li">
                    <div class="lista-estoque-div cabecalho">
                        <!-- <span>Imagem</span> -->
                        <span class="coluna coluna-produto"><h3>Produto</h3></span>
                        <span class="coluna coluna-qtd"><h3>Quantidade</h3></span>
                        <span class="coluna coluna-preco"><h3>Preço</h3></span>
                        <span class="coluna coluna-subcategoria"><h3>Subcategoria</h3></span>
                        <span class="coluna coluna-categoria"><h3>Categoria</h3></span>
                        <span class="coluna coluna-botao"><h3>Editar</h3></span>
                        <span class="coluna coluna-botao"><h3>Excluir</h3></span>
                    </div>
                </li>
                <?php for($i = 0; $i < 3; $i++): ?>
                <li class="lista-estoque-li">
                    <div class="lista-estoque-div produto">
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
                </li>
                <?php endfor; ?>
            </ul>
        </div>
    </main>

    <!-- <footer>
    </footer> -->
</body>
</html>