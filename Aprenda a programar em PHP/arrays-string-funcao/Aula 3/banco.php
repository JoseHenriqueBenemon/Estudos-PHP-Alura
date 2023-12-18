<?php

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
foreach($contasCorrentesForeach as $chave => $conta) {
	exibeMensagem($chave . ' ' . $conta['titular'] . ': R$' . $conta['saldo']);  
}

// Fazendo uma condição para verificar se o saldo na conta do cliente é suficiente
if($contasCorrentesForeach ['123.456.789-10']['saldo'] >= 500){
	$contasCorrentesForeach['123.456.789-10'] = sacar($contasCorrentesForeach['123.456.789-10'], 500);
} else {
	exibeMensagem('Você não tem saldo para efetuar esse saque. Saldo:' . $contasCorrentesForeach['123.456.789-10']['saldo']);
}

// Mostrando os resultados para o usuário
echo '---- Mostrando os resultados depois da alteração -----' . PHP_EOL;
foreach($contasCorrentesForeach as $chave => $conta) {
	exibeMensagem($chave . ' ' . $conta['titular'] . ': R$' . $conta['saldo']);  
}

function exibeMensagem(string $mensagem): void
{
	echo $mensagem . PHP_EOL;
}

function sacar(array $conta, float $valor): array
{
    if($conta['saldo'] >= $valor){
		($valor > 0) ? $conta['saldo'] -= $valor : exibeMensagem($conta['titular'] . ", você não pode sacar números negativos!"); 
    } else{
        exibeMensagem("\n " . $conta['titular'] . ", você não tem saldo para efetuar um saque de $valor. Saldo:" . $conta['saldo'] . "\n");
    }

    return $conta;
}

function depositar(array $conta, float $valor): array
{	
	($valor > 0 ) ? $conta['saldo'] += $valor : exibeMensagem("\n" . $conta['titular'] . ', você não pode depositar valores negativos!\n');
	
	return $conta;
}
