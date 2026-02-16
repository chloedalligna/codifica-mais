<?php

namespace Chloe\PhpEstoque;

use PDO;

require_once __DIR__ . '/../config/credencials-database.php';

class ConnectionPdo
{
    public static function connect(): ?PDO
    {
        /** @var string $password */
        return new PDO('mysql:host=localhost;dbname=controle_de_estoque', 'root', $password);
    }

}
