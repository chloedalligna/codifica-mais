<?php 

namespace ContaBancaria;

class ContaCorrente extends ContaBancaria
{
    
    // constantes
    private const TAXA_SAQUE = 3.50; // ou outro que você escolher
    private const TAXA_TRANSFERENCIA = 1.50; // xx

    // construct
    function __construct(string $titular, float $saldoInicial = 0)
    {
        parent::__construct($titular, $saldoInicial);
        $this->numeroConta = self::gerarNumeroConta();
        parent::$arrayContas[] = $this->numeroConta;
    }
    
    // função para gerar número da conta com 8 dígitos + dígito validador
    private static function gerarNumeroConta(): string
    {
        while (true) {
            $numeroConta = "";
            for ($i=0; $i < 8; $i++) { 
                $numeroConta .= mt_rand(0, 9);
            }
            $numeroConta .= "-" . mt_rand(0, 9);
            if (!in_array($numeroConta, parent::$arrayContas)) {
                return $numeroConta;
            }
        }
    }

    // função alternativa para gerar o número da conta
    // private static function gerarNumeroConta(): string
    // {
    //     $numero = "";
    //     for ($i = 0; $i < 8; $i++) {
    //         $numero .= rand(0, 9);
    //     }

    //     $digito = rand(0, 9);

    //     return "{$numero}-{$digito}";
    // }


    // função para sacar, parâmetros: quantia a sacar e identificar se é "sacar" (retirar da conta) para efetuar transferência
    public function sacar(float $quantia, bool $isTransferencia = false)
    {   

        // quantia total é a quantia que deseja retirar da conta somada à taxa de saque de conta corrente
        $quantiaTotal = $quantia + self::TAXA_SAQUE;

        // invoca a função sacar da classe pai que retorna true ou false (se foi efetuada com sucesso)
        $operacaoFoiRealizada = parent::sacar($quantiaTotal, false);

        // se o saque foi efetuado imprime uma msg com a quantia e a taxa cobrada (o total foi retirado do saldo)
        if ($operacaoFoiRealizada) {

            $quantiaFormatada = number_format($quantia, 2, ',', '.');
            $taxaFormatada = number_format(self::TAXA_SAQUE, 2, ',', '.');
            echo "Saque de R$ $quantiaFormatada efetuado com sucesso. Taxa cobrada: R$ $taxaFormatada.\n\n";
            
            return;
        }

        // retorna nada se o saque não foi efetuado
        return;
    }


    // função para transferir dinheiro para outra conta bancária, parâmetros: conta de destino pela classe conta bancaria e valor monetário
    public function transferirDinheiro(ContaBancaria $contaDestino, float $valor)
    {

        echo "--- OPERAÇÃO DE TRANSFERÊNCIA ---\n";

        // valor total é o valor que deseja retirar da conta somada à taxa de transferência de conta corrente
        $valorTotal = $valor + self::TAXA_TRANSFERENCIA;

        // invoca a função sacar da classe pai indicando que é para transferência que retorna true ou false (se foi efetuada com sucesso)
        $operacaoFoiRealizada = parent::sacar($valorTotal, true);

        // se o saque p/ transferência foi efetuado
        if ($operacaoFoiRealizada) {

            // invoca a função depositar da classe pai indicando que é pra transferência que retorna true ou false (se foi efetuada com sucesso)
            $operacaoFoiRealizada2 = parent::depositar($valor, true, $contaDestino);

            // se o depósito p/ transferência foi efetuado
            if ($operacaoFoiRealizada2) {

                // imprime uma msg com o valor transferido e a taxa cobrada (o total foi retirado do saldo)
                $quantiaFormatada = number_format($valor, 2, ',', '.');
                $taxaFormatada = number_format(self::TAXA_TRANSFERENCIA, 2, ',', '.');
                echo "Transferência de R$ $quantiaFormatada efetuada com sucesso. Taxa cobrada: R$ $taxaFormatada.\n\n";
                
                return;
            }

            // retorna nada se o depósito p/ transferência não foi efetuado
            return;
        }

        // retorna nada se o saque p/ transferência não foi efetuado
        return;
    }

}

