<?php 

try{
    $dirDB = __DIR__ . "/banco.sqlite";
    $pdo = new PDO("sqlite:$dirDB");

} catch(Throwable $e){
    echo "Tivemos um problema na conexão com o Banco de Dados. \n Erro: {$e->getMessage()}";
}