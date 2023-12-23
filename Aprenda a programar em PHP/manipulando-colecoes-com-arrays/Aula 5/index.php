<?php

// Aula 5

$arrBrinquedos = [
    "boneca",
    "bola",
    "pelúcia",
    "carrinho",
    "ioio"
];


/* 
função array_push - Essa função faz com que você consiga inserir elemetos dentro do array
podendo colocar quantos elementos eu quiser, passando somente o array como primeiro paramêtro
e os demais serão elementos inseridos no array
*/

array_push($arrBrinquedos,"peteca", "golf", "baralho");

var_dump($arrBrinquedos);

/* 
Podemos adicionar um único elemento simplesmente colocando [] no final do array, um simbolo de igual
e o elemento que desejamos adiciona-lo
*/

$arrBrinquedos[] = "peão";

var_dump($arrBrinquedos);  

/*
função array_unshift - Essa função é igual a array_push porém os elementos passados por paramêtro
são colocados no inicio do array, nos primeiros elementos daquele array passado
*/

array_unshift($arrBrinquedos,"bolinha de gude", "bambole", "dinossauro");

var_dump($arrBrinquedos);  

/*
Função array_shift - Essa função tira o primeiro elemento de algum array passado modifica 
0 array por referencia
*/

array_shift($arrBrinquedos);

var_dump($arrBrinquedos);  

/*
Função array_pop - Essa função também tira só que tira o último elemento do array e também 
modfiica-o por referencia
*/

array_pop($arrBrinquedos);

var_dump($arrBrinquedos);  


/*
função list ou [..] - Essa função faz uma lista com os dados de um array separados os por arrays simples
*/

$arrMult = [
    "Corsa", 
    "VW",
    2000
];

$arrMult2 = [
    "modelo" => "Fusca", 
    "marca" => "VW",
    "ano" => 1980
];

// esse exemplo aqui
list($modelo, $marca, $ano) = $arrMult;

var_dump($modelo, $marca, $ano);


// faz a mesma coisa que esse exemplo aqui
["modelo" => $modelo, "marca" => $marca, "ano" => $ano] = $arrMult2;

var_dump($modelo, $marca, $ano);

/*
função extract - Essa função pega um array e quebra ele em diversas variaveis dependendo 
da quantidade de elementos que temos dentro daquele array, juntaemente com o seus valores 

NUNCA USE extract EM LUGARES QUE VOCÊ NÃO CONFIA, $_GET/$_POST, somente em locais seguros
*/
extract($arrMult);

var_dump($modelo, $marca, $ano);

/*
função compact - Essa função faz o oposto da outra, ela pega diversos elementos e faz deles 
um array, podendo armazena-los recriando arrays novos
*/

var_dump(compact('modelo', "marca", "ano"));

// ESTUDAR ARRAY FILTER, MAP E REDUCE -> no curso de PHP Funcional