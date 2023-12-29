<?php 

namespace Alura\Php\Model\Employee;

use Alura\Php\Model\Pessoa;
use Alura\Php\Model\CPF;

abstract class Funcionario extends Pessoa
{
    private int|float $salario;
    
    public function __construct(string $nome, CPF $cpf, int|float $salario)
    {   
        parent::__construct($nome, $cpf);
        $this->salario = $salario;
    }

    public function setNome(string $nome): void
    {
        $this->validateTitular($nome);
        $this->nome = $nome;
    }

    public function getSalario(): int|float
    {
        return $this->salario;
    }

    // Caso a classe filha (ex: Desenvolvedor, Diretor, Gerente) não esteja com override do metódo
    // O método padrão, este método da classe Funcionario, será utilizado
    public function calculaBonificacao(): int|float
    {
        return $this->salario * 0.1;
    }

    protected function aumentoDeSalario(int|float $valorAumento) : void 
    {
        if($valorAumento < 0){
            echo "Aumento de salário não pode ser negativo!";
            return;
        }
        
        $this->salario += $valorAumento;
    }
}