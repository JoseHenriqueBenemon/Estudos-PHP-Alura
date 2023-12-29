<?php

require_once 'autoload.php';

use Alura\Php\Model\Endereco;

$primeiroEndereco = new Endereco('Rua Palitão', '123', 'Apto 12', 'Jd Eureca', 'São Paulo', 'São Paulo');
$segundoEndereco = new Endereco('Rua Das Jabuticabas', '10a', 'Casa 2', 'Paraisopolis', 'São Paulo', 'São Paulo');
$terceiroEndereco = new Endereco('Avenida Júlio Prestes', '1900', 'Apto 70c', 'Centro', 'São Paulo', 'São Paulo');

echo $primeiroEndereco->__toString();
echo $segundoEndereco;
echo $terceiroEndereco->__toString();

echo $primeiroEndereco->cidade; // Usando __get

$segundoEndereco->rua = 'Rua Das frutinhas'; // Usando __set

echo $segundoEndereco->__toString();
