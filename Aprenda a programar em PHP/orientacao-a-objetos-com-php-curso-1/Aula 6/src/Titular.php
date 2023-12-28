<?php 

class Titular
{
    private CPF $cpf;
    private readonly string $nome;

    public function __construct(CPF $cpf, string $nome)
    {
        $this->cpf = $cpf;
        $this->validateTitular($nome);
        $this->nome = $nome;
    }

    public function getCpf(): CPF
    {
        return $this->cpf;
    }

    public function getNome(): string 
    {
        return $this->nome;
    }

    private function validateTitular(string $titular): void
    {
        if(mb_strlen($titular) < 5){
            echo PHP_EOL . "O nome do titular precisar ter pelo menos 5 letras!". PHP_EOL;
            exit();
        }
    }

}