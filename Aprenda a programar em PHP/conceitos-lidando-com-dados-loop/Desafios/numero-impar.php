<?php

echo "Números impares até 100: " . PHP_EOL;
for( $i = 0; $i <= 100; $i++ ){
    if( $i % 2 != 0){
        echo "O número $i é impar!" . PHP_EOL;
    }
}