<?php 

namespace Alura\Php\Pdo\Infrastructure\Repository;

use Alura\Php\Pdo\Domain\Model\Student;
use Alura\Php\Pdo\Domain\Repository\StudentRepository;
use PDO;
use PDOStatement;

class PdoStudentRepository implements StudentRepository
{   
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function allStudents(): array
    {   
        $sql = "SELECT * FROM students;";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        return $this->hydrateStudentList($stmt);
    }

    public function studentsBirthAt(\DateTimeInterface $birthDate): array
    {   
        $sql = "SELECT * FROM students WHERE birthDate = :birthDate;";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(":birthDate", $birthDate->format("Y-m-d"));
        $stmt->execute();
    
        return $this->hydrateStudentList($stmt);
    }

    public function hydrateStudentList(PDOStatement $stmt) : array
    {
        $arrStudentList = [];

        while ($studentData = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $arrStudentList[] = new Student(
                $studentData['id'],
                $studentData['name'], 
                $studentData['birthDate']
            );
        }

        return $arrStudentList;
    }

    public function save(Student $student): bool
    {
        if (is_null($student->getId())) {
            return $this->insert($student);
        }

        return $this->update($student);
    }

    public function insert(Student $student): bool
    {
        $sql = "INSERT INTO students (name, birthDate) VALUES (:name, :birthDate);";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(":name", $student->getName());
        $stmt->bindValue(":birthDate", $student->getBirthDate());
        $stmt->execute();

        if($stmt){
            $student->setId($this->connection->lastInsertId());
        }

        return $stmt;
    }

    public function update(Student $student): bool
    {   
        if(!is_null($student->getId())){
            throw new \DomainException("Você não pode alterar um estudante sem id!");
        }

        $sql = "UPDATE students SET name = :name, birthDate = :birthDate WHERE id = :id;";
        $stmt = $this->connection->prepare($sql);
        
        $result = $stmt->execute([
            ":name" => $student->getName(),
            ":birthDate" => $student->getBirthDate(),
            ":id" => $student->getId()
        ]);

        return $result;
    }

    public function remove(Student $student): bool
    {   
        $sql = "DELETE FROM students WHERE id = :id;";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(":id", $student->getId(), PDO::PARAM_INT);

        return $stmt->execute();
    }
}
