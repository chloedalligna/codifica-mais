<?php

if (!array_key_exists('PATH_INFO', $_SERVER) || ($_SERVER['PATH_INFO'] === '/')) {
    require_once 'pagina_inicial.php';
    
} elseif ($_SERVER['PATH_INFO'] === '/cadastro') {
    
    if ($_SERVER['REQUEST_METHOD'] === $_GET) {
        require_once 'cadastrar_produto.php';

    } elseif ($_SERVER['REQUEST_METHOD'] === $_POST) {
        require_once 'pagina_inicial.php';
    }
}  elseif ($_SERVER['PATH_INFO'] === '/edicao') {

    if ($_SERVER['REQUEST_METHOD'] === $_GET) {
        require_once 'cadastrar_produto.php';

    } elseif ($_SERVER['REQUEST_METHOD'] === $_POST) {
        require_once 'editar_produto.php';
    }
} elseif ($_SERVER['PATH_INFO'] === '/exclusao') {

    if ($_SERVER['REQUEST_METHOD'] === $_GET) {
        require_once 'excluir_produto.php';

    } elseif ($_SERVER['REQUEST_METHOD'] === $_POST) {
        require_once 'pagina_inicial.php';
    }
}