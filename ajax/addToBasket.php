<?php
include_once __DIR__ . "/../config/setup.php";

use classes\Basket;


$product = new Basket();
$product->addToBasket($_POST['id'], $_POST['quantity']);