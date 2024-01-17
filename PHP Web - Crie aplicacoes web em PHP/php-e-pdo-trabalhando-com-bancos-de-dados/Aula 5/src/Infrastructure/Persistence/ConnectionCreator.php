<?php 

namespace Alura\Php\Pdo\Infrastructure\Persistence;

use PDO;

class ConnectionCreator
{
    public static function createConnection(): PDO
    {
        $dirDB = __DIR__ . "/../../../banco.sqlite";

        return new PDO("sqlite:$dirDB");
    }
}
