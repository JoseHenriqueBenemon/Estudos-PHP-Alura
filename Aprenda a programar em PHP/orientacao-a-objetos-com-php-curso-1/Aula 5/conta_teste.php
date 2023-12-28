<?php 

require_once "src/Conta.php";

// instanciando dois objetos 
$primeiraConta = new Conta('123.431.830-10', 'José Henrique');
$primeiraConta->setSaldo(1200);

$segundaConta = new Conta('123.902.821-15', 'Roberto Bolas');
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
var_dump($primeiraConta);

echo 'Segunda Conta: ' . PHP_EOL;
var_dump($segundaConta);

echo 'Terceira Conta: ' . PHP_EOL;
var_dump($terceiraConta);

// utilizando o método sacar
echo PHP_EOL . "Tentando sacar 1260 da primeira conta: ";
$primeiraConta->withdraw(1260);
var_dump($primeiraConta);

echo PHP_EOL . 'Tentando depositar um valor negativo: ';
$primeiraConta->deposit(-100);
echo PHP_EOL;
var_dump($primeiraConta);

echo PHP_EOL . 'Transferindo 10 da primeira conta para a terceira conta: ';
$primeiraConta->transfer(10, $terceiraConta);

echo PHP_EOL;
echo 'Primeira Conta: ' . PHP_EOL;
var_dump($primeiraConta);

echo PHP_EOL;
echo 'Terceira Conta: ' . PHP_EOL;
var_dump($terceiraConta);

echo PHP_EOL . 'Quantas contas existem no nosso sistema: ' . PHP_EOL;
echo Conta::getNumeroDeContas();
