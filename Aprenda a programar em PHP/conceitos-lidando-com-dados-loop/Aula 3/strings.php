<?php

$texto = "Olá mundo!";

echo $texto . "\n";

$idade = 21;

// com aspas simples - mais dificil
echo $texto . ' Minha idade é: ' . $idade . " anos\n";

// com aspas duplas - mais simples
echo "$texto Minha idade é: $idade anos\n";

// quebra de linha

echo "\n"; //ou
echo "Oi" . PHP_EOL; //php end of line = php fim da linha = quebra de linha

// tabulação

echo "\t Este texto está tabulado!";