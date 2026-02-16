<?php

namespace Chloe\PhpEstoque\Entity;

class Product
{
    // ATRIBUTOS
    private int $id;
    private string $name;
    private string $categoryId;
    private string $subcategoryId;
    private int $quantity;
    private float $price;
    private string $description;
    private string $imagePath;
    private int $statusId;

    // CONSTRUTOR
    public function __construct(string $name,
                                string $categoryId,
                                string $subcategoryId,
                                int $quantity,
                                float $price,
                                string $description,
                                ?string $imagePath = 'default-image.png')
    {
        $this->name = $name;
        $this->categoryId = $categoryId;
        $this->subcategoryId = $subcategoryId;
        $this->setQuantity($quantity);
        $this->price = $price;
        $this->description = $description;
        $this->imagePath = $imagePath;
        $this->setStatusId($quantity); // DEFINE statusId COM BASE EM quantity
    }

    // GETTERS E SETTERS
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    public function getSubcategoryId(): int
    {
        return $this->subcategoryId;
    }

    public function setQuantity(int $quantity): void
    {
        if ($quantity < 0) {
            $quantity = 0;
        }

        $this->quantity = $quantity;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setImagePath(string $imagePath): void
    {
        $this->imagePath = $imagePath;
    }

    public function getImagePath(): string
    {
        return $this->imagePath;
    }

    public function getImageDir(): string
    {
        return "assets/products/" . $this->imagePath;
    }

    private function setStatusId(int $quantity): void
    {
        if ($quantity == 0) {
            $this->statusId = 2; // Esgotado

        } elseif ($quantity == 1) {
            $this->statusId = 3; // Última Unidade

        } else {
            $this->statusId = 1; // Disponível

        }
    }

    public function getStatusId(): int
    {
        return $this->statusId;
    }

}