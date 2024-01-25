<?php 

namespace Alura\Php\Serenatto\Infrastructure\Repository;

use Alura\Php\Serenatto\Domain\Model\Product;
use PDO;

class ProductRepository
{
    private PDO $pdoConnection;

    public function __construct(PDO $pdoConnection)
    {
        $this->pdoConnection = $pdoConnection;
    }

    public function getAllProduct(): array
    {   
        $sql = "SELECT * FROM products ORDER BY price;";
        $stmt = $this->pdoConnection->prepare($sql);
        $stmt->execute();

        if($stmt){ 
            $arrProductList = $stmt->fetchAll();

            $arrProdutos = [
                "breakfast" => [],
                "lunch" => []
            ];

            foreach ($arrProductList as $productItem) {
                $product = new Product(
                    $productItem['idProduct'],
                    $productItem['type'],
                    $productItem['title'],
                    $productItem['description'],
                    $productItem['img'],
                    $productItem['price']
                );
                
                match ($product->getType()) {
                    'Café' => $arrProdutos['breakfast'][] = $product,
                    'Almoço' => $arrProdutos['lunch'][] = $product
                };
            }
        }
        
        return $arrProdutos;
    }
}   