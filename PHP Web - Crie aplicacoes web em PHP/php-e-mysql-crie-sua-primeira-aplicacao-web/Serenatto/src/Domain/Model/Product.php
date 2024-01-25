<?php 

namespace Alura\Php\Serenatto\Domain\Model;

class Product
{
    private int $idProduct;

    private string $type;

    private string $title;

    private string $description;

    private string $img;

    private float $price;

    public function __construct(int $idProduct, string $type, string $title, string $description, string $img, float $price)
    {
        $this->idProduct = $idProduct;
        $this->type = $type;
        $this->title = $title;
        $this->description = $description;
        $this->img = $img;
        $this->price = $price;
    }

    public function getIdProduct(): int 
    {
        return $this->idProduct;
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