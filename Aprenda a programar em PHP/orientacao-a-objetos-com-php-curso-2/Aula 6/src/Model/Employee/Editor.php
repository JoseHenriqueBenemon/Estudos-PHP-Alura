<?php 

namespace Alura\Php\Model\Employee;

class Editor extends Funcionario
{
    public function calculaBonificacao() : int|float
    {
        return $this->getSalario() * 0.15;
    }
}