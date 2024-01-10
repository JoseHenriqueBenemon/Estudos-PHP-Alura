<?php 

/*
    UTF-8 nos arquivos externos
*/


$cursos = file("cursos-estudados.txt");

$fileCsv = fopen("cursos.csv", "w+");

foreach($cursos as $curso){
    $row = [trim( mb_convert_encoding($curso, "Windows-1252", "UTF-8")), mb_convert_encoding("Já estudei", "windows-1252", "UTF-8")];

    fputcsv($fileCsv, $row, ";");
}

fclose($fileCsv);

$spl = new SplFileObject("cursos.csv");

while(!$spl->eof()){
    $row = mb_convert_encoding($spl->fgetcsv(";"), "UTF-8", "windows-1252");

    echo $row[0] . PHP_EOL;
}

