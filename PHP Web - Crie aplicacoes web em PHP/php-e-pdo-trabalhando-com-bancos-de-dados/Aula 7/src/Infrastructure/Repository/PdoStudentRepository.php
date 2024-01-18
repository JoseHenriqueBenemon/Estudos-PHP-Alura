<?php 

namespace Alura\Php\Pdo\Infrastructure\Repository;

use Alura\Php\Pdo\Domain\Model\Phone;
use Alura\Php\Pdo\Domain\Model\Student;
use Alura\Php\Pdo\Domain\Repository\StudentRepository;
use PDO;
use PDOStatement;
use DateTimeImmutable;

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

    public function studentsWithPhone(): array
    {
        $sql = "SELECT  std.id,
                        std.name,
                        std.birthDate,
                        phn.id AS idPhone,
                        phn.areaCode, 
                        phn.number 
                    FROM students std 
                    INNER JOIN phones phn ON std.id = phn.idStudent;";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        $studentList = [];
        while ($row = $stmt->fetch()) {
            if (!array_key_exists($row['id'], $studentList)) { 
                $studentList[$row['id']] = new Student(
                    $row['id'],
                    $row['name'],
                    new DateTimeImmutable($row['birthDate']) 
                );
            }

            $phone = new Phone(
                $row['idPhone'],
                $row['areaCode'],
                $row['number']
            );

            $studentList[$row['id']]->setPhone($phone);
        }    

        return $studentList;
    }

    public function studentsBirthAt(\DateTimeInterface $birthDate): array
    {   
        $sql = "SELECT * FROM students WHERE birthDate = :birthDate;";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(":birthDate", $birthDate->format("Y-m-d"));
        $stmt->execute();
    
        return $this->hydrateStudentList($stmt);
    }

    private function hydrateStudentList(PDOStatement $stmt) : array
    {
        $arrStudentList = [];

        while ($studentData = $stmt->fetch()) {
            $arrStudentList[] = new Student(
                $studentData['id'],
                $studentData['name'], 
                new DateTimeImmutable($studentData['birthDate'])
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

    private function insert(Student $student): bool
    {
        $sql = "INSERT INTO students (name, birthDate) VALUES (:name, :birthDate);";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(":name", $student->getName());
        $stmt->bindValue(":birthDate", $student->getBirthDate()->format("Y-m-d"));
        $sucess = $stmt->execute();

        if($sucess){
            $student->setId($this->connection->lastInsertId());
        }

        return $sucess;
    }

    private function update(Student $student): bool
    {   
        if(!is_null($student->getId())){
            throw new \DomainException("Você não pode alterar um estudante sem id!");
        }

        $sql = "UPDATE students SET name = :name, birthDate = :birthDate WHERE id = :id;";
        $stmt = $this->connection->prepare($sql);
        
        $result = $stmt->execute([
            ":name" => $student->getName(),
            ":birthDate" => $student->getBirthDate()->format("Y-m-d"),
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
