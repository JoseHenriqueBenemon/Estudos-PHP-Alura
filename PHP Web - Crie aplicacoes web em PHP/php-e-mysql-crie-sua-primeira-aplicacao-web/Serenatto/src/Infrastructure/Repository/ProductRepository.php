<?php 

namespace Alura\Php\Serenatto\Infrastructure\Repository;

use Alura\Php\Serenatto\Domain\Model\Product;
use PDO;
use PDOStatement;

class ProductRepository
{
    private PDO $pdoConnection;

    public function __construct(PDO $pdoConnection)
    {
        $this->pdoConnection = $pdoConnection;
    }
    
    private function createProductObject(array $productItem): Product
    {   
        $product = new Product(
            $productItem['idProduct'],
            $productItem['type'],
            $productItem['title'],
            $productItem['description'],
            $productItem['price'],
            $productItem['img']
        );
     
        return $product;
    }

    public function getProductById(int $idProduct): Product
    {
        $sql = "SELECT * FROM products WHERE idProduct = :idProduct;";
        $stmt = $this->pdoConnection->prepare($sql);
        $stmt->bindValue(":idProduct", $idProduct);
        $stmt->execute();
        $result = $stmt->fetch();

        $product = $this->createProductObject($result);

        return $product;

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
                $product = $this->createProductObject($productItem);
                
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
        $sql = "UPDATE products SET type = :type, 
                                    title = :title, 
                                    description = :description,
                                    img = :img, 
                                    price = :price
                                WHERE idProduct = :idProduct;";
        
        $stmt = $this->pdoConnection->prepare($sql);
        $stmt->bindValue(":type", $product->getType());
        $stmt->bindValue(":title", $product->getTitle());
        $stmt->bindValue(":description", $product->getDescription());
        $stmt->bindValue(":img", $product->getImg());
        $stmt->bindValue(":price", $product->getPrice());
        $stmt->bindValue(":idProduct", $product->getIdProduct());
        
        return $stmt->execute();
    }

    public function uploadImagem(array $imagem): ?string 
    {
        if (!empty($imagem['name']) && $imagem['error'] === UPLOAD_ERR_OK) {
            $newPathImg = uniqid() . $imagem['name'];
            if (move_uploaded_file($imagem['tmp_name'], "img/$newPathImg")) {
                return $newPathImg;
            }
        }

        return null;
    }
}   
