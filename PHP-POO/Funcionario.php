<?php

class Funcionario {
    
    private $nome;
    private $cargo;
    private $salario;

    public function __construct($nome, $cargo, $salario) {
        $this->nome = $nome;
        $this->cargo = $cargo;
        $this->salario = $salario;
    }

    public function alterarCargo($novoCargo)
    {
        echo "-- Alteração de cargo -- \nCargo anterior: $this->cargo \nNovo cargo: $novoCargo\n\n";
        $this->cargo = $novoCargo;
    }
    
    public function alterarSalario($novoSalario)
    {
        if ($novoSalario < 0) {
            echo "Salário não pode ser negativo.\n\n";
            return;
        }
        
        echo "-- Alteração de salário -- \nSalário anterior: R$ $this->salario \nNovo salário: R$ $novoSalario \n\n";
        $this->salario = $novoSalario;

    }
    
    public function exibirDetalhes()
    {
        echo "-- DADOS DO FUNCIONÁRIO -- \nNome: $this->nome \nCargo: $this->cargo \nSalário: R$ $this->salario" . PHP_EOL;
    }

}

$funcionario1 = new Funcionario('Juninho Maloka', 'Gerente', 150.00);

$funcionario1->alterarCargo('CEO');

$funcionario1->alterarSalario(1500000);

$funcionario1->exibirDetalhes();