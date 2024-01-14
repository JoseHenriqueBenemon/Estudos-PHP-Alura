<?php 

namespace Alura\Php\Model;

class NomeInvalidoException extends \DomainException
{
    public function __construct(string $name)
    {   
        $msg = "O nome do titular deve ter pelo menos 5 letras!, $name é um nome inválido";
        parent::__construct($msg);
    }
}