<?php


namespace classes;


class Basket
{

    public $productsInBasket;
    public $basketTotalPrice;


    public function addToBasket($productId, int $quantity)
    {
        if ($quantity < 1 || $quantity > 99) { // Input quantity checking
            return false;
        }

        $product = new Product();
        if (empty($_SESSION['basket'][$productId])) { //If the product with this ID isn't in the basket
            $_SESSION['basket'][$productId] = $product->getProductById($productId);  // Then put this product in
            unset ($_SESSION['basket'][$productId]['description']);
            unset ($_SESSION['basket'][$productId]['id']);
        }

        $_SESSION['basket'][$productId]['quantity'] += $quantity; // Add requested quantity
        $this->productsInBasket = $_SESSION['basket'];
    }


    public function removeFromBasket($productId)
    {
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

    public function getEachProductTotalPrice()
    {
        if (empty($_SESSION['basket'])) {
            return false;
        }

        foreach ($_SESSION['basket'] as $id => $product) {
            $_SESSION['basket'][$id]['itemTotalPrice'] = $_SESSION['basket'][$id]['quantity'] * $_SESSION['basket'][$id]['price'];
        }
    }

    public function getBasketProducts()
    {
        if (empty($_SESSION['basket'])) {
            return false;
        }

        $this->getEachProductTotalPrice();
        $this->getBasketTotalPrice();
        return $this->productsInBasket = $_SESSION['basket'];

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

        return $this->basketTotalPrice = $totalSum;
    }
}