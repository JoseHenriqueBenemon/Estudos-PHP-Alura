<?php 

require_once "vendor/autoload.php";

use Alura\Php\Pdo\Domain\Model\Student;
use Alura\Php\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Php\Pdo\Infrastructure\Repository\PdoStudentRepository;

/*
Iniciando com transações - Criando uma turma com Student
*/

$connection = ConnectionCreator::createConnection();
$repository = new PdoStudentRepository($connection);

$connection->beginTransaction();

$aStudent = new Student(
    NULL,
    "José Henrique",
    new DateTimeImmutable("2002-11-29")
);

$repository->save($aStudent);

$anotherStudent = new Student(
    NULL,
    "Sergio Henrique",
    new DateTimeImmutable("2001-05-10")
);

$repository->save($anotherStudent);

// $connection->commit(); // Caso queria salvar no banco

// $connection->rollBack(); // Caso não queria salvar no banco