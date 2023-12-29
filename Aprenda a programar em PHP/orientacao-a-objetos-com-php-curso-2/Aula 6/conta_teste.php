<?php 

use Alura\Php\Model\{CPF, Endereco};
use Alura\Php\Model\Account\{Conta, ContaPoupanca, ContaEstudante, ContaCorrente, Titular};

require_once 'autoload.php';

$endereco = new Endereco('Rua Serafim Tadeu', '280', 'Casa 1', 'Jd Macedonia', 'São Paulo', 'São Paulo');
// instanciando dois objetos 
$primeiraConta = new ContaCorrente(new Titular('José Henrique', new CPF('123.431.830-10') , $endereco));
$primeiraConta->setSaldo(1200);

$segundaConta = new ContaPoupanca(new Titular('Roberto Bolas', new CPF('123.902.821-14'), $endereco));
$segundaConta->setSaldo(10000);


// Não é a melhor forma de inserir dados em um objeto mas é o que temos pra hoje
// $primeiraConta->cpf = '123.431.830-10';
// $primeiraConta->titular = 'José Henrique';
// $primeiraConta->saldo = 1200;

// $segundaConta->cpf = '123.902.821-15';
// $segundaConta->titular = 'Roberto Bolas';
// $segundaConta->saldo = 10000;

/* 
Colocando a referência da conta um na conta três, e modificando o saldo das contas por referência
Obs: Ele não está somando mais um no numeroDeContas pois a instancia não está sendo feita pela classe Contas
     Está somente clonando um objeto já existente na memória     
*/ 
$terceiraConta = clone $primeiraConta; 
$terceiraConta->setSaldo(1000);
// $terceiraConta->saldo = 1000;

echo PHP_EOL . 'Verificando os Estados das Contas: ' . PHP_EOL;
echo 'Primeira Conta: ' . PHP_EOL;
print_r($primeiraConta);

echo 'Segunda Conta: ' . PHP_EOL;
print_r($segundaConta);

echo 'Terceira Conta: ' . PHP_EOL;
print_r($terceiraConta);

// utilizando o método sacar
echo PHP_EOL . "Tentando sacar 1260 da primeira conta: ";
$primeiraConta->withdraw(1260);
print_r($primeiraConta);

echo PHP_EOL . 'Tentando depositar um valor negativo: ';
$primeiraConta->deposit(-100);
echo PHP_EOL;
print_r($primeiraConta);

echo PHP_EOL . 'Transferindo 10 da primeira conta para a terceira conta: ';
$primeiraConta->transfer(10, $terceiraConta);

echo PHP_EOL;
echo 'Primeira Conta: ' . PHP_EOL;
print_r($primeiraConta);

echo PHP_EOL;
echo 'Terceira Conta: ' . PHP_EOL;
print_r($terceiraConta);

echo PHP_EOL . 'Quantas contas existem no nosso sistema: ' . PHP_EOL;
echo Conta::getNumeroDeContas();
