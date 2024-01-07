<?php 

/* 
funcao fopen - Essa função tem dois parametros, o primeiro é o arquivo que 
será aberto e o segundo é o modo (r: read, w: write)
*/

$file = fopen('lista-cursos.txt', 'r');

/*
funcao feof (File End Of File) - Essa função verifica se estamos no final do arquivo

funcao fgets - Essa função recebe um arquivo e pega até o final da linha desse arquivo
caso passemos o segundo parâmetro a função irá ler até a quantidade passada 
*/

echo PHP_EOL;
while(!feof($file)){ // verifica se o arquivo NÃO chegou no final dele
    $curso = fgets($file);
    echo $curso;
}
echo PHP_EOL;

fclose($file);
$file = fopen('lista-cursos.txt', 'r');

/*
funcao fread - Essa função recebe dois parâmetro, o primeiro sendo o arquivo que 
desejamos ler e o tamanho de bytes do arquivo
*/

$fileSize = filesize('lista-cursos.txt');
$cursos = fread($file, $fileSize);

echo PHP_EOL;
echo $cursos;
// var_dump($cursos);
echo PHP_EOL;

/*
funcao fclose - Essa função fecha o arquivo em que estamos trabalhando
*/

fclose($file);

/*
funcao file_get_contents - Essa função faz tudo o que queremos automaticamente 
ele abre o arquivo, pega tudo que tem dentro dele e depois fecha o arquivo
*/

$file = file_get_contents('lista-cursos.txt');

echo PHP_EOL;
// var_dump($file);
echo $file;
echo PHP_EOL;

/*
funcao file - Essa função faz exatamente a mesma coisa que a anterior porém
ele aloca os resultados dentro de um array
*/

$file = file('lista-cursos.txt');

echo PHP_EOL;
var_dump($file);
echo PHP_EOL;