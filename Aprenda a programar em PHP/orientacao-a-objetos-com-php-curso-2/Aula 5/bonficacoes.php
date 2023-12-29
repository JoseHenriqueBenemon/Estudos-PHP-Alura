<?php 

require_once 'autoload.php';

use Alura\Php\Model\Employee\{ Gerente, Diretor, Desenvolvedor, Editor};
use Alura\Php\Model\CPF;
use Alura\Php\Service\ControladorDeBonificacao;

$primeiroFuncionario = new Gerente('José Paulo', new CPF('320.312.490-12'), 5000.00);
$segundoFuncionario = new Diretor('Fernanda Montenegro', new CPF('980.213.500-00'), 2500);

$terceiroFuncionario = new Desenvolvedor('Louro Rosa', new CPF('430.076.233-00'), 2500);
$terceiroFuncionario->sobeDeNivel();

$quartoFuncionario = new Editor('Rubens Paiva', new CPF('311.508.009-24'), 2500);

$controlador = new ControladorDeBonificacao();

$controlador->adicionaBonificacao($primeiroFuncionario);
$controlador->adicionaBonificacao($segundoFuncionario);
$controlador->adicionaBonificacao($terceiroFuncionario);
$controlador->adicionaBonificacao($quartoFuncionario);

echo "Total de bonificação: {$controlador->getTotalDeBonifacao()}";




