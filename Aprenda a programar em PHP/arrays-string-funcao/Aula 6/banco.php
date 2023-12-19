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

// Documentação importante da Aula

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PHP WEB - Alura</title>
</head>
<body>
	<h2 style='margin: 0px;'>Contas no sistema: </h2>
	<dl>
	<?php foreach($contasCorrentesForeach as $cpf => $conta) { ?>
			<dt><h4><?=$conta['titular']?> - <?=$cpf?></h4></dt>
			<dd>Saldo: <?=$conta['saldo']?></dd>
			<?php } ?>
	</dl>
</body>
</html>