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
                    $productItem['price'],
                    $productItem['img'],
                );
                
                match ($product->getType()) {
                    'Café' => $arrProdutos['breakfast'][] = $product,
                    'Almoço' => $arrProdutos['lunch'][] = $product
                };
            }
        }
        
        return $arrProdutos;
    }

    public function deleteById(int $idProduct): bool
    {   
        $sql = "DELETE FROM products WHERE idProduct = :idProduct;";
        $stmt = $this->pdoConnection->prepare($sql);
        $stmt->bindValue(":idProduct", $idProduct);


        return $stmt->execute();
    }

    public function save(Product $product): bool
    {
        if (is_null($product->getIdProduct())) {
            return $this->create($product); 
        }

        return $this->update($product);
    }

    public function create(Product $product): bool
    {
        $sql = "INSERT INTO products(type, title, description, img, price) VALUES (:type, :title, :description, :img, :price);";
        $stmt = $this->pdoConnection->prepare($sql);
        $stmt->bindValue(":type", $product->getType());
        $stmt->bindValue(":title", $product->getTitle());
        $stmt->bindValue(":description", $product->getDescription());
        $stmt->bindValue(":img", $product->getImg());
        $stmt->bindValue(":price", $product->getPrice());

        $result = $stmt->execute();

        if($result){
            $product->setIdProduct($product, $this->pdoConnection->lastInsertId());
        }

        return $result;

    }

    public function update(Product $product): bool
    {
        return true;
    }
}   