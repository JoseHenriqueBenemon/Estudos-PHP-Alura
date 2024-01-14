<?php

namespace Alura\Php\Model\Account;

abstract class Conta
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
        $valorASacar = $valorASacar + ($valorASacar * $this->percentualTarifa());
        if($this->saldo < $valorASacar){
            throw new SaldoInsuficienteException($valorASacar, $this->saldo); 
        } 

        // Realizando saque
        $this->saldo -= $valorASacar;
    }

    public function deposit(int|float $valorADepositar) : void
    {
        if($valorADepositar < 0){
            throw new \InvalidArgumentException();
        }

        // Realizando deposito
        $this->saldo += $valorADepositar;
    }

    public static function getNumeroDeContas() : int
    {
        return self::$numeroDeContas;
    }

    abstract protected function percentualTarifa(): float;
}
