<?php 

namespace Alura\Php\Model\Employee;

use Alura\Php\Model\Autenticavel;

class Diretor extends Funcionario implements Autenticavel
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