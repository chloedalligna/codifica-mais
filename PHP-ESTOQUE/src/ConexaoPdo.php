<?php

namespace Chloe\PhpEstoque;

use PDO;

class ConexaoPDO {

    public static function criarConexao(): PDO
    {
        return new PDO('mysql:host=localhost;dbname=gestao_estoque', 'root', '');
    }

}
