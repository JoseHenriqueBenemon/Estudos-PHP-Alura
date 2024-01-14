<?php 

namespace Alura\Php\Model\Account;

class SaldoInsuficienteException extends \DomainException
{
    public function __construct(int|float $valorASacar, int|float $saldo)
    {   
        $msg = "Não foi possível sacar $valorASacar! Saldo: $saldo";
        parent::__construct($msg);
    }
}