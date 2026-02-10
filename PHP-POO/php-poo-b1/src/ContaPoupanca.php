<?php

namespace ContaBancaria;

class ContaPoupanca extends ContaBancaria
{

    // atributos
    protected $porcentagemRendimento = 0.01; // 1% ao mês

    // construct
    function __construct(string $titular, float $saldoInicial = 0)
    {
        parent::__construct($titular, $saldoInicial);
        $this->numeroConta = self::gerarNumeroConta();
        parent::$arrayContas[] = $this->numeroConta;
    }
    
    // função para gerar número da conta com 6 dígitos + dígito validador
    private static function gerarNumeroConta(): string
    {
        while (true) {
            $numeroConta = "";
            for ($i=0; $i < 6; $i++) { 
                $numeroConta .= mt_rand(0, 9);
            }
            $numeroConta .= "-" . mt_rand(0, 9);
            if (!in_array($numeroConta, parent::$arrayContas)) {
                return $numeroConta;
            }
        }
    }

    // getter do atributo porcentagem de rendimento
    public function getPorcentagemRendimento()
    {
        return $this->porcentagemRendimento;
    }

    // setter do atributo porcentagem de rendimento
    public function setPorcentagemRendimento($novoValor)
    {
        // se $novoValor menor que 0 ou maior que 1, mensagem erro e não alterar
        if ($novoValor < 0 || $novoValor > 1) {
            echo "ERRO: Não foi possível alterar a porcentagem de rendimento, pois o valor informado é menor que zero ou maior que um.\n\n";
            return;
        }
        
        // alteração do saldo e mensagem indicando que a alteração foi efetuada com sucesso
        $this->porcentagemRendimento = $novoValor;
        echo "Alteração de porcentagem de rendimento efetuada com sucesso. \nNovo rendimento: " . ($novoValor * 100) . " %\n\n";
        return;
    }


    // função para sacar, parâmetros: quantia a sacar e identificar se é "sacar" (retirar da conta) para efetuar transferência
    public function sacar(float $quantia, bool $isTransferencia = false)
    {   

        // invoca a função sacar da classe pai que retorna true ou false (se foi efetuada com sucesso)
        $operacaoFoiRealizada = parent::sacar($quantia, false);

        // se o saque foi efetuado imprime uma msg com a quantia retirada do saldo
        if ($operacaoFoiRealizada) {

            $quantiaFormatada = number_format($quantia, 2, ',', '.');
            echo "Saque de R$ $quantiaFormatada efetuado com sucesso. \n\n";
            
            return;
        }

        // retorna nada se o saque não foi efetuado
        return;
    }


    // função para transferir dinheiro para outra conta bancária, parâmetros: conta de destino pela classe conta bancaria e valor monetário
    public function transferirDinheiro(ContaBancaria $contaDestino, float $valor)
    {

        echo "--- OPERAÇÃO DE TRANSFERÊNCIA ---\n";

        // invoca a função sacar da classe pai indicando que é para transferência que retorna true ou false (se foi efetuada com sucesso)
        $operacaoFoiRealizada = parent::sacar($valor);

        // se o saque p/ transferência foi efetuado
        if ($operacaoFoiRealizada) {

            // invoca a função depositar da classe pai indicando que é para transferência que retorna true ou false (se foi efetuada com sucesso)
            $operacaoFoiRealizada2 = parent::depositar($valor, true, $contaDestino);

            // se o depósito p/ transferência foi efetuado
            if ($operacaoFoiRealizada2) {

                // imprime uma msg com o valor transferido
                $quantiaFormatada = number_format($valor, 2, ',', '.');
                echo "Transferência de R$ $quantiaFormatada efetuada com sucesso. \n\n";
                
                return;
            }

            // retorna nada se o depósito p/ transferência não foi efetuado
            return;
        }

        // retorna nada se o saque p/ transferência não foi efetuado
        return;
    }


    // função para aumentar a saldo com base no valor de rendimento e atribuir novo valor calculado no método (valor anterior + porcentagem de rendimento)
    public function aplicarRendimento()
    {
        echo "--- RENDIMENTO ---\n";
        $this->saldo *= (1 + $this->porcentagemRendimento);
        echo "Rendimento aplicado com sucesso. \nNovo saldo: R$ $this->saldo \n\n";
    }

}