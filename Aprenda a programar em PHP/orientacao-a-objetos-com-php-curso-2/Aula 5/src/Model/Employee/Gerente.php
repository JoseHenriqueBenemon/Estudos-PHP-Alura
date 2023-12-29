<?php 

namespace Alura\Php\Model\Employee;
use Alura\Php\Model\Autenticavel;

class Gerente extends Funcionario implements Autenticavel
{
    public function calculaBonificacao() : int|float
    {
        return $this->getSalario() * 0.5;
    }

    public function podeAutenticar(string $senha) : bool
    {
        return $senha === '4321';
    }
}