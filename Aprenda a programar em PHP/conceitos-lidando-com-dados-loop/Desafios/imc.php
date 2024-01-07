<?php

$altura = 1.80;
$peso = 70;
$imc = $peso / $altura ** 2;

$nomenclatura = match(true){
    $imc < 18.4 => 'abaixo',
    $imc >= 18.5 &&  $imc <= 24.9 => 'dentro',
    $imc > 25 => 'acima'
};

echo "O IMC de altura $altura e de peso $peso está: $nomenclatura do esperado!";