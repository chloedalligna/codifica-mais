<?php

require __DIR__ . '/vendor/autoload.php';

use ContaBancaria\ContaCorrente;
use ContaBancaria\ContaPoupanca;

$contaGabriel = new ContaCorrente('Gabriel', 10000);
$contaIan = new ContaPoupanca('Ian', 5000);

$contaGabriel->exibirSaldo();
$contaIan->exibirSaldo();

$contaGabriel->transferirDinheiro($contaIan, 100);

$contaGabriel->exibirSaldo();
$contaIan->exibirSaldo();


$contaGabriel->sacar(500);
$contaGabriel->exibirSaldo();


$contaIan->sacar(45);
$contaIan->exibirSaldo();


$contaGabriel->depositar(200);
$contaGabriel->exibirSaldo();

$contaIan->depositar(400);
$contaIan->exibirSaldo();

$contaIan->aplicarRendimento();
$contaIan->exibirSaldo();
$contaIan->aplicarRendimento();
$contaIan->exibirSaldo();

