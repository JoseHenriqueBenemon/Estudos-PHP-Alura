<?php

// Aula 4

// String numéricas

/* 
 No PHP 8, as strings numéricas agora são tratadas de formas diferentes das versões anteriores
 se tivermos uma string com somente número, ela será uma string numérica válida
 se tivermos uma string com números e espaços nas extremidades, ela será uma string numérica válida
 se tivermos espaço no meio dos números, ela não será mais uma string numérica valida
 se tivermos string + numeros, ela não serpa mais uma string número válida
*/

echo 10 + '10' . PHP_EOL; // String numérica válida

echo 10 + '10 ' . PHP_EOL; // String numérica válida 

echo PHP_EOL;
// echo 10 + ' 10'; válida também
// echo 10 + ' 10 '; válida também

// echo 10 + '1 0'; string numérica inválida

// echo 10 + '10a'; string numérica inválida

// HEREDOC e NOWDOC

// HEREDOC

// HEREDOC é um jeito para delimitar uma string como aspas duplas " " porém com um maior controle

function enviarEmail(string $nome) : void
{
	// No HEREDOC qualquer palavra serve como delimitador, e ele funciona como aspas duplas, o que siginifca
	// que ele executa as variaveis que estão sendo passadas dentro dele
	echo <<< HEREDOC
	heredoc:

	Olá, $nome
	Tudo bem? Espero que sim.

	Seguindo este email tivemos que realizar as modificações no projeto:
	
	...
	
	Atenciosamente.
	

	HEREDOC;
}

enviarEmail("José Henrique");


// NOWDOC

// O NOWDOC tem exatamente o mesmo propósito porém usitilizando aspas simples ' '

function olaMundo() : void
{
	echo <<< 'NOWDOC'
	nowdoc:

	Olá mundo!!!!

	$var.


	NOWDOC;
}

olaMundo();

// Funções que só funcionam na WEB - Segurança - IMPORTANTE!!!!!!!

/* 
funcao addslashes - essa função addiciona uma barra invertida (essa barra serve para escapar de possível 
aspas, caracteres que podem quebrar o site que foram passadas para a variavel)
*/

// Exemplo: <input type="text" name="campo" value="addslashes($campo)" />

/*
funcao htmlentities - Essa função interpreta qualquer caracter especial em simbolos dinamicos como &lts,
também tem a mesma finalidade que a função acima mas mais segura

*/

// Exemplo: <input type="text" name="campo" value="htmlentities($campo)" />

/*
funcao htmlspecialchars - Essa função faz básicamente a mesma coisa que a outras porém modificando alguns 
simbolos retornandos
*/

// Exemplo: <input type="text" name="campo" value="htmlspecialchars($campo)" />

$campo = "<script>alert('perigo');</script>";
?>

<input type="text" name="campo" value="<?=htmlspecialchars($campo)?>" />

<?php

// Substituições em string

/*
funcao str_replace - Essa função vai ser útil 90% das vezes, ela pega uma palavra que o usuário quer alterar
e alterar por outra palavra ou exclui ela, passando a palavra que deseja substituir no primeiro parâmetro,
a palavra para qual gostaria de trocar e a string que gostária de alterar
*/

echo str_replace("credo","horrível", "Que nojeira que você fez aqui, credo!") . PHP_EOL; // primeiro exemplo
echo str_replace(["credo", "nojeira"],"horrível", "Que nojeira que você fez aqui, credo!") . PHP_EOL; // segundo exemplo
echo str_replace(["credo", "nojeira"], ["horrível", "droga"], "Que nojeira que você fez aqui, credo!") . PHP_EOL; // terceiro exemplo

/*
funcao strtr - Essa função funciona melhor quando queremos trocar um caracter especifico por outro 
(um char especifico por outro), ou quando queremos passar uma array por associação como parâmetro
*/

echo strtr("Eu não gosto de batata doce e nem de pimentão", ["batata" => "porco", "pimentão" => "beterraba"]) . PHP_EOL; // primeiro exemplo
echo strtr("Eu sou o José", 'é', 'e') . PHP_EOL;