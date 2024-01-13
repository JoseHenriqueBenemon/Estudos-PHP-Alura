<?php 
/*
retornando uma exception
*/
$splObject = new SplFixedArray(1);

try{
    $div = intdiv(5, 0);
    $splObject[2] = "Index não disponível"; // -> Isso dá um exception out of range
} catch(Exception | Error $var){ // Pegando tanto uma exceção quanto um  erro
    echo $var->getMessage() . PHP_EOL;
    echo $var->GetLine() . PHP_EOL;
    echo $var->getTraceAsString() . PHP_EOL;
}

echo "Código finalizado!";

/*
retornando um erro
*/

// echo intdiv(5, 0); -> isso dá um error division by zero