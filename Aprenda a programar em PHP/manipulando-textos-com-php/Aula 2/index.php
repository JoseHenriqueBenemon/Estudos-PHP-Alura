<?php

// Aula 2

$email = "jose.rosario@hotmail.com";

/* 
funcao substr - Essa função pega pedaços de uma string passando um dois números inteiros
ou 1 caso queira pegar a string até o final, e retorna para o usuário o que ele pediu

De longe é uma opção ruim para pegar isso
*/
echo substr($email, 0, 12) . PHP_EOL;
echo substr($email, 12) . PHP_EOL;

/* 
funcao strpos - Essa função vai retornar um inteiro que corresponde ao número de caracteres
que vem antes do needle (2° parâmetro da função, nesse caso ele pede uma string para ter como 
limite o(s) caracter(es))

Uma forma melhor de executar com a função substr
*/

$intAteOArroba = strpos($email, "@"); 
/* 
Temos um parâmetro escondido nessa função que deixa você começar por outro número que
não seja 0 (inicio da string)
*/

$user = substr($email, 0, $intAteOArroba);
echo $user . PHP_EOL;
echo substr($email, $intAteOArroba+1) . PHP_EOL;

/* 
funcao strlen - Essa função pega o tamanho de uma string e retorna ela em um inteiro
porém ela pega o tamanho em byte de uma string, então se essa string tiver alguma letra
com acento especial, ele comumente terá mais de 1 byte, conseguimente mais de 1 inteiro
*/

$pwd = "9090@Abc";

if(strlen($pwd) < 8){
	echo "Digite uma senha mais forte" . PHP_EOL ;
}

/* 
funcao strtoupper - Essa função faz com que a string passada por parâmetro seja devolvida
com todas as letra maiúscula, porém ela não consegue fazer essa alterações em 
caracteres especiais, Ex: é, à, á etc...
*/ 

echo strtoupper($pwd) . PHP_EOL;

/* 
funcao strtolower - Essa função faz com que a string passada por parâmetro seja devolvida
com todas as letra minúsculas, porém ela não consegue fazer essa alterações 
em caracteres especiais, Ex: é, à, á etc...
*/ 

echo strtolower($pwd) . PHP_EOL;

/* 
Função mb_strlen, mb_strtoupper, mb_strtolower - Essas funções exatamente o que as funções
acima fazem porém utilizando o módulo strings multibytes, então na função mb_strlen ele 
pega o tamanho real da variavel, sem contar os bytes, na função mb_strtoupper consegue alterar
tanto os caracteres normais quantos os caracteres especiais, mesma coisa acontece com o mb_strtolower
*/ 

echo mb_strlen($user) . PHP_EOL;

echo mb_strtoupper($user) . PHP_EOL;

echo mb_strtolower($user) . PHP_EOL;
