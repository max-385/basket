<?php
include_once __DIR__ . "/../config/setup.php";

use classes\Basket;


$product = new Basket();

if ($_POST['action'] == 'add') {
    $product->addToBasket($_POST['id'], $_POST['quantity']);
}
else if ($_POST['action'] == 'del') {
    $product->removeFromBasket($_POST['id']);
}
else if ($_POST['action'] == 'clear'){
    $product->clearBasket();
}
else return false;