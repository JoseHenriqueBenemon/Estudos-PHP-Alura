<?php 

/*
$file = fopen("lista-formacoes.txt", "w"); - O modo "w" faz com que insermos texto no começo do arquivo - write
$file = fopen("lista-formacoes.txt", "a"); - O modo "a" faz com que insermos texto no final do arquivo - append
*/

$file = fopen("lista-formacoes.txt", "a");

/*
funcao fwrite - Essa função escreve algo dentro de um arquivo
nela temos um parâmetro opcional que é a quantidade de characteres 
que o arquivo irá receber
*/

fwrite($file,"Aprenda a programar em PHP");

fclose($file);

/*
funcao file_put_contents - Essa função abre um arquivo, escreve nele ou caso não passemos a flag FILE_APPEND
ele sobre escreve o arquivo e fecha ele
*/

file_put_contents("lista-formacoes.txt","\nAprenda a programar em PHP", FILE_APPEND);