<?php
include_once __DIR__ . "/../config/setup.php";

use classes\Basket;


$basket = new Basket();
$basket->clearBasket();