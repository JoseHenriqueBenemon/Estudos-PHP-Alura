<?php

namespace Alura\Php\Model\College;
use Alura\Php\Model\{Authenticator, Person};

class Student extends Person implements Authenticator
{   
    private readonly string $register;

    public function __construct(string $cpf, string $rg, string $name, string $birthYear, string $register)
    {
        parent::__construct($cpf, $rg, $name, $birthYear);
        $this->register = $register;
    }

    
    /**
     * @throws \Exception
     */
    public function login(string $senha) : bool
    {   
        if($senha == "1234"){
            return true;
        } else {
            throw new \Exception("Senha incorreta!");
        } 
    }

    public function getRegister() : string
    {
        return $this->register;
    }
}