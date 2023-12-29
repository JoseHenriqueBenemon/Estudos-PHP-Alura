<?php 

require_once 'autoload.php';

use Alura\Php\Model\CPF;
use Alura\Php\Model\Employee\Diretor;
use Alura\Php\Model\Employee\Gerente;
use Alura\Php\Service\Autenticador;

$autenticador = new Autenticador();

$gerente = new Gerente('Fernanda Montenegro', new CPF('980.213.500-00'), 2500);

$autenticador->login($gerente, '4321');



