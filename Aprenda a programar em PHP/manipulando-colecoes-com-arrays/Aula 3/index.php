<?php

// arrays
$arrMultAssoc = [
	"first" => [
		"name" => "josé henrique",
		"grade" => 7.10
	],
	"second" => [
		"name" => "sérgio henrique",
		"grade" => 8.04
	],
	"third" => [
		"name" => "bruno farias",
		"grade" => 9.47
	]
];

$arrMult = [
	[
		"max",
		10,
		"bulldog"
	],
	[
		"rex",
		15,
		"pastor alemão"
	],
	[
		"madame",
		6,
		"salsicha"
	]
];

$arr = [
	"Vinicius" => 5,
	"Jose" => 16,
	"Pedro" => 2,
	"Sebastião" => 101,
	"Conan" => 7,
	"Patricia" => 41
];

// Aula 03

// função gettype - verifica qual o tipo da variavel passada

echo gettype($arr) . PHP_EOL; // retorna o tipo da variavel - array

// função is_array - função que verifica se a variavel passada é um array

if(is_array($arr)){
	echo 'A varivel $arr é uma função!' . PHP_EOL; // retorna o echo
}

/* 
função array_is_list - Essa função recebe um array e retorna 
verdadeiro se esse array for em numérico, ou seja, 
todas as suas chaves são números, ele começa com o zero e 
a partir do zero são todas crescentes. Ou seja, ele não 
pula uma chave, por exemplo.
*/

if(array_is_list($arrMult)){
	foreach($arrMult as $chave => $valor){
		for ($i = 0; $i < count($valor); $i++){
			echo "Item $chave - conteúdo: {$valor[$i]}" . PHP_EOL; // provavelmente um erro
		}
	}
}

/*
função array_key_exists - Essa função recebe dois parametro
o primeiro é a palvra que deseja procurar nas chaves do array e o segundo
é o array que deve procurar, retornando true sendo que a chave existe e false 
caso a chave procurada não exista.
*/
echo "Array_key_exists: ";
var_dump(array_key_exists('fourth', $arrMultAssoc)) . PHP_EOL; // retorno false

/*
função isset - Essa função recebe um paramêtro que é a variavel que vamos verificar
a verificação consiste em validar se a variavel existe em algum lugar do projeto
e verifica se existe algum valor dentro dela, se o valor não é nulo, ela também 
retorna true caso a variavel existe e não seja nula e false caso a variavel não exista
ou se a variavel é nula.
*/
echo "Isset: ";
var_dump(isset($arrMultAssoc['first'])) . PHP_EOL; // retorno true

/* ]
função in_array - Essa função recebe três paramêtro sendo o primeiro o valor a ser procurado
e o segundo o array a ser verificado, ele verifica se existe o valor passado no parametro anterior
mas não nas chaves, nos valores dentro daquele array, independente da chave retorna true caso a 
pesquisa existe nos valores do array e false caso não o valor não exista nos valores do array e
o terceiro paramêtro é opicional no in_array que é para fazer uma verificação mais restrita
então se ativar essa opção ( in_array(needle, haystack, true) ) a verificação vai por enconta o 
tipo da variavel (se é uma string ou um int por exemplo)
*/
echo "In_array: ";
var_dump(in_array('Max', $arrMult)) . PHP_EOL;

/*
função array_search - Essa função que recebe 3 paramêtros (needle, haystack, strict) tem como função
pega a chave de um array passando o valor dentro da função, o primeiro paramêtro é o responsavel 
pela identificação de qual chave devemos pegar, o segundo parametro é o array que queremos verificar 
e o terceiro é opcional que é para fazer uma verificação mais restrita então se ativar essa opção
a verificação vai por enconta o tipo da variavel (se é uma string ou um int por exemplo)
*/
 
 echo "Arry search: " . var_dump(array_search("patricia", $arr));

 