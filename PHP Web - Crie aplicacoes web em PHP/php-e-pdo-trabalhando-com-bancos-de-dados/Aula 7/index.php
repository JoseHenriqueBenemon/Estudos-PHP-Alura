<?php 

require_once "vendor/autoload.php";

use Alura\Php\Pdo\Domain\Model\Student;
use Alura\Php\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Php\Pdo\Infrastructure\Repository\PdoStudentRepository;


try {
    $pdoConnection = ConnectionCreator::createConnection();
    $studentRepository = new PdoStudentRepository($pdoConnection);
    
    $pdoConnection->beginTransaction();
    
    $aStudent = new Student(
        NULL, 
        'Rafael Santiago',
        new DateTimeImmutable("2001-01-01")
    );
    
    $studentRepository->save($aStudent);
    
    $anotherStudent = new Student(
        NULL,
        'Fabio de Melo',
        new DateTimeImmutable("1980-10-01")
    );  
    
    $studentRepository->save($anotherStudent);
    $pdoConnection->commit();
    
} catch (PDOException $e) {
    echo $e->getMessage() . PHP_EOL;
    $pdoConnection->rollBack();
}
