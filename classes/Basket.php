<?php


namespace classes;


class Basket
{

    private $productsInBasket = [];
    private $basketTotalPrice = 0;


    public function addToBasket($productId, int $quantity)
    {
        if ($quantity < 1 || $quantity > 99) { // Input quantity checking
            return;
        }
        $this->getBasketProducts(); // Load products in basket from session
        if (empty($this->productsInBasket[$productId])) { //If the product with this ID isn't in the basket
            $product = new Product();
            $this->productsInBasket[$productId] = $product->getProductById($productId); // Then put this product in
            unset ($this->productsInBasket[$productId]['description']);
            unset ($this->productsInBasket[$productId]['id']);
        }
        $this->productsInBasket[$productId]['quantity'] += $quantity; // Sum requested quantity with quantity in basket
        $this->getEachProductTotalPrice($productId);
        $this->SaveBasket();
    }

    public function getBasketProducts()
    {
        if (!empty($_SESSION['basket'])) {
            $this->productsInBasket = $_SESSION['basket'];
        }
        return $this->productsInBasket;
    }

    public function getEachProductTotalPrice($id)
    {
        $this->productsInBasket[$id]['itemTotalPrice'] = $this->productsInBasket[$id]['quantity'] * $this->productsInBasket[$id]['price'];
    }

    public function SaveBasket()
    {
        $_SESSION['basket'] = $this->productsInBasket;
    }

    public function removeFromBasket($productId)
    {
        $this->getBasketProducts();
        unset ($this->productsInBasket[$productId]);
        $this->SaveBasket();
    }

    public function editQuantityInBasket($productId, $newQuantity)
    {
        $this->getBasketProducts();
        $this->productsInBasket[$productId]['quantity'] = $newQuantity;
        $this->SaveBasket();
    }

    public function clearBasket()
    {
        $this->productsInBasket = [];
        $this->SaveBasket();

    }

    public function getBasketTotalPrice()
    {
        $this->basketTotalPrice = 0;
        foreach ($this->productsInBasket as $id => $product) {
            $this->basketTotalPrice += $this->productsInBasket[$id]['itemTotalPrice'];
        }

        return $this->basketTotalPrice;
    }
}