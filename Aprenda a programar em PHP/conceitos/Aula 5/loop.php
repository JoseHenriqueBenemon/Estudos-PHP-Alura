<?php

// loop manual
echo "Loop manual: " . PHP_EOL;
echo "#1 -" . PHP_EOL;
echo "#2 -" . PHP_EOL;
echo "#3 -" . PHP_EOL;
echo "#4 -" . PHP_EOL;
echo "#5 -" . PHP_EOL;
echo "#6 -" . PHP_EOL;
echo "#7 -" . PHP_EOL;
echo "#8 -" . PHP_EOL;
echo "#9 -" . PHP_EOL;
echo "#10 -" . PHP_EOL;
echo "#11 -" . PHP_EOL;
echo "#12 -" . PHP_EOL;
echo "#13 -" . PHP_EOL;
echo "#14 -" . PHP_EOL;
echo "#15 -" . PHP_EOL;
echo PHP_EOL;

// loop com while

$contador = 1;

echo "Loop com while: " . PHP_EOL;
while ($contador <= 15){
    echo "#$contador - " . PHP_EOL;
    $contador++;
}
echo PHP_EOL;

// loop com for

echo "Loop com for: " . PHP_EOL;
for($i = 1; $i <= 15; $i++){
    echo "#$i - " . PHP_EOL;
}
echo PHP_EOL;

// Loop com condição 

/* 
Podemos fazer isso de 3 formas diferentes
(No exemplo queremos pular o número 13 por algum motivo)

1 - primeira forma - forma mais feia de fazer
for($i = 1; $i <= 15; $i++){
    if($i == 13){

    } else {
        echo "#$i - " . PHP_EOL;
    }
}

2 - segunda forma - forma que normalmente eu usaria
for($i = 1; $i <= 15; $i++){
    if($i !== 13){
        echo "#$i - " . PHP_EOL;
    }
}

3 - terceira forma - big brain, melhor formula
for($i = 1; $i <= 15; $i++){
    if($i == 13){
        continue; //Esse continue funciona como um passar direto 
    }
    
    echo "#$i - " . PHP_EOL;
}

*/

echo "Loop com condição usando continue" . PHP_EOL;
for($i = 1; $i <= 15; $i++){
    if($i == 13){
        continue; //Esse continue funciona como um passar direto 
    }
    
    echo "#$i - " . PHP_EOL;
}
echo PHP_EOL;


echo "Quebrando o loop com break" . PHP_EOL;
for($i = 1; $i <= 15; $i++){
    if($i == 11){
        break; //Esse continue funciona como um passar direto 
    }
    
    echo "#$i - " . PHP_EOL;
}
echo PHP_EOL;