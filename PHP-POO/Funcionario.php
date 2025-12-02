<?php

class Funcionario {
    
    private $nome;
    private $cargo;
    private $salario;

    public function __construct($nome, $cargo, $salario) {
        $this->nome = $nome;
        $this->cargo = $cargo;
        $this->salario = $salario;

        if ($salario < 1631) {
            $this->salario = 1631;
        }
    }

    public function alterarCargo($novoCargo)
    {
        echo "-- Alteração de cargo -- \nCargo anterior: $this->cargo \nNovo cargo: $novoCargo\n\n";
        $this->cargo = $novoCargo;
    }
    
    public function alterarSalario($novoSalario)
    {
        $salarioAntigoFormatado = number_format($this->salario, 2, ',', '.');
        $novoSalarioFormatado = number_format($novoSalario, 2, ',', '.');
        if ($novoSalario < 1631) {
            echo "Você tentou modificar o salário de R$ {$salarioAntigoFormatado} para um valor menor que um salário mínimo. Operação cancelada.\n";
            return;
        }

        echo "-- Alteração de salário -- \nSalário anterior: R$ $salarioAntigoFormatado \nNovo salário: R$ $novoSalarioFormatado \n\n";
        $this->salario = $novoSalario;
    }
    
    public function exibirDetalhes()
    {
        $salarioFormatado = number_format($this->salario, 2, ',', '.');
        echo "-- DADOS DO FUNCIONÁRIO -- \nNome: $this->nome \nCargo: $this->cargo \nSalário: R$ $salarioFormatado" . PHP_EOL;
    }

}

$funcionario1 = new Funcionario('Juninho Maloka', 'Gerente', 150.00);

$funcionario1->alterarCargo('CEO');

$funcionario1->alterarSalario(1500000);

$funcionario1->exibirDetalhes();