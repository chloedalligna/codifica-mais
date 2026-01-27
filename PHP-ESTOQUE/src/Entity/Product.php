<?php

namespace Chloe\PhpEstoque\Entity;

class Product
{
    private int $id;

    private string $nameProduct;

    private string $idCategory;

    private string $idSubcategory;

    private string $nameCategory;

    private string $nameSubcategory;

    private float $price;

    private int $quantity;

    private string $imageUrl;

    private string $description;
    
    private int $idStatus;

    public function __construct(string $nameProduct, string $nameCategory, string $nameSubcategory, float $price, int $quantity, string $imageUrl, string $description, $idStatus)
    {
        $this->nameProduct = $nameProduct;
        $this->setIdCategory($nameCategory);
        $this->setIdSubcategory($nameSubcategory);
        $this->nameCategory = $nameCategory;
        $this->nameSubcategory = $nameSubcategory;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->imageUrl = $imageUrl;
        $this->description = $description;
        $this->idStatus = $idStatus;

        if ($quantity < 0) {
            $this->quantity = 1;
        }

    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNameProduct(): string
    {
        return $this->nameProduct;
    }

    public function setNameCategory(int $idCategory): void
    {
        $productRepository = new \Chloe\PhpEstoque\Repository\ProductRepository();
        $nameCategory = $productRepository->getNameCategory($idCategory);
        $this->nameCategory = $nameCategory;
    }

    public function getNameCategory(): string
    {
        return $this->nameCategory;
    }

    public function setNameSubcategory(int $idSubcategory): void
    {
        $productRepository = new \Chloe\PhpEstoque\Repository\ProductRepository();
        $nameSubcategory = $productRepository->getNameSubcategory($idSubcategory);
        $this->nameSubcategory = $nameSubcategory;
    }

    public function getNameSubcategory(): string
    {
        return $this->nameSubcategory;
    }

    public function setIdCategory(string $nameCategory): void
    {
        $productRepository = new \Chloe\PhpEstoque\Repository\ProductRepository();
        $idCategory = $productRepository->getIdCategory($nameCategory);
        $this->idCategory = $idCategory;
    }

    public function getIdCategory(): int
    {
        return $this->idCategory;
    }

    public function setIdSubcategory(string $nameSubcategory): void
    {
        $productRepository = new \Chloe\PhpEstoque\Repository\ProductRepository();
        $idSubcategory = $productRepository->getIdSubcategory($nameSubcategory);
        $this->idSubcategory = $idSubcategory;
    }

    public function getIdSubcategory(): int
    {
        return $this->idSubcategory;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getImageUrl(): int
    {
        return $this->imageUrl;
    }

    public function getDescription(): int
    {
        return $this->description;
    }

    public function getIdStatus(): int
    {
        return $this->idStatus;
    }


}