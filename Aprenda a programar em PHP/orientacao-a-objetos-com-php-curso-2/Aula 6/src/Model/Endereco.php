<?php

namespace Alura\Php\Model;

class Endereco
{   
    use AcessarMetodos;
    private string $rua;
    private string $numero;
    private string $complemento;
    private string $bairro;
    private string $cidade;
    private string $estado;

    function __construct(string $rua, string $numero, string $complemento, string $bairro, string $cidade, string $estado) 
    {
        $this->rua = $rua;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;
    }

    public function getCidade(): string
    {
        return $this->cidade;
    }

    public function getEstado(): string 
    {
        return $this->estado;
    }

    public function getBairro(): string
    {
        return $this->bairro;
    }

    public function getRua(): string
    {
        return $this->rua;
    }

    private function setRua(string $rua) : void
    {
        $this->rua = $rua;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function getComplemento(): string
    {
        return $this->complemento;
    }

    public function __toString() : string
    {
        return PHP_EOL . "{$this->rua}, Número: {$this->numero}, Bairro: {$this->bairro}, Cidade/Estado: {$this->cidade}/{$this->estado}" . PHP_EOL; 
    }
}