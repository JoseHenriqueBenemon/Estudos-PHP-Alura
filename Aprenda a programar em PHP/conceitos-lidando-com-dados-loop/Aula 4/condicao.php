<?php

$idade = 16;
$nome = "José";
$quantidadeDePessoas = 2;

echo "Você só pode entrar se tiver a partir de 18 anos ";
echo "ou se tiver pelo menos 16 e estiver acompanhado." . PHP_EOL;

echo "condição simples" . PHP_EOL . PHP_EOL;

// Condição simples
if ($idade >= 18) {
    echo "Você tem mais do que 18 anos!". PHP_EOL;
    echo 'Pode entrar!'. PHP_EOL;
} else {
    echo "Você tem menos do que 18 anos!". PHP_EOL;
    echo 'Permissão negada!'. PHP_EOL;
}

echo "condição complexa" . PHP_EOL . PHP_EOL;

// Condição complexa
if($idade >= 18){
    echo "Você tem mais do que 18 anos!". PHP_EOL;
    echo 'Pode entrar!'. PHP_EOL;
} else if($idade >= 16 && $quantidadeDePessoas >= 2){
    echo "Você ainda não tem 18 anos, mas tem pelo menos 16 ";
    echo "e está acompanhado". PHP_EOL;
    echo 'Pode entrar!'. PHP_EOL;
} else {
    echo "Você tem menos do que 16 anos ou não está companhado!". PHP_EOL;
    echo 'Permissão negada!'. PHP_EOL;
}
echo PHP_EOL;

// if tenário
$resultado = ($idade >= 18) ? "Você tem $idade anos, pode entrar!" : 
(($idade >= 16 && $quantidadeDePessoas >= 2) ? "Você não tem idade suficiente, mas está acompanhado. Pode entrar!" : 
"Você não tem idade suficiente ou não está acompanhado, permissão negada!");

echo $resultado . PHP_EOL;

