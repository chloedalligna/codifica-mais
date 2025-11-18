<?php 

class ContaBancaria {

    private $numeroConta;
    private $nomeTitular;
    private $saldo;

    public function __construct($numeroConta, $nomeTitular, $saldo) {
        $this->numeroConta = $numeroConta;
        $this->nomeTitular = $nomeTitular;
        $this->saldo = $saldo;
    }

    public function depositar($quantia)
    {
        $this->saldo += $quantia;
        echo "Depósito de R$ $quantia efetuado, novo saldo: R$ $this->saldo." . PHP_EOL;
    }
    
    public function sacar($quantia)
    {
        if ($quantia > $this->saldo) {
            echo "Saldo insuficiente para saque." . PHP_EOL;
            return;
        }

        $this->saldo -= $quantia;
        echo "Saque de R$ $quantia efetuado, novo saldo: $this->saldo." . PHP_EOL;
        
    }
    
    public function exibirSaldo()
    {
        echo "\nNúmero da conta: $this->numeroConta \nTitular: $this->nomeTitular \nSaldo: R$ $this->saldo" . PHP_EOL;
    }

}

$contaBancaria1 = new ContaBancaria('12345-6', 'Chloe', 1000000);

$contaBancaria1->depositar(1000);

$contaBancaria1->sacar(55);

$contaBancaria1->exibirSaldo();