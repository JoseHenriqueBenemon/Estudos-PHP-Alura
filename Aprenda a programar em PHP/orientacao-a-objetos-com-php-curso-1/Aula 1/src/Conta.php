<?php

function criarConta(string $cpf, string $titular, int|float $saldo) : array
{
    return [
        $cpf => [
            'titular' => $titular,
            'saldo' => $saldo
        ]
    ];
}