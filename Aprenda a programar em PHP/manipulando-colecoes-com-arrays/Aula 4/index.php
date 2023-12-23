<?php
// Aula 04
 
$arrProduto1 = [
	'mouse' => 250,
	'teclado' => 300,
	'monitor' => 1200,
	'desktop' => 4000
];

$arrProduto2 = [
	'mouse' => 250,
	'monitor' => 1200,
	'desktop' => 4000,
	'celular' => 2500
];

$arrProduto3 = [
	'mouse' => 250,
	'teclado' => 400,
	'monitor' => 1200,
	'celular' => 2500,
	'video-game' => 2000
];

/* 
função array_diff - Essa função tem que ter pelo menos dois paramêtro por que ela faz uma verificação
nos arrays que a função recebe e pega tudo que está diferente no primeiro array dos demais e retorna
para o usuário a chave e valor correspondente desse *primeiro* array, se o valor não existe em nenhum
dos outros array ele criará outro array com a chave e o valor que estão no primeiro array

O que essa função array_diff faz é pegar todos os elementos cujos valores não estejam nos outros arrays, 
ou seja, para fazer essa comparação, se um elemento estar em um array ou no outro, ela só leva em 
consideração os valores (Nota curso Alura)
*/

var_dump(array_diff($arrProduto1, $arrProduto2, $arrProduto3)) . PHP_EOL;

/* 
função array_diff_key - Diferente da função acima essa verifica somente a chave do array, então se uma
chave especifica estiver no primeiro porém não estiver nos demais a função cria um novo array com
a chave e o valor localizado no primeiro array
*/

var_dump(array_diff_key($arrProduto1, $arrProduto2, $arrProduto3)) . PHP_EOL;

/* 
função array_diff_assoc - Juntando as duas funções acima temos a array_diff_assoc que verifica tanto 
a chave quanto o valor dos demais arrays comparados com o primeiro, contudo ele não verifica separadamente
ele verifica juntamente a chave e o valor, ex: 'chave' => 'valor'. Se esse exemplo não estivern os demais
array(s) ele cria um novo array com aquele elemento.
*/

var_dump(array_diff_assoc($arrProduto1, $arrProduto2, $arrProduto3)) . PHP_EOL;

/* 
função array_keys - Essa função tem 3 paramêtros sendo 1 obrigatório e 2 opcionais, essa função faz com que 
ela crie um novo array que pega todas as chaves dentro de outro array que passamos como paramêtro (obrigatório)
os paramêtros opcionais são, uma palavra que gostaria de pesquisar dentro do ela retorna a posição que a chave
se encontra, obs: ele só funciona em arrays simlples sem ser arrays associativo, e o terceiro parametro é 
se a verificação será especifica ou não
*/

var_dump(array_keys($arrProduto1)) . PHP_EOL;

/* 
função array_values - Essa função faz exatamente o contrário da outra, ela pega todos os valores de um array 
passado, sem a sua chave, então ela não comumente deve ser usado somente em arrays associativos
*/

var_dump(array_values($arrProduto1)) . PHP_EOL;

$arrEx1 = [
	150,
	300
];

$arrEx2 = [
	'calça',
	'palito'
];

/* 
função array_combine - Essa função combina dois arrays passados como paramêtro, o primeiro array será a chave
e o segundo array será os valores deles, em ordem. Os dois arrays precisam necessariamente terem o mesmo tamanho

*/

var_dump(array_combine($arrEx1, $arrEx2)) . PHP_EOL;
$arrEx3 = array_combine($arrEx1, $arrEx2);

/* 
função array_flip - Essa função gira o array passado, então tudo que é chave vira valor, e tudo que é valor
vira chave, respeitando a ordem.	
*/

var_dump(array_flip($arrEx3)) . PHP_EOL;


$arrNotas = [
	0 => 'Não percar',
	1 => 'Não mentir',
	2 => "Não cobiçar a mulher do próximo"
];

$arrNotasAtt = [
	0 => 'Não desrespeitar os pais',
	1 => 'Não dizer o nome de Deus em vão',
	2 => "Perdoar as pessoas"
];


/*
Função array_merge e simbolo de adição (+) - Temso duas formas diferentes para agrupar arrays, a primeira forma
junta os arrays, perdendo as suas chaves, e caso seja chave de string e tiver mais que uma por array somente a do
última  array é mantida, porém se forem númericas todos os elementos do segundo array vão parar no final, então 
quando os elementos do primeiro acabam ele começa os elementos do segundo. Já a segunda forma temos o sinal de 
adição que ele mais substitui do que realmente adiciona, ele somente irá adicionar após todos os elementos do
primeiro array forem adicionados.

	
*/

var_dump(array_merge($arrNotas, $arrNotasAtt)) . PHP_EOL;

var_dump($arrNotas + $arrNotasAtt);

/*
spread operator

o spread operator (...) esses três pontinhos significa que tud que está passando por ali vai ser inseridos em
algum lugar, ou algum array, ou função, para que tudo que passamos por dentro dele seja alocado no espaço que 
a varivel oferece, se você adicionar um spread operator em um array, todos os elementos de outros seram adicionados
nesse array ([...$var, ...$var2]).
*/

$varArr = [
	10,
	11 => 20,
	12 => 'doze',
	'version' => 1.0,
	'name' => 'test',
	'ltda'
];

$varArr2 = [
	1,
	2 => 35,
	3 => 'tres',
	'locate' => 'Sao Paulo',
	'hour' => 20,
	'thx'
];

var_dump([...$varArr, ...$varArr2]);

function funcao(array ...$array)
{
	$result = $array;
	return $result;
}

$r = funcao([1, 2, 3, 4, 5]);

var_dump($r);