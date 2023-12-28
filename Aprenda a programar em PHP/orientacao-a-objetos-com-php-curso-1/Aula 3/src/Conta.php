<?php
class Conta
{
    // Atributo
    public string $cpf;
    public string $titular;
    public int|float $saldo = 0;

    public function sacar(int|float $valorASacar) : void
    {
        if($this->saldo < $valorASacar){
            echo PHP_EOL . "Valor indisponível para saque!" . PHP_EOL;
            return;
        } 

        // Realizando saque
        $this->saldo -= $valorASacar;
    }

    public function depositar(int|float $valorADepositar) : void
    {
        if($valorADepositar < 0){
            echo PHP_EOL . "Não pode depositar um valor menor do que zero!" . PHP_EOL;
            return;
        }

        // Realizando deposito
        $this->saldo += $valorADepositar;
    }

    public function transferir(int|float $valorASerTransferido, Conta $contaDestino) : void
    {   
        if($this->saldo < $valorASerTransferido){
            echo PHP_EOL . "Está conta não ter saldo para realizar a transferência!". PHP_EOL;
            return;
        }

        if($valorASerTransferido < 0){
            echo PHP_EOL . "Tentando passar um valor menor do que zero!". PHP_EOL;
            return;
        }

        // Realizando transferência
        $this->sacar($valorASerTransferido);
        $contaDestino->depositar($valorASerTransferido);
    }
}
