<?php 

namespace Alura\Php\Model\Account;

use Alura\Php\Model\{Pessoa, Endereco, CPF, Autenticavel};


class Titular extends Pessoa implements Autenticavel
{
    private Endereco $endereco;

    public function __construct(string $nome, CPF $cpf, Endereco $endereco)
    {   
        parent::__construct($nome, $cpf);
        $this->endereco = $endereco;
    }

    public function getEndereco(): Endereco
    {
        return $this->endereco;
    }

    public function podeAutenticar(string $senha) : bool
    {
        return $senha === '1010';
    }
}