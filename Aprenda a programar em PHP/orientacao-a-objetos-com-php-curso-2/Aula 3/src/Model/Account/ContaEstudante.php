<?php 

namespace Alura\Php\Model\Account;

class ContaEstudante extends Conta
{
    protected function percentualTarifa(): float
    {
        return 0.025;
    }
}