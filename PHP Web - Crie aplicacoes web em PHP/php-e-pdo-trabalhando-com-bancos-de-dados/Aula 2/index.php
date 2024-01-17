<?php 

require_once "vendor/autoload.php";
require_once "connection.php";

use Alura\Php\Pdo\Domain\Model\Student;

$student = new Student(1, 'José Henrique', new DateTimeImmutable("2002-11-29"));

/*
Inserindo um aluno no banco de dados sqlite
*/

$sql = "INSERT INTO students (name, birthDate) VALUES ('{$student->getName()}', '{$student->getBirthDate()->format("d/m/Y")}')";

$stmt = $pdo->exec($sql);

if($stmt){
    echo 'Estudante inserido com sucesso!' . PHP_EOL;
} else {
    echo 'Não foi possível inserir o aluno, tente novamente' . PHP_EOL;
}


/*
Pegando todos os retornos da tabela
*/

$sql = "SELECT * FROM students;";

$stmt = $pdo->query($sql);
$studentDataList = $stmt->fetchAll(PDO::FETCH_ASSOC);

$studentList = [];
echo "Pegando diversos estudantes: " . PHP_EOL;
if(!empty($studentDataList)){
    foreach($studentDataList as $studentData){
        $date = DateTimeImmutable::createFromFormat('d/m/Y', $studentData['birthDate']);
        $studentData['birthDate'] = $date->format('Y-m-d');

        $studentList[] = new Student(
            $studentData['id'], 
            $studentData['name'], 
            new DateTimeImmutable($studentData['birthDate'])
        );
    }

    var_dump($studentList);
}

/*
Pegando somente um valor no meu banco de dados
*/

$sql = "SELECT * FROM students WHERE id = 1;";

$stmt = $pdo->query($sql);
$studentData = $stmt->fetch(PDO::FETCH_ASSOC);

$date = DateTimeImmutable::createFromFormat('d/m/Y', $studentData['birthDate']);
$studentData['birthDate'] = $date->format('Y-m-d');

echo "Pegando um estudante pelo ID: " . PHP_EOL;
$student = new Student(
    $studentData['id'], 
    $studentData['name'], 
    new DateTimeImmutable($studentData['birthDate'])
);

var_dump($student);

/*
Pegando diversos resultados porém passando de um em um
*/

$sql = "SELECT * FROM students;";

$stmt = $pdo->query($sql);

echo "Pegando a idade de diversos alunos mas sem alucar muitas instancias: " . PHP_EOL;
while($studentData = $stmt->fetch(PDO::FETCH_ASSOC)){
    $date = DateTimeImmutable::createFromFormat('d/m/Y', $studentData['birthDate']);
    $studentData['birthDate'] = $date->format('Y-m-d');
    
    $student = new Student(
            $studentData['id'], 
            $studentData['name'], 
            new DateTimeImmutable($studentData['birthDate'])
        );

    echo $student->getAge() . PHP_EOL;
}

/*
Podemos cada resultado por coluna utilizando o fetchColumn
*/

$sql = "SELECT * FROM students WHERE id = 1;";

$stmt = $pdo->query($sql);
$studentName = $stmt->fetchColumn(1); //Pegando o indice 1 -> nome
echo "Pegando o nome do estudante pelo ID: $studentName" . PHP_EOL;

/*
Podemos instanciar cada resultado dentro de um objeto de classe com fetchObject
*/

// $sql = "SELECT * FROM students WHERE id = 1;";
// $stmt = $pdo->query($sql);

// Isso irá retornar um erro pois temos a regra que toda a data tem que ser 
// do tipo DateTimeImmutable porém só consguimos salvar string ou int no banco de dados sqlite
// $studentName = $stmt->fetchOBject(Student::class); 
// echo "Pegando o nome do estudante pelo ID: $studentName" . PHP_EOL;

