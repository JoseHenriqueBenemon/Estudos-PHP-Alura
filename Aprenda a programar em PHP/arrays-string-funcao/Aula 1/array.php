<?php

// Um array serve para guardar dados de forma mais organizada 
// Do que simplesmente colocar em variaveis com nomes diferentes

$idadeArr = [12, 25, 41, 23, 54, 30];

$primeiraIdade = $idadeArr[0];

echo $primeiraIdade . PHP_EOL;

// Mostrando todas as idades dentro do array

for( $i = 0; $i < count($idadeArr); $i++ ){
    echo "Idade " . $i + 1 . ": ".$idadeArr[$i] . PHP_EOL;
}

// Exercicio Arrays

$nomes = array("João", "Maria", "Pedro", "Ana");

for($i = 0; $i < count($nomes); $i++){
    $nextI++;
    echo "Nome $nextI:" . $nomes[$i] . PHP_EOL; 
}