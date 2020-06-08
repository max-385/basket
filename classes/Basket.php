<?php


namespace classes;


class Basket
{
    public $basketId; //Unique id for basket
    public $items = []; //Products in basket
    public $totalPrice; //Products sum in basket
    public $totalQuantity;



    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    public function addToBasket($productID, $quantity=1)
    {
        $product = new Product();


    }


}