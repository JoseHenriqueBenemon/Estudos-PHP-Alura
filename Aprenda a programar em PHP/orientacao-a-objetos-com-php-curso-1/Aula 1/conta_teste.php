<?php 

require_once "src/Conta.php";

$conta = criarConta('901.231.123-12', 'Steven Robs', 1290.00);

var_dump($conta);