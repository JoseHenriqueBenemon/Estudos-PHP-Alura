<?php 

namespace Alura\Php\Serenatto\Infrastructure\Persistence;

use PDO;
use Throwable; 
use DomainException;     

class ConnetionCreator  
{
    public static function createConnection(): PDO
    {   
        // MySQL
        try{
            $host = "localhost";
            $dbName = "serenatto";
            $user = "root";
            $pwd = "58318012J@sek";

            $pdoConnection = new PDO(
                "mysql:host=$host;dbname=$dbName",
                $user,
                $pwd
            );

            $pdoConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdoConnection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            return $pdoConnection;
        } catch (Throwable $e) {
            throw new DomainException("Não foi possível conectar com o banco de dados. Erro: {$e->getMessage()}");
        }
        
    }
}

