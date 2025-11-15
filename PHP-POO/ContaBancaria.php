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
    }
    
    public function sacar($quantia)
    {
        if ($quantia > $this->saldo) {
            echo "Saldo insuficiente para saque." . PHP_EOL;
        } else {
            $this->saldo -= $quantia;
        }
    }
    
    public function exibirSaldo()
    {
        echo "Número da conta: $this->numeroConta \nTitular: $this->nomeTitular \nSaldo: $this->saldo" . PHP_EOL;
    }

}