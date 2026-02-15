<?php

namespace Chloe\PhpEstoque;
use DateTime;

class ErrorLogMessage
{
    public static function log($error, string $displayMessage): void
    {
        $datetime = new DateTime();

        echo "<p style='font-size: 30px'>" . $displayMessage . "</p>";

        $logMessage = '[' . date_format($datetime, "d/m/Y H:i:s") . '] Erro [' . $error->getCode() . ']: ' . $error->getMessage() . '; arquivo ' . $error->getFile() . '; linha ' . $error->getLine() . '; stack ' . $error->getTraceAsString() . PHP_EOL . PHP_EOL;

        error_log($logMessage, 3, __DIR__ . '/../config/erros.log');
    }
}

