<?php

require_once './vendor/autoload.php';

use Alura\Php\Serenatto\Infrastructure\Persistence\ConnectionCreator;
use Alura\Php\Serenatto\Infrastructure\Repository\ProductRepository;

$idProduct = $_POST['idProduct'];

$productRepository = new ProductRepository(ConnectionCreator::createConnection());

try {
    $productRepository->deleteById($idProduct);
    header("Location: admin.php");
} catch (Throwable $e) {
    echo $e->getMessage();
}


