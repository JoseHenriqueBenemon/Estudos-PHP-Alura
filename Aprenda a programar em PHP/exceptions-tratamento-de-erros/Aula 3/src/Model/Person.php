<?php

namespace Alura\Php\Model;

class Person
{
    private readonly string $cpf;

    private readonly string $rg;

    private string $name;

    private string $birthYear;

    public function __construct(string $cpf, string $rg, string $name, string $birthYear)
    {
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->name = $name;
        $this->birthYear = $birthYear;
    }

    public function getCpf() : string
    {
        return $this->cpf;
    }

    public function getRg() : string
    {
        return $this->rg;
    }
    public function getName() : string
    {
        return $this->name;
    }
    public function getBirthYear() : string
    {
        return $this->birthYear;
    }
}