<?php 

// As duas funções abaixo são comumente mantidas no php.ini
error_reporting(E_ALL); // Isso serve para reportar todos os erros
ini_set('display_erros', 1); // isso serve para mostrar (quando on - 1) todos os erros na tela do usuário


// A função abaixo funciona melhor em um ambiente de framework
// mas não quer dizer que não pode ser usado no seu programa
set_error_handler(function ($errno, $errstr, $errfile, $errline){
    echo PHP_EOL .  match($errno){
        E_WARNING => "$errstr Isso é um Warning, cuidado!",
        E_NOTICE => "$errstr Isso é um Notice, ainda mantenha cuidado!"
    };
    
    return true;
});

echo $nome;

/*
Finally - caso você queria executar algo antes do try catch acabar
você vai utilizar o finally

Ele sempre será executando antes do try catch chegar ao fim
*/

function funcao1() : int
{
    try{
        echo "Hello world!" . PHP_EOL;
        return 0;
    } catch(Throwable $e){
        echo $e->getMessage();
        return 1;
    } finally {
        echo "Finalizando o try catch ...";
    }
}

echo funcao1();


