<?php 

namespace Alura\Php\Pdo\Infrastructure\Persistence;

use PDO;

class ConnectionCreator
{
    public static function createConnection(): PDO
    {
        $dirDB = __DIR__ . "/../../../banco.sqlite";
        $pdoConnection = new PDO("sqlite:$dirDB");
        $pdoConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdoConnection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        
        return $pdoConnection;
    }
}
