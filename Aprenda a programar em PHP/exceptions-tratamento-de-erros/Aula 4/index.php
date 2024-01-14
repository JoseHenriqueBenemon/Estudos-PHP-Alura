<?php 

/*
Pegando qualquer tipo de exceção ou erro
*/

function funcao1()
{
    echo 'Iniciando função 1...' . PHP_EOL;
}

function funcao2()
{
    echo 'Iniciando função 2...' . PHP_EOL;
}


// Podemos fazer desse jeito
try {
    funcao1();
} catch(Exception | Error $e){
    echo $e->getMessage();
}

// Ou desse jeito
try{
    funcao2();
} catch(Throwable $throwable) {
    echo $throwable->getMessage();
}

/*
Criando uma exceção própria
*/

class MyException extends DomainException // DomainException -> Uma exceção do meu dominio, uma exceção minhas
{

}

try{
    throw new MyException('123');
} catch(MyException $e){
    echo $e->getMessage();
}