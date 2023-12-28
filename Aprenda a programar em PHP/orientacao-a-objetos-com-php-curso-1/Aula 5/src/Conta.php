<?php
class Conta
{
    // Atributo
    private readonly string $cpf; // O atributo cpf não pode ser alterado mais de 1 única vez, por causa do readonly 
    private readonly string $titular; // O atributo titular não pode ser alterado mais de 1 única vez, por causa do readonly 
    private int|float $saldo; // O atributo saldo pode ser alterado mais de 1 única vez, por que ele não tem o readonly
    private static int $numeroDeContas = 0; // Um atributo estático não faz parte do objeto Conta, mas existe na Conta

    // Consequentemente não faz sentido eu ter setter de um atributo que tem o readonly definido então exclui eles!

    public function __construct(string $cpf, string $titular) 
    {
        $this->cpf = $cpf;
        $this->validateTitular($titular);
        $this->titular = $titular;
        $this->saldo = 0;
        self::$numeroDeContas++; // Toda vez que uma Conta for instanciada, o atributo estático $numeroDeContas será incrementado
    }

    public function __destruct()
    {
        self::$numeroDeContas--;
    }
    
    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function getTitular(): string
    {
        return $this->titular;
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

    private function validateTitular(string $titular): void
    {
        if(mb_strlen($titular) < 5){
            echo PHP_EOL . "O nome do titular precisar ter pelo menos 5 letras!". PHP_EOL;
            exit();
        }
    }

    public static function getNumeroDeContas() : int
    {
        return self::$numeroDeContas;
    }
}
