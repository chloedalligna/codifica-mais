<?php 

class ContaBancaria {

    private $numeroConta;
    private $nomeTitular;
    private $saldo;

    public function __construct($numeroConta, $nomeTitular, $saldo = 0) {
        $this->numeroConta = $numeroConta;
        $this->nomeTitular = $nomeTitular;
        $this->saldo = $saldo;

        if ($saldo < 0) {
            $this->saldo = 0;
        }
    }

    public static function criarConta($numeroConta, $nomeTitular, $saldo) {
        if($saldo < 1500) {
            echo "Não foi possível criar conta, saldo inferior a um salário mínimo.\n\n";
            return null;
        }
        
        echo "Conta criada!\n\n";
        return new self($numeroConta, $nomeTitular, $saldo);
    }

    public function getSaldo()
    {
        return $this->saldo;
    }

    public function getNumeroDaConta()
    {
        return $this->numeroConta;
    }

    public function depositar($quantia)
    {
        $this->saldo += $quantia;
        $quantiaFormatada = number_format($quantia, 2, ',', '.');
        $saldoFormatado = number_format($this->saldo, 2, ',', '.');
        echo "Depósito de R$ $quantiaFormatada efetuado, novo saldo: R$ $saldoFormatado." . PHP_EOL;
    }
    
    public function sacar($quantia)
    {
        if ($quantia > $this->saldo) {
            echo "Saldo insuficiente para saque." . PHP_EOL;
            return;
        }

        $this->saldo -= $quantia;
        $quantiaFormatada = number_format($quantia, 2, ',', '.');
        $saldoFormatado = number_format($this->saldo, 2, ',', '.');
        echo "Saque de R$ $quantiaFormatada efetuado, novo saldo: $saldoFormatado." . PHP_EOL;
    }
    
    public function exibirSaldo()
    {
        $saldoFormatado = number_format($this->saldo, 2, ',', '.');
        echo "\nNúmero da conta: $this->numeroConta \nTitular: $this->nomeTitular \nSaldo: R$ $saldoFormatado" . PHP_EOL;
    }

}

$contaBancaria1 = ContaBancaria::criarConta('12345-6', 'Chloe', 1000000);
// var_dump($contaBancaria1);

$contaBancaria1->depositar(1000);
$contaBancaria1->exibirSaldo();

$contaBancaria1->sacar(55);
$contaBancaria1->exibirSaldo();

// Quero comprar um avião
$aviaoCusta = 10000000;

// Posso comprar?
if ($contaBancaria1->getSaldo() >= $aviaoCusta) {
    echo "Posso comprar!\n";
} else {
    echo "Não posso comprar!\n";
}

$arrayDeContas = [
    $contaBancaria1->getNumeroDaconta() => $contaBancaria1
];