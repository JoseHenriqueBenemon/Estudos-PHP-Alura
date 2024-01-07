<?php 

/*
Lendo dados do teclado - maneira mais complexa
*/

$teclado = fopen("php://stdin", 'r');

// echo "Nome do curso: ";
// $curso = fgets($teclado);

// file_put_contents("lista-de-cursos.txt", "$curso", FILE_APPEND);

fclose($teclado);

/*
Lendo dados do teclado - maneira mais simples
*/

// echo "Nome do curso: ";
// $curso = fgets(STDIN); // Constante que abre o fopen automáticamente

// file_put_contents("lista-de-cursos.txt", "$curso", FILE_APPEND);

/*
Nova forma que exibir mensagem - sem utilizar o echo
*/

// forma mais complexa
$echo = fopen("php://stdout", "w"); // É a mesma coisa do echo só que bem maior
fwrite($echo,"Saida com STDOUT! \n");

fclose($echo);

$exit = fopen("php://stderr", "w"); // Ele tem uma propriedade que faz com que a saida seja de um tipo diferente 
fwrite($exit,"Saida com STDERR! \n");

fclose($exit);

// forma mais simplificado
fwrite(STDOUT, "Saida com STDOUT \n");

fwrite(STDERR, "Saida com STDERR \n");

// Mostrando na tela algo dentro de um arquivo .zip sem precisar salvar ou abrilo

$file = fopen("zip://arquivo-zipado.zip#lista-de-cursos.txt", "r");

/*
funcao stream_copy_to_stream - Essa função traz a copia de um conteudo de um stream 
(no caso abaixo um stream .zip) para outro (no caso o nosso console STDOUT)
*/
stream_copy_to_stream($file, STDOUT);
