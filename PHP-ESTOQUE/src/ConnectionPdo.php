<?php

namespace Chloe\PhpEstoque;

use PDO;

$GLOBALS['databasePassword'] = require_once __DIR__ . "/../config/database_credentials.php";

class ConnectionPdo
{
    public static function connect(): PDO
    {
        return new PDO('mysql:host=localhost;dbname=controle_de_estoque', 'root', $GLOBALS['databasePassword']);
    }

}
