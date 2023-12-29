<?php

namespace Alura\Php\Model;

// final faz com que a class seja o topo da herança, nenhum método filho pode herdar da classe CPF
final class CPF{
    private readonly string $cpf;

    public function __construct(string $cpf){
        $boolCPF = filter_var($cpf, FILTER_VALIDATE_REGEXP, [
            'options' => [
                'regexp'=> '/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/'
            ]
        ]);

        if($boolCPF === false){
            echo "CPF inválido, tente novamente!";
            exit();
        }

        $this->cpf = $cpf;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }
}