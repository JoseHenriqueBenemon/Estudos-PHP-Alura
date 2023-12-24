<?php

// Verificações com REGEX

$arrCPF = [
	"604.129.231-09",
	"123.090.115-09",
	"432.642.921-09",
	"121.544.225-10"
];

/*
funcao preg_match - Essa função tem dois argumentos obrigatório que são o regex que você deseja verificar e
a variavel que você está passando para ser verificada, essa função retorna um booleano,
o terceiro parâmetro serve para pegar os resultados que a verificação fez, no caso abaixo serve para pegar os
CPF e alocar em alguma variavel, seja ela definida no escopo ou não 
*/

/* 
funcao preg_replace - Essa função funciona como a str_replace, ela pega uma palavra que deseja mudar
a palavra para qual deseja mudar e a variavel que deseja mudar, só que usando expressões regex
*/
$regex = "/^([0-9]{3}\.[0-9]{1})([0-9]{2}\.[0-9]{3}-[0-9]{2})$/";
foreach ($arrCPF as $cpf) {
	$cpfValido = preg_match($regex, $cpf, $matches);

	echo preg_replace(
		$regex,
		"$1XX.XXX-XX", 
		$cpf
	) . PHP_EOL;
	echo ($cpfValido) ? 'CPF válido' : 'CPF inválido';
	echo PHP_EOL;
	// var_dump($matches);
	// echo PHP_EOL;
}