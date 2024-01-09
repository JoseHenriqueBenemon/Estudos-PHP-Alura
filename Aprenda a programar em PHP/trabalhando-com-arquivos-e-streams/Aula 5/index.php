<?php 

/*
Usando métodos com HTTP Rest (GET, POST, DELETE e PUT)
*/

$context = stream_context_create([
    "http"=> [
        "method" => "POST",
        "header" => "X-From: PHP\r\nContent-type: text/plain",
        "content"=> "Teste de corpo da requisicao"
    ]
]);

echo file_get_contents("https://httpbin.org/post", false, $context);

/*
Abrindo e pegando conteúdo de um arquivo zipado com senha
*/

$context = stream_context_create([
    'zip' => [
        'password' => '1234'
    ]
]);

$zipUri = "zip://compactadoComSenha#fact-cat.txt";

echo file_get_contents($zipUri, false, $context);

// A extração do conteúdo de dentro de um arquivo zip com senha não está funcionando