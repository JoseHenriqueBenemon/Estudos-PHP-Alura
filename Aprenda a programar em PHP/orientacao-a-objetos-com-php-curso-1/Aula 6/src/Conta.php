<?php
class Conta
{
    // Atributo
    
    private Titular $titular;
    private int|float $saldo; // O atributo saldo pode ser alterado mais de 1 única vez, por que ele não tem o readonly
    private static int $numeroDeContas = 0; // Um atributo estático não faz parte do objeto Conta, mas existe na Conta

    // Consequentemente não faz sentido eu ter setter de um atributo que tem o readonly definido então exclui eles!

    public function __construct(Titular $titular) 
    {   
        $this->titular = $titular;
        $this->saldo = 0;
        self::$numeroDeContas++; // Toda vez que uma Conta for instanciada, o atributo estático $numeroDeContas será incrementado
    }

    public function __destruct()
    {
        self::$numeroDeContas--;
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

    public function getTitular(): Titular
    {
        return $this->titular;
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

    public static function getNumeroDeContas() : int
    {
        return self::$numeroDeContas;
    }
}
