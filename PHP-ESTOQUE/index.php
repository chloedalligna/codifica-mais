<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <header>
        <span class="botao-opcoes">
            <button popovertarget="popover-menu" popovertargetaction="toggle"><img src="./img/opcoes.png" alt="opcoes"></button>
        </span>
        <span class="botao-home"><a href="">Home</a></span>
        <span class="barra-de-pesquisa">
            <input type="search" id="pesquisa" name="q" placeholder="Pesquise um produto"/>
            <button><img src="/img/lupa.png" alt="lupa"></button>
        </span>
        <span class="botao-avatar"><a href=""><img src="/img/avatar.png" alt="avatar"></a></span>
        <div class="titulo"><h1>Controle de Estoque</h1></div>
    </header>

    <main>

        <!-- <div id="popover-menu" popover="manual" popoverposition="left">
            <h2>Categorias</h2>
            <ul>
                <li><a href="">moveis</a></li>
            </ul>
        </div> -->

        <div class="filtros-aplicados">Filtros aplicados</div>

        <div class="filtros">
            <h2>Filtros</h2>
            <ul>
                <li><a href="">Categorias</a></li>
                <li><a href="">Preços</a></li>
            </ul>
        </div>

        <div class="lista-estoque">
            <table>
                <tr>
                    <th>Imagem</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Subcategoria</th>
                    <th>Categoria</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
                <tr>
                    <tr>
                        <td><img src="" alt="imagem-produto"></td>
                        <td>Cadeira</td>
                        <td>10</td>
                        <td>R$150,00</td>
                        <td>Sala de estar</td>
                        <td>Móveis</td>
                        <td><button>Editar</button></td>
                        <td><button>Excluir</button></td>
                    </tr>
                    <tr>
                        <th>Descrição</th>
                        <td>Piriri póróró</td>
                    </tr>
                </tr>
            </table>
        </div>
    </main>

    <!-- <footer>
    </footer> -->
</body>
</html>