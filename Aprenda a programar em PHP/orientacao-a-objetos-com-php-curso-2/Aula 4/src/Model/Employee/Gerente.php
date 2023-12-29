<?php 

namespace Alura\Php\Model\Employee;

class Gerente extends Funcionario
{
    public function calculaBonificacao() : int|float
    {
        return $this->getSalario() * 0.5;
    }
}