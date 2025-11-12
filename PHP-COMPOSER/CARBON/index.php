<?php

require "vendor/autoload.php";

use Carbon\Carbon;

$data_atual = new Carbon();
$data_nascimento = Carbon::createFromDate(2005, 8, 24);

$anos_vida = (int) $data_nascimento->diffInYears($data_atual);

$data_aniversario = Carbon::createFromDate(2005, 8, 24)->addYears($anos_vida);

if ($data_atual > $data_aniversario) {
    $data_aniversario->addYear();
}

echo "Faltam " . (int) $data_atual->diffInDays($data_aniversario) . " dias para o meu próximo aniversário." . PHP_EOL;

// echo (int) $meu_aniversario->diffInYears($data_atual) . PHP_EOL;

echo "Eu tenho " . $anos_vida . " anos de vida." . PHP_EOL;

echo "Eu tenho " . (int) $data_nascimento->diffInDays($data_atual) . " dias de vida." . PHP_EOL;

echo "Eu nasci num(a): " . $data_nascimento->format('l') . ".";


