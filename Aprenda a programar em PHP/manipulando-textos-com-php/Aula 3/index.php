<?php

// Aula 3

$email = "jose.rosario@hotmail.com";

/* 
funcao explode - Essa função espera dois parâmetro como argumentos que são dividos em:
1° parâmetro -> o delimitador que vai verificar na variavel onde a função tem que separar
2° parâmetro -> a variavel que gostaria de separar dentro de um array
3° parâmetro (opcional) -> um limitador de quantos elementos terão no array
*/

var_dump(explode("." , $email)); // sem limit
// Saida: ['jose', 'rosario@hotmail', 'com']

echo PHP_EOL;

var_dump(explode("." , $email, 2)); // com limit
// Saida: ['jose', 'rosario@hotmail.com']

echo PHP_EOL;

/* 
funcao implode - Essa função espera dois parâmetro como argumentos que são dividos em:
1° parâmetro -> o separador que vai ser posto na string criada
2° parâmetro -> o variavel/array que irá pegar todos os elementos e colocar em uma string
*/

$arrEx = ['José', 21, 1.65];

echo implode(' ', $arrEx) . PHP_EOL;
// Saida: 'José 21 1.65'

/* 
funcao trim, ltrim e rtrim - Essas funções pegam uma string passada no primeiro parâmetro
e faz uma varedura nas extremidades da variavel (no ltrim só faz essa varedura na esquerda
e o rtrim faz essa varedura somente na parte direita da variavel) retirando os espaços e 
caracteres passados como 2° parâmetro (opcional) como pontos, virgulas etc
*/

$strEx = ' José Henrique Benemon. ';

echo trim($strEx, ' .') . PHP_EOL;
// Saida: 'José Henrique Benemon'

echo ltrim($strEx, ' .') . PHP_EOL;
// Saida: 'José Henrique Benemon. '

echo rtrim($strEx, ' .') . PHP_EOL;
// Saida: ' José Henrique Benemon'