<?php

require_once "./vendor/autoload.php";

use Alura\Php\Serenatto\Infrastructure\Persistence\ConnectionCreator;
use Alura\Php\Serenatto\Infrastructure\Repository\ProductRepository;

$pdo = ConnectionCreator::createConnection();

$productRepository = new ProductRepository($pdo);

$arrProductList = $productRepository->getAllProduct();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    table td, table th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    table tr:nth-child(even){background-color: #f2f2f2;}

    table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
    </style>
</head>
<body>
    <table>
      <thead>
        <tr>
          <th>Produto</th>
          <th>Tipo</th>
          <th>Descricão</th>
          <th>Valor</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach (['breakfast', 'lunch'] as $productType) : ?>
          <?php foreach ($arrProductList[$productType] as $productItem): ?>
            <tr>
              <td><?=$productItem->getTitle()?></td>
              <td><?=$productItem->getType()?></td>
              <td><?=$productItem->getDescription()?></td>
              <td><?=$productItem->getPriceFormat()?></td>
            </tr>
          <?php endforeach; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
</body>
</html>