<?php 

namespace Alura\Php\Model\Employee;

class Desenvolvedor extends Funcionario
{
    public function calculaBonificacao() : int|float
    {
        return $this->getSalario() * 0.75;
    }

    public function sobeDeNivel() : void
    {
        $this->aumentoDeSalario($this->getSalario() * 0.25);
    }
}