<?php 

namespace Alura\Php\Pdo\Infrastructure\Persistence;

use PDO;

class ConnectionCreator
{
    public static function createConnection(): PDO
    {   
        // SQLITE
        // $dirDB = __DIR__ . "/../../../banco.sqlite";
        // $pdoConnection = new PDO("sqlite:$dirDB");

        // MYSQL
        $host = "localhost";
        $dbName = "";
        $user = "";
        $pwd = "";
        $pdoConnection = new PDO(
            "mysql:host=$host;dbname=$dbName",
            $user,
            $pwd
        );

        $pdoConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdoConnection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        
        return $pdoConnection;
    }
}
