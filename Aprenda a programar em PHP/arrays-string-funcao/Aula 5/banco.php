<?php

require_once 'funcoes.php';

// Array associativo multidimensional
$contasCorrentesForeach = [
	'123.456.789-10' => [
		'titular' => 'José',
		'saldo' => 1250.00
	],
	'123.456.789-11' => [
		'titular' => 'Maria',
		'saldo' => 5500.00
	],
	'123.256.798-12' => [
		'titular' => 'Renato',
		'saldo' => 700.00
	]
];

// Fazendo um saque manual
// $contasCorrentesForeach['123.456.789-11']['saldo'] -= 500;

// // Fazendo um saque por função
$contasCorrentesForeach['123.456.789-11'] = sacar($contasCorrentesForeach['123.456.789-11'], 2000);

// Utilizando a função sacar novamente
$contasCorrentesForeach['123.456.789-10'] = sacar($contasCorrentesForeach['123.456.789-10'], 2000);

// Utilizndo a função depoisitar
$contasCorrentesForeach['123.456.789-10'] = depositar($contasCorrentesForeach['123.456.789-10'], 2000);

// Mostrando os resultados para o usuário
echo '---- Mostrando os resultados antes da alteração -----' . PHP_EOL;
echo '---- (sem utilizar list) -----' . PHP_EOL;
foreach($contasCorrentesForeach as $chave => $conta) {
	exibeMensagem("$chave {$conta['titular']}: R$ {$conta['saldo']}");  
}

// Fazendo uma condição para verificar se o saldo na conta do cliente é suficiente
if($contasCorrentesForeach ['123.456.789-10']['saldo'] >= 500){
	$contasCorrentesForeach['123.456.789-10'] = sacar($contasCorrentesForeach['123.456.789-10'], 500);
} else {
	exibeMensagem("Você não tem saldo para efetuar esse saque. Saldo: {$contasCorrentesForeach['123.456.789-10']['saldo']}");
}

// Modificando o titular para que todas as letras do nome dele sejam minusculas
// Usando valores por referencia (pass by reference)
titularComLetrasMinusculas($contasCorrentesForeach['123.456.789-10']);

// remove uma conta do array que criamos
unset($contasCorrentesForeach['123.256.798-12']);

// Mostrando os resultados para o usuário
echo '---- Mostrando os resultados depois da alteração -----' . PHP_EOL;
echo '---- (utilizando list) -----' . PHP_EOL;
foreach($contasCorrentesForeach as $chave => $conta) {
	// list('titular' => $conta['titular'], 'saldo' => $conta['saldo']) = $conta; forma menos usada
	['titular' => $titular, 'saldo' => $saldo] = $conta; // forma mais enxuta

	exibeMensagem("$chave $titular: R$ $saldo");  
}


// Documentação importante da Aula

// www.php.net/manual/en/book.mbstring.php