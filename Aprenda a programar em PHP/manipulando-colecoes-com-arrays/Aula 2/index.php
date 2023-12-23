<?php

// array de notas exemplo
$notas = [10, 9, 4, 7, 6];


// Primeiro exercício: Ordenação com array
// A função utilizada é a sort() porém diferente de outras funções a sort pega um valor por referencia e modifica ele na memória (&notas nesse caso)
sort($notas);

var_dump($notas);

// Segundo exercicío: Ordenação com critério
$empresas = [
    6 => [
        "nome" => "Google",
        "lucro" => 12000000
    ],
    5 => [
        "nome" => "Facebook",
        "lucro" => 15000000
    ],
    3 => [
        "nome" => "Spotify",
        "lucro" => 8000000
    ],
    2 => [
        "nome" => "Samsung",
        "lucro" => 20000000
    ],
    10 => [
        "nome" => "Nokia",
        "lucro" => 500000
    ]
];


function ordernaLucro(array $primeiroLucro, array $segundoLucro) : int
{
    // Método desnecessário
    // if($primeiroLucro['lucro'] > $segundoLucro['lucro']) {
    //     return -1;
    // } else if($segundoLucro['lucro'] > $primeiroLucro['lucro'])  {
    //     return 1;
    // }
    // return 0;

    //Método simplificado
    return $segundoLucro['lucro'] <=> $primeiroLucro['lucro'];
}   

function ordernaEmpresa(int $primeiraEmpresa, int $segundaEmpresa) : int
{
    return $segundaEmpresa <=> $primeiraEmpresa;
}

// ordenando por critério (ordernando pela chave)
uksort($empresas, 'ordernaEmpresa');
var_dump($empresas);

// ordenando por critério (ordernando pelo valor)
usort($empresas, 'ordernaLucro');
var_dump($empresas);

// terceiro exercicio: ordernar em ordem decrescente

$contasLogadas = [
    1,
    5,
    10,
    14,
    3,
    7
];

// sem ser um array associativo 
rsort($contasLogadas);
var_dump($contasLogadas);

// com um array associativo
$contasLogadas = [
    "Pedro" => 1,
    "Ricardo" => 5,
    "Rebeca" => 10,
    "Julia" => 14,  
    "Maicon" => 3,
    "Rafaela" => 7
];

// do menor para o maior (ordenando pelo valor)
asort($contasLogadas);
var_dump($contasLogadas);

// do maior para o menor (ordenando pelo valor)
arsort($contasLogadas);
var_dump($contasLogadas);

// do menor para o maior (ordenando pela chave)
ksort($contasLogadas);
var_dump($contasLogadas);

// do maior para o menor (ordenando pela chave)
krsort($contasLogadas);
var_dump($contasLogadas);
