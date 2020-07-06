<?php include_once(__DIR__ . '/config/setup.php');

// If payment isn't made, redirect to index
if (empty($_POST['paymentMethod'])) {
    header('Location:index.php');
}

// Get payment information from post
$payment = new \classes\Payment();
$payment->setPaymentMethod($_POST['paymentMethod']);
if ($payment->getPaymentMethod() == 'card') {
    $payment->setCardType($_POST['cardType']);
    $payment->setCardOwner($_POST['nameOnCard']);
    $payment->setCardNum($_POST['cardNumber']);
    $payment->setCardExpiry($_POST['expiryMonth'] . $_POST['expiryYear']);
    $payment->setCardCVV($_POST['CVV']);
}

// Get basket products from checkout
$basket = new \classes\Basket();
$basketProducts = $basket->getBasketProducts();

var_export($basketProducts);

?>


