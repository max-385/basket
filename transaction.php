<?php include_once(__DIR__ . '/config/setup.php');

use classes\Basket;
use classes\Payment;
use classes\Transaction;

// If payment isn't made or basket doesn't contain products then redirect to index
if (empty($_POST['paymentMethod']) || empty($_SESSION['basket'])) {
    header('Location:index.php');
}

// Get basket products from checkout
$basket = new Basket();
$basketProducts = $basket->getBasketProducts();

// Get payment information from post
$payment = new Payment();
$payment->setPaymentMethod($_POST['paymentMethod']);
if ($payment->getPaymentMethod() == 'card') {
    $payment->setCardType($_POST['cardType']);
    $payment->setCardOwner($_POST['nameOnCard']);
    $payment->setCardNum($_POST['cardNumber']);
    $payment->setCardExpiry($_POST['expiryMonth'] . $_POST['expiryYear']);
    $payment->setCardCVV($_POST['CVV']);
    $payment->setPaid(true);
}

// Get contacts info from post
$contacts = ['phone' => $_POST['phoneNum'], 'e-mail' => $_POST['email']];


$transaction = new Transaction($basket, $payment, $contacts);

echo '<pre>';
var_dump($transaction);
echo '</pre>';

// After making an order, begin new session with empty basket
$basket->clearBasket(); ?>

<button class="btn btn-dark" onclick="event.preventDefault(); location.href = 'index.php'">Home</button>

