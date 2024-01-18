<?php 

try{
    $dirDB = __DIR__ . "/banco.sqlite";
    $pdo = new PDO("sqlite:$dirDB");
    $stmt = $pdo->query("SELECT true FROM sqlite_master WHERE type='table' AND name='students';")->fetchAll();
    
    if(!$stmt){
        $sql = "CREATE TABLE IF NOT EXISTS students(
            id INTEGER PRIMARY KEY,
            name TEXT,
            birthDate TEXT);
            
            CREATE TABLE IF NOT EXISTS phones(
            id INTEGER PRIMARY KEY,
            areaCode TEXT,
            number TEXT,
            idStudent INTEGER,
            FOREIGN KEY (idStudent) REFERENCES students(id) 
        );";
        $pdo->exec($sql);
    }

} catch(Throwable $e){
    echo "Tivemos um problema na conexão com o Banco de Dados. \n Erro: {$e->getMessage()}";
}
