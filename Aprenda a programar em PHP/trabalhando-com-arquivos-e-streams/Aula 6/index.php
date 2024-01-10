<?php 

/*
Reunindo dois arquivos e salvando em um csv
*/

// Pegando os cursos como array usando a função file()
$cursosEstudados = file("cursos-estudados.txt");

$cursosRestantes = file("cursos-restantes.txt");

var_dump($cursosEstudados)  . PHP_EOL;

var_dump($cursosRestantes)  . PHP_EOL;

$fileCSV = fopen("cursos.csv", "w+");

foreach($cursosEstudados as $curso){
    $row = [trim($curso), "Sim"];

    fputcsv($fileCSV, $row, ";"); // Maneira melhor

    // fwrite($fileCSV, implode(";", $row)); // Maneira estranha


}

foreach($cursosRestantes as $curso){
    $row = [trim($curso), "Não"];

    fputcsv($fileCSV, $row, ";"); // Terceiro argumento é o separados usado no .csv

    // fwrite($fileCSV, implode(";", $row));
}

fclose($fileCSV);

/*
Listando todos os diretórios da pasta local
*/

$currentDir = dir("."); // O ponto siginifica que estaremos pegando a uri da pasta atual que estamos trabalhando


while ($file = $currentDir->read()){ // Enquanto for possível ler arquivos nesse diretório irá retornar true
    echo $file . PHP_EOL;
}

/*
listando todas as linhas de um arquivo utilizando spl
SPL - classe para manipulação de arquivos
*/

$fileSPL = new SplFileObject("cursos.csv");

while(!$fileSPL->eof()){ // Verificando se o arquivo chegou no final 
    $row = $fileSPL->fgetcsv(";");
    
    echo $row[0] . PHP_EOL;
}