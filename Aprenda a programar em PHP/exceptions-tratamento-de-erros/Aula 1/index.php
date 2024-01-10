<?php 

/*
Como um programa em PHP (e basicamente em qualquer linguagem) funciona
*/

function funcao1()
{
    echo "Rodando função 1" . PHP_EOL; // Assim que a funcao1 é chamada ela executa esse código
    funcao2(); // Chamando a funcao2
    echo "Finalizando função1" . PHP_EOL; // Assim que a funcao2 terminar, volta para aqui 
}

function funcao2()
{
    echo "Rodando função 2" . PHP_EOL; // Assim que a funcao2 é chamada ela executa esse código
    echo "Escreva algo: ";
    $input = trim(fgets(STDIN)); // Pede para o usuário escreve algo 
    fwrite(STDOUT, "Você escreveu $input, certo?"); // Retorna o que o usuário escreveu 
    echo PHP_EOL ."Finalizando função 2" . PHP_EOL; // Finaliza a funcao2
}

echo "Começando programa principal" . PHP_EOL; // O código começa por aqui
funcao1(); // Chamando a funcao1
echo "Finalizando programação principal" . PHP_EOL; // Último código que roda no arquivo

/*

*/