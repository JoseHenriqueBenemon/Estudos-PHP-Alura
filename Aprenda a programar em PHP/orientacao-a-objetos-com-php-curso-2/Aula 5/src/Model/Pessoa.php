<?php 

namespace Alura\Php\Model;

abstract class Pessoa{

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

    protected function validateTitular(string $titular): void
    {
        if(mb_strlen($titular) < 5){
            echo PHP_EOL . "O nome do titular precisar ter pelo menos 5 letras!". PHP_EOL;
            exit();
        }
    }
}