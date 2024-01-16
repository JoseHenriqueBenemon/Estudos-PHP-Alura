<?php 

namespace Alura\Php\Pdo\Domain\Model;

use DateTimeImmutable;

class Student
{
    public readonly int $id;

    public string $name;

    public DateTimeImmutable $birthDate;

    public function __construct(int $id, string $name, DateTimeImmutable $birthDate)
    {   
        $this->id = $id;
        $this->name = $name;
        $this->birthDate = $birthDate;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBirthDate(): DateTimeImmutable
    {
        return $this->birthDate;
    }

    public function getAge(): int
    {
        return $this->birthDate
        ->diff(new DateTimeImmutable)
        ->y;
    }
}

