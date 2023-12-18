<?php

// Array associativo simples
$contaJose = [ 
    'titular' => 'José Henrique', 
    'saldo' => 1500.00 
];

$contaJoao = [ 
    'titular' => 'João Guilherme', 
    'saldo' => 1050.00 
];

$contasFelipe = [ 
    'titular' => 'Felipe Melo', 
    'saldo' => 200.20 
];

// Array associativo multidimensional
$contasCorrentesFor = [
    $contaJose,
    $contaJoao, 
    $contasFelipe
];

$contasCorrentesForeach = [
    "50860793818" => [ 
        'titular' => 'José Henrique', 
        'saldo' => 1500.00 
    ], 
    "07576233877" => [ 
        'titular' => 'João Guilherme', 
        'saldo' => 1050.00 
    ], 
    "00747235880" => [ 
        'titular' => 'Felipe Melo', 
        'saldo' => 200.20 
    ]
];
// Adicionando novos array ao array associativo simples multidimensional 'contasCorrentesForeach'
$contasCorrentesFor[] = [
    'titular' => 'Invenção',
    'saldo' => 1230.10
];

// Adicionando novos array ao array associativo complexo multidimensional 'contasCorrentesForeach'
$contasCorrentesForeach['12345678910'] = [
    'titular' => 'Invenção',
    'saldo' => 1230.10
];

// Utilizando for para acessar os arrays
echo "----------------------for--------------------------" . PHP_EOL;
for($i = 0; $i < count($contasCorrentesFor); $i++){

   echo "Titular " . $i+1 . ": " . $contasCorrentesFor[$i]['titular'] . ", saldo: " . $contasCorrentesFor[$i]["saldo"] . PHP_EOL;
}

echo "----------------------foreach--------------------------" . PHP_EOL;
// Utilizando foreach para acessar os arrays

foreach($contasCorrentesForeach as $chave => $conta){ 
    // para acessarmos a chave/indice do array no array multidimensional podemos usar $chave => $conta para pegarmos o resultado
    echo "Titular do CPF $chave: " . $conta['titular'] . ", saldo: ". $conta['saldo'] .  PHP_EOL;
}
 
// Possiveis tipos de dados em chaves de array associativos

$testArray = [
    0 => 'Tipo 1', // Podemos utilizar int, porém somente int em todas as chaves
    'String' => 'Tipo 2', // Podemos utilizar string, porém somente string em todas as chaves
    // 1.5 => 'Tipo 3', // Não podemos utilizar double/float como chave me array associativo
    // true => 'Tipo 4' // Não podemos utilizar boolean como chave me array associativo
];

// Devemos utilizar somente 1 tipo de dado como chave para um array associativo

// Atividade Array Associativo

$carro = [
    'marca' => 'VW',
    'modelo' => 'Golf'
];

$carros = [
    'LMS-2312' => $carro
];

$carros['OXT-3212'] = [
    'marca' => 'BMW',
    'modelo' => 'SW 100'
];

echo "----------------------atividade-----------------------" . PHP_EOL;
foreach($carros as $chave => $carro){
    echo "Placa: $chave" .' -> Marca: '. $carro['marca'] . ' e modelo: ' . $carro['modelo'] . PHP_EOL;
}