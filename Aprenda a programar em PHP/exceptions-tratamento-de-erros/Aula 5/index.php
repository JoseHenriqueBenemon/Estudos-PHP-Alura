<?php


require_once "autoload.php";

use Alura\Php\Model\Account\{ContaCorrente, SaldoInsuficienteException, Titular};
use Alura\Php\Model\{CPF, Endereco, NomeInvalidoException};

/*
Fazendo um saque de um valor maior que tem na conta
*/
$contaCorrente = new ContaCorrente(
    new Titular("José Perreira Barbosa", 
        new CPF("123.432.690-19"), 
        new Endereco("Rua Do Rosario", 
            '132', 
            'Casa', 
            'Jardim Oliveira', 
            'Betim', 
            'Minas Gerais')
    )
);

$contaCorrente->setSaldo(1200);

try{
    $contaCorrente->withdraw(1300);
} catch(SaldoInsuficienteException $e){
    echo $e->getMessage();
}

/*
Realizando um deposito de um valor negativo
*/

try{
    $contaCorrente->deposit(-199);
} catch(InvalidArgumentException){
    echo PHP_EOL . "Você não pode fazer um deposito de um valor negativo!" . PHP_EOL;
}

/*
Criando um titular com nome inválido e outro com cpf inválido
*/

try{
    $contaCorrente2 = new ContaCorrente(
        new Titular(
            "ana",
            new CPF("123.321.321-19"),
            new Endereco("Rua Do Rosario", 
                '132', 
                'Casa', 
                'Jardim Oliveira', 
                'Betim', 
                'Minas Gerais'
            )
        )
    );
} catch(NomeInvalidoException $e){
    echo PHP_EOL . $e->getMessage() . PHP_EOL;
}

try{
    $contaCorrente2 = new ContaCorrente(
        new Titular(
            "Pedro",
            new CPF("12.321.321-19"),
            new Endereco("Rua Do Rosario", 
                '132', 
                'Casa', 
                'Jardim Oliveira', 
                'Betim', 
                'Minas Gerais'
            )
        )
    );
} catch(InvalidArgumentException $e){
    echo PHP_EOL . $e->getMessage() . PHP_EOL;
}


