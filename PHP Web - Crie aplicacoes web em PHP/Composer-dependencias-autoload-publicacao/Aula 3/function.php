<?php 

/*
Podemos também adicionar arquivos que iremos utilizar nos nosso projetos 
mesmo se não forem classes, com o seguinte código:

"files": [
    "./function.php"
]

Pegando o nome do arquivo e colocando dentro de um array com o indice "files"
*/

function returnMessage(string $msg): void
{
    echo $msg . PHP_EOL;
}