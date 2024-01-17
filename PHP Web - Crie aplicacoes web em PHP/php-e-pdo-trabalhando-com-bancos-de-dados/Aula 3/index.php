<?php 

require_once "vendor/autoload.php";
require_once "connection.php";

use Alura\Php\Pdo\Domain\Model\Student;

$student = new Student(1, 'José Henrique', new DateTimeImmutable("2002-11-29"));

/*
Utilizando Prepared Statements para proteger de ataques SQL Injection
*/

$sql = "INSERT INTO students (name, birthDate) VALUES(:name, :birthDate);";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(":name", $student->getName());
$stmt->bindValue(":birthDate", $student->getBirthDate()->format("d/m/Y"));

if($stmt->execute()){
    echo 'Estudante inserido com sucesso!' . PHP_EOL;
} else {
    echo 'Não foi possível inserir o estudante!' . PHP_EOL;
}

/*
Diferença entre exec() e execute()

exec() -> traz a quantidade de linhas afetas pelo comando que inserimos nessa função
Então se dermos um DELETE FROM students WHERE id >= 1;
Irá retornar de 1 até n linhas

execute() -> traz se o sql foi bem sucedido (true) ou teve algum problema (false)
Então se fizermos um SELECT * FROM students;
Ele irá nos retornar 1 caso a execução der certo ou 0 caso tenha algum problema com o código
*/

/*
Diferença entre bindValue e bindParam

bindValue -> Recebe uma variavel e pega o que tem dentro dela e coloca na query (by value)

bindParam -> Recebe um ponteiro para alocar o valor dentro da variavel na query (by reference)

bindValue:

$sex = 'male';
$s = $dbh->prepare('SELECT name FROM students WHERE sex = :sex');
$s->bindValue(':sex', $sex);
$sex = 'female';
$s->execute(); // Executado quando $sex = 'male'

No caso acima, mesmo que a variavel tenha mudado antes de ser executada
o valor de dentro não mudou por que bindValue pega o valor de dentro da variavel

bindParam: 

$sex = 'male';
$stmt = $pdo->prepare('SELECT name FROM students WHERE sex = :sex');
$stmt->bindParam(':sex', $sex);
$sex = 'female';
$stmt->execute(); // Executado quando $sex = 'female'

No caso acima, como a variavel foi alterada antes de ser executada o valor
de dentro dela foi alterada e a execução foi com a segunda variavel definida
valor passado por referência, referenciando a variavel não o valor

*/

/*
Excluindo uma linha no banco de dados passando o id
*/

$sql = "DELETE FROM students WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", 1, PDO::PARAM_INT); // No 3° argumento da função bindValue, passamos qual será o tipo da variavel passada

if($stmt->execute()){
    echo 'Estudante deletado com sucesso!' . PHP_EOL;
} else {
    echo 'Não foi possível deletar o estudante!' . PHP_EOL;
}
