<?php
class Conta
{
    // Atributo
    private string $cpf;
    private string $titular;
    private int|float $saldo = 0;

    public function __construct(string $cpf, string $titular, int|float $saldo) 
    {
        $this->cpf = $cpf;
        $this->titular = $titular;
        $this->saldo = $saldo;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }
    public function setCpf(string $cpf): void{
        $this->cpf = $cpf;
    }

    public function getTitular(): string
    {
        return $this->titular;
    }

    public function setTitular(string $titular): void
    {
        $this->titular = $titular;
    }

    public function getSaldo(): int|float 
    {
        return $this->saldo;
    }

    public function setSaldo(int|float $saldo): void
    {
        if($saldo < 0){
            echo PHP_EOL . "Não pode definir um saldo negativo" . PHP_EOL;
            return;
        }

        $this->saldo = $saldo;
    }

    public function withdraw(int|float $valorASacar) : void
    {
        if($this->saldo < $valorASacar){
            echo PHP_EOL . "Valor indisponível para saque!" . PHP_EOL;
            return;
        } 

        // Realizando saque
        $this->saldo -= $valorASacar;
    }

    public function deposit(int|float $valorADepositar) : void
    {
        if($valorADepositar < 0){
            echo PHP_EOL . "Não pode depositar um valor menor do que zero!" . PHP_EOL;
            return;
        }

        // Realizando deposito
        $this->saldo += $valorADepositar;
    }

    public function transfer(int|float $valorASerTransferido, Conta $contaDestino) : void
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
        $this->withdraw($valorASerTransferido);
        $contaDestino->deposit($valorASerTransferido);
    }
}
