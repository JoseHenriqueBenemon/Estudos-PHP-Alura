<?php 

require_once "vendor/autoload.php";

use Alura\Php\Pdo\Domain\Model\Student;
use Alura\Php\Pdo\Infrastructure\Persistence\ConnectionCreator;

$pdo = ConnectionCreator::createConnection();

$student = new Student(1, 'José Henrique', new DateTimeImmutable("2002-11-29"));
