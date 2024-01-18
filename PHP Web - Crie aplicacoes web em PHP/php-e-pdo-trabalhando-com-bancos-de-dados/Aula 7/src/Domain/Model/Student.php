<?php 

namespace Alura\Php\Pdo\Domain\Model;

use DateTimeImmutable;

class Student
{
    private ?int $id;

    private string $name;

    private DateTimeImmutable $birthDate;
    
    /**
     * @var Phone[]
     */
    private array $phones = [];

    public function __construct(?int $id, string $name, DateTimeImmutable $birthDate)
    {   
        $this->id = $id;
        $this->name = $name;
        $this->birthDate = $birthDate;
    }

    public function setId(int $id): void
    {
        if(!is_null($this->id)){
            throw new \DomainException("Você não pode alterar um id que já existe no sistema!");
        }

        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function getName(): string
    {
        return $this->name;
    }

    public function getBirthDate(): DateTimeImmutable
    {
        return $this->birthDate;
    }

    public function setPhone(Phone $phone): void
    {
        $this->phones[] = $phone;
    }

    /**
     * @return Phone[]
     */
    public function getPhone(): array
    {
        return $this->phones;
    }

    public function getAge(): int
    {
        return $this->birthDate
        ->diff(new DateTimeImmutable)
        ->y;
    }
}

