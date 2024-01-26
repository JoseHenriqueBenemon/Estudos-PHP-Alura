<?php 

namespace Alura\Php\Serenatto\Domain\Model;

use DomainException;

class Product
{
    private ?int $idProduct;

    private string $type;

    private string $title;

    private string $description;

    private string $img;

    private float $price;

    public function __construct(?int $idProduct, string $type, string $title, string $description, float $price, string $img)
    {
        $this->idProduct = $idProduct;
        $this->type = $type;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->img = $img;
    }

    public function getIdProduct(): ?int 
    {
        return $this->idProduct;
    }

    public function setIdProduct(Product $product, int $idProduct): void
    {
        if (!is_null($product->getIdProduct())) {
            throw new DomainException("Você não alterar o código de um produto!");
        }

        $this->idProduct = $idProduct;
    }

    public function getType(): string 
    {
        return $this->type;
    }

    public function getTitle(): string 
    {
        return $this->title;
    }

    public function getDescription(): string 
    {
        return $this->description;
    }

    public function getImg(): string 
    {
        return $this->img;
    }

    public function getImgWithDir(): string 
    {
        return "./img/" . $this->img;
    }

    public function getPrice(): float 
    {
        return $this->price;
    }

    public function getPriceFormat(): string
    {
        return "R$ " . number_format($this->price, 2, ",");
    }

}