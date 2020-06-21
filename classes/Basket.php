<?php


namespace classes;


class Basket extends Entity
{


    public function addToBasket($productId, int $quantity)
    {
        if ($quantity < 1 || $quantity > 99) { // Input quantity checking
            return false;
        }

        $product = new Product();
        if (empty($_SESSION['basket'][$productId])) { //If the product with this ID isn't in the basket
            $_SESSION['basket'][$productId] = $product->getProductById($productId);  // Then put this product in
            unset ($_SESSION['basket'][$productId]['description']);
        }


        if (empty($_SESSION['basket'][$productId]['quantity'])) { //If this product quantity == 0
            $_SESSION['basket'][$productId]['quantity'] = $quantity; // Then add requested quantity
        } else {
            $_SESSION['basket'][$productId]['quantity'] += $quantity; // Or add more quantity
        }
    }


    public function removeFromBasket($productId)
    {
        $product = new Product();
        unset ($_SESSION['basket'][$productId]);
    }

    public function editQuantityInBasket($productId, $newQuantity)
    {
        $_SESSION['basket'][$productId]['quantity'] = $newQuantity;
    }

    public function clearBasket()
    {
        $_SESSION['basket'] = [];
    }


}