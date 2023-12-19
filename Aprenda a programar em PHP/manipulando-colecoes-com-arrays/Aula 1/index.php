<?php

// Estrutura de um array 

// No php só podemos criar um array com esses dois tipos na chave (int ou string)
$arrComInt = [
    0 => "zero",
    1 => "um",
    2 => "dois"
];

$arrComString = [
    "zero" => 0,
    "um" => 1,
    "dois" => 2
];

// Documentação importantes do capitulo

// https://www.php.net/manual/en/language.types.integer.php#language.types.integer.casting


// Funcionalidades já conhecidas

// loop
for ($i = 0; $i < count($arrComInt); $i++) { // ou while
    echo $arrComInt[$i];
}

foreach($arrComString as $chave => $indice) {
    echo "$chave - $indice";
}

// count

echo count($arrComInt); // count
echo sizeof($arrComString); // sizeof - mesma coisa que o count
