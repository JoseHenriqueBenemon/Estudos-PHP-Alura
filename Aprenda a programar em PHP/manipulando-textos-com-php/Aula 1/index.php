<?php

// Aula 1

$nome = "José Rosario";

/* 
funcao str_contains - Essa função retorna um valor bolleano se a needle (2 parâmetro)
existir dentro da variavel
*/

if(str_contains($nome, 'Rosario')){
	echo "$nome é um pessoa da minha familia";
} else {
	echo "$nome não é um pessoa da minha familia";	
}
echo PHP_EOL;


/* 
funcao str_starts_with - Essa função retorna um valor booleano de true ou false caso
uma string contenha no inicio da variavel passada
*/

$url = "https://www.github.com";
if(str_starts_with($url, 'https')){
	echo "$url é uma url segura!";
} else {
	echo "$url não é uma url segura!";	
}

echo PHP_EOL;

/* 
funcao str_ends_with - Essa função retorna um valor booleano de true ou false caso
uma string contenha no final da variavel passada
*/

if(str_ends_with($url, '.br')){
	echo "$url tem dominio brasileiro!";
} else { 
	echo "$url não tem dominio brasileiro!";
}

echo PHP_EOL;
