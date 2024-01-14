<?php 

namespace Alura\Php\Model;

abstract class Pessoa{

    use AcessarMetodos;
    protected string $nome;
    private CPF $cpf;

    public function __construct(string $nome, CPF $cpf) 
    {   
        $this->validateTitular($nome);
        $this->nome = $nome;
        $this->cpf = $cpf;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getCpf(): CPF
    {
        return $this->cpf;
    }

    // Colocando final em um método, o php não deixa outra classe fazer override dele
    final protected function validateTitular(string $titular): void
    {
        if(mb_strlen($titular) < 5){
            throw new NomeInvalidoException($titular);
        }
    }
}