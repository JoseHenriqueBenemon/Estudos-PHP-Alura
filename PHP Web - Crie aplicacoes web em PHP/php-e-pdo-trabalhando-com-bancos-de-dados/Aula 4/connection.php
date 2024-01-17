<?php 

try{
    $dirDB = __DIR__ . "/banco.sqlite";
    $pdo = new PDO("sqlite:$dirDB");
    $stmt = $pdo->query("SELECT true FROM sqlite_master WHERE type='table' AND name='students';")->fetchAll();
    
    if(!$stmt){
        $pdo->exec("CREATE TABLE students(
            id INTEGER PRIMARY KEY,
            name TEXT,
            birthDate TEXT 
        );");
    }

} catch(Throwable $e){
    echo "Tivemos um problema na conexão com o Banco de Dados. \n Erro: {$e->getMessage()}";
}
