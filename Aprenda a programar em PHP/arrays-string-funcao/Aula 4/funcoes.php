<?php
function exibeMensagem(string $mensagem): void
{
	echo $mensagem . PHP_EOL;
}

function sacar(array $conta, float $valor): array
{
    if($conta['saldo'] >= $valor){
		($valor > 0) ? $conta['saldo'] -= $valor : exibeMensagem("{$conta['titular']}, você não pode sacar números negativos!"); 
    } else{
        exibeMensagem("\n{$conta['titular']}, você não tem saldo para efetuar um saque de $valor. Saldo: {$conta['saldo']}\n");
    }

    return $conta;
}

function depositar(array $conta, float $valor): array
{	
	($valor > 0 ) ? $conta['saldo'] += $valor : exibeMensagem("\n{$conta['titular']}, você não pode depositar valores negativos!\n");
	
	return $conta;
}