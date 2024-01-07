<?php

// Criação de Filtros bem complexo, realizar exericicios e estudar mais afundo em outro momento
require_once 'Filtro.php';

/*
Para ativar a extração de conteúdos de api com https precisamos habilitar o OpenSSL

Edite o php.ini do XAMPP:
Abra o arquivo php.ini, que está localizado no diretório xampp\php, usando um editor de texto.
Remova o ponto e vírgula (;) da frente da linha ;extension=openssl para habilitar a extensão OpenSSL.
*/

$factCat = file_get_contents("https://catfact.ninja/fact");
// file_put_contents("fact-cat.txt", $factCat . "\n", FILE_APPEND);

/*
Lendo um arquivo .zip
*/

// echo file_get_contents("zip://fact-cat.zip#fact-cat.txt");


/*
Aplicando um filtro na entrada da stream
*/

$file = fopen("fact-cat.txt", "r");

// Criando um filtro que verifica se no texto tem o número 5 em cada linha
stream_filter_register("streams.verify5", Filtro::class);
stream_filter_append($file, "streams.verify5");

echo fread($file, filesize("fact-cat.txt"));

fclose($file);

