<?php 

namespace Alura\Php\Service;

use Alura\Php\Model\Employee\Funcionario;

class ControladorDeBonificacao
{   
    private int|float $totalBonficacao = 0;

    public function adicionaBonificacao(Funcionario $funcionario) : void
    {
        $this->totalBonficacao += $funcionario->calculaBonificacao();
    }

    public function getTotalDeBonifacao() : int|float
    {
        return $this->totalBonficacao;
    }
}