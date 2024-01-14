<?php 

namespace Alura\Php\Model;

interface Autenticavel
{
    public function podeAutenticar(string $senha) : bool;
}