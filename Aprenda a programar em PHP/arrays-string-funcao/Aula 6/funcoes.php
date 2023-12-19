<?php
function exibeMensagem(string $mensagem): void
{
	echo "<h4 style='margin: 0px;'>$mensagem</h4><br />";
}

function exibeConta(string $chave, array $conta) : void
{
  // $html = "<li>Conta: $chave - Titular: {$conta['titular']} - Saldo: {$conta['saldo']}"; modo sem usar list
  // echo $html;
  
  ['titular' => $titular, 'saldo' => $saldo] = $conta; // método usando list
  
  echo "<li>Conta: $chave - Titular: $titular - Saldo: $saldo";
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

function titularComLetrasMinusculas(array &$conta) : void
{
  $conta['titular'] = mb_strtolower($conta['titular']);
}
