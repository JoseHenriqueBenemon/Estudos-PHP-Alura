<?php 

namespace Alura\Php\Model\Employee;

class Diretor extends Funcionario
{
    public function calculaBonificacao() : int|float
    {
        return $this->getSalario();
    }

    public function podeAutenticar(string $senha) : bool
    {
        return $senha === '1234';
    }
}