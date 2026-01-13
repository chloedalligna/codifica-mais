<?php 

namespace ContaBancaria;

class ContaBancaria
{

    // atributos
    protected static array $arrayContas = [];
    protected string $numeroConta;
    protected string $titular;
    protected float $saldo;

    // construct pai
    public function __construct(string $titular, float $saldoInicial = 0)
    {
        $this->titular = $titular;
        $this->saldo = $saldoInicial;

        // se o saldo inicial informado é menor que 0, considerar 0
        if ($saldoInicial < 0) {
            $this->saldo = 0;
        }
    }

    // função para criar conta sem utilizar o new para verificar se o atributo de saldo é válido impedindo a criação do objeto
    // public static function criarConta($numeroConta, $titular, $saldo)
    // {
    //     if($saldo < 1500) {
    //         echo "Não foi possível criar conta, saldo inferior a um salário mínimo.\n\n";
    //         return null;
    //     }
        
    //     echo "Conta criada!\n\n";
    //     return new self($numeroConta, $titular, $saldo);
    // }

    // getter atributo titular
    public function getTitular()
    {
        return $this->titular;
    }

    // getter atributo saldo
    public function getSaldo()
    {
        return $this->saldo;
    }

    // getter atributo número da conta
    public function getNumeroConta()
    {
        return $this->numeroConta;
    }

    // função para adicionar valor ao saldo
    public function adicionarDinheiro(float $quantia)
    {
        $this->saldo += $quantia;
    }

    // função para retirar valor do saldo
    public function retirarDinheiro(float $quantia)
    {
        $this->saldo -= $quantia;
    }

    // função para verificar a existência de um número de conta
    public function verificarContaExiste(string $numeroConta): bool
    {
        if (in_array($numeroConta, self::$arrayContas)) {
            return true;
        }

        return false;
    }
    

    // função pai para sacar, parâmetros: quantia a sacar e identificar se é "sacar" (retirar da conta) para efetuar transferência
    public function sacar(float $quantia, bool $isTransferencia = false)
    {   

        // mensagem impressa se não for uma operação de transferência
        if (!$isTransferencia) {
            echo "--- OPERAÇÃO DE SAQUE ---\n";
        }

        // mensagem impressa o saldo for insuficiente, retorna false indicando que o saque não foi efetuado
        if ($quantia > $this->saldo) {
            echo "Saldo insuficiente para saque.\n\n";
            return false;
        }

        // retirada do dinheiro da conta
        self::retirarDinheiro($quantia);

        // retorna true indicando que o saque foi efetuado
        return true;
    }


    public function depositar(float $quantia, bool $isTransferencia = false, ?ContaBancaria $contaDestino = null)
    {   
        
        // mensagem impressa se não for uma operação de transferência
        if (!$isTransferencia) {
            echo "--- OPERAÇÃO DE DEPÓSITO ---\n";
        }

        // mensagem impressa a quantia for insuficiente, retorna false indicando que o depósito não foi efetuado
        if ($quantia <= 0) {
            echo "ERRO: Não foi possível efetuar o depósito. Digite uma quantia válida/positiva.\n\n";
            return false;
        }

        // formatação
        $quantiaFormatada = number_format($quantia, 2, ',', '.');

        // engloba as possibilidades de quando o depósito não é para transferência
        if (!$isTransferencia) {

            // indica que a conta recebedora é a própria
            if (empty($contaDestino)) {

                echo "Titular da conta bancária recebedora: $this->titular\n";
                self::adicionarDinheiro($quantia);

                echo "Depósito de R$ $quantiaFormatada efetuado com sucesso. \n\n";
                
                return;

            // indica que a conta recebedora é outra
            } else {

                echo "Titular da conta bancária recebedora: " . $contaDestino->getTitular() . "\n";

                // função para verificar se a conta destino existe
                $contaDestinoExiste = self::verificarContaExiste($contaDestino->getNumeroConta());

                self::adicionarDinheiro($quantia);

               if ($contaDestinoExiste) {

                    $contaDestino->adicionarDinheiro($quantia);

                    echo "Depósito de R$ $quantiaFormatada efetuado.\n\n";
                    
                    return;
                }

                // erro se a conta não existir
                echo "ERRO: Não foi possível efetuar o depósito. O número de conta informado não é associado a nenhuma conta bancária.\n\n";
                
                return;
            }
            
        }

        if ($isTransferencia & $contaDestino != null) { // if ($contaDestino != null) = if (!empty($contaDestino))
            
            echo "Titular da conta bancária recebedora: " . $contaDestino->getTitular() . ".\n";

            // função para verificar se a conta destino existe
            $contaDestinoExiste = self::verificarContaExiste($contaDestino->getNumeroConta());

            if ($contaDestinoExiste) {

                $contaDestino->adicionarDinheiro($quantia);
                
                return true;
            }

            // erro se a conta não existir
            echo "ERRO: Não foi possível efetuar a transferência. O número de conta informado não é associado a nenhuma conta bancária.\n\n";
            
            return false;
        }

        // erro se não informar uma conta para a transferência
        echo "ERRO: Não foi possível efetuar a transferência. Informe uma conta destinatária para a operação.\n\n";
        
        return false;
    }
    
    // função sem parâmetro para exibir os dados e saldo da conta
    public function exibirSaldo()
    {
        echo "--- DADOS ---\n";
        $saldoFormatado = number_format($this->saldo, 2, ',', '.');
        echo "Número da conta: $this->numeroConta \nTitular: $this->titular \nSaldo: R$ $saldoFormatado\n\n";
    }

}

// $contaBancaria1 = ContaBancaria::criarConta('12345-6', 'Chloe', 1000000);
// // var_dump($contaBancaria1);

// $contaBancaria1->depositar(1000);
// $contaBancaria1->exibirSaldo();

// $contaBancaria1->sacar(55);
// $contaBancaria1->exibirSaldo();

// // Quero comprar um avião
// $aviaoCusta = 10000000;

// // Posso comprar?
// if ($contaBancaria1->getSaldo() >= $aviaoCusta) {
//     echo "Posso comprar!\n";
// } else {
//     echo "Não posso comprar!\n";
// }

// $arrayDeContas = [
//     $contaBancaria1->getNumeroDaconta() => $contaBancaria1
// ];