<?php 

/*
Como lançar uma exceção
*/

require_once 'autoload.php';

use Alura\Php\Model\College\Student;

function executarFuncao()
{
    try {
        lancarExcecao();
    } catch( Exception | Error $e){
        echo "Mensagem: {$e->getMessage()}" . PHP_EOL;
        echo "Linha: {$e->getLine()}" . PHP_EOL;
        // echo $e->getTraceAsString() . PHP_EOL;
        throw new Exception("Tivemos um problema na excessao anterior", $e->getCode(), $e);
    }
}

function lancarExcecao()
{
    throw new JsonException("Tem um problema nesse JSON ai");
}

echo "Iniciando programa..." . PHP_EOL;
try {
    executarFuncao();
} catch( Exception|Error $e){
    echo $e->getMessage() . PHP_EOL;
}
echo "Finalizando programa..." . PHP_EOL;

$aluno = new Student('123.456.789-10', '19.523.842-6', "Bruno Covas", "10/10/1990", "1381296567311");

try{
    $aluno->login("3123");
} catch( Exception|Error $e){
    echo $e->getMessage() . PHP_EOL;
}