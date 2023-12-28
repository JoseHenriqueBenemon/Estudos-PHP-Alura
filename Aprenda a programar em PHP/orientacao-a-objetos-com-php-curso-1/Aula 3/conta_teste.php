<?php 

require_once "src/Conta.php";

// instanciando dois objetos 
$primeiraConta = new Conta();
$segundaConta = new Conta();

// Não é a melhor forma de inserir dados em um objeto mas é o que temos pra hoje
$primeiraConta->cpf = '123.431.830-10';
$primeiraConta->titular = 'José Henrique';
$primeiraConta->saldo = 1200;

$segundaConta->cpf = '123.902.821-15';
$segundaConta->titular = 'Roberto Bolas';
$segundaConta->saldo = 10000;

// Colocando a referência da conta um na conta três, e modificando o saldo das contas por referência
$terceiraConta = clone $primeiraConta;
$terceiraConta->saldo = 1000;

var_dump($primeiraConta);
var_dump($segundaConta);
var_dump($terceiraConta);

// utilizando o método sacar
$primeiraConta->sacar(1260);
echo PHP_EOL;
var_dump($primeiraConta);

$primeiraConta->depositar(-100);
echo PHP_EOL;
var_dump($primeiraConta);

$primeiraConta->transferir(10, $terceiraConta);

echo PHP_EOL;
var_dump($primeiraConta);

echo PHP_EOL;
var_dump($terceiraConta);