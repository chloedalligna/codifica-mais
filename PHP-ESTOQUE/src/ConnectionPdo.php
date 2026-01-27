<?php

namespace Chloe\PhpEstoque;

use PDO;

class ConnectionPdo
{
    public static function connect(): PDO
    {
        return new PDO('mysql:host=localhost;dbname=gestao_estoque', 'root', '.10Bienieck.10');
    }

}
