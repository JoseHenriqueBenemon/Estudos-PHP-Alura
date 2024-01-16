<?php 

require_once "vendor/autoload.php";

use Alura\Php\Pdo\Domain\Model\Student;

$student = new Student(1, 'José Henrique', new DateTimeImmutable("2002-11-29"));

echo $student->getAge();