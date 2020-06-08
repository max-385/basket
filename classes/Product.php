<?php

namespace classes;

class Product extends Entity
{
    public $productId; //Unique id for the product

    public function getAllProducts(): array
    {
        $dbal = new DBAL();
        return $dbal->selectAll()->fetchAll();
    }

    public function getProductById($productId): array
    {
        $dbal = new DBAL();
        return $dbal->selectById($productId)->fetch(\PDO::FETCH_ASSOC);
    }


    /**
     * @return mixed
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @param mixed $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }


}