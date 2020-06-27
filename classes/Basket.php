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

        $_SESSION['basket'][$productId]['quantity'] += $quantity; // Add requested quantity
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

    public function getBasketProducts()
    {
        if (empty($_SESSION['basket'])) {
            return false;
        }

        foreach ($_SESSION['basket'] as $id => $product) {
            $_SESSION['basket'][$id]['itemTotalPrice'] = $_SESSION['basket'][$id]['quantity'] * $_SESSION['basket'][$id]['price'];
        }
        return $_SESSION['basket'];
    }

    public function getBasketTotalPrice()
    {
        if (empty($_SESSION['basket'])) {
            return false;
        }

        $totalSum = 0;
        foreach ($_SESSION['basket'] as $id => $product) {
            $totalSum += $_SESSION['basket'][$id]['itemTotalPrice'];
        }

        return $totalSum;
    }
}