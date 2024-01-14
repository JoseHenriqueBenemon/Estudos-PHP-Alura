<?php 

namespace Alura\Php\Model;


interface Authenticator
{
    public function login(string $senha) : bool;
}