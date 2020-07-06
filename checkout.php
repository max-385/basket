<?php include_once(__DIR__ . '/config/setup.php');

$basket = new \classes\Basket();
// If basket is empty, redirect to index
if ($basket->getBasketTotalPrice() == 0) {
    header('Location:index.php');
} ?>

<!-- Basket contents -->
<div class="container">
    <table class="table table-bordered table-striped">
        <tr class="thead-dark">
            <th>Name</th>
            <th>Quantity</th>
            <th>Price per unit</th>
            <th>Total cost</th>
        </tr>
        <?php foreach ($basket->getBasketProducts() as $product) { ?>
            <tr>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['quantity']; ?></td>
                <td><?php echo $product['price'] . ' €'; ?></td>
                <td><?php echo number_format($product['quantity'] * $product['price'], 2) . ' €'; ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td class="table-success" colspan="3" style="text-align: right"><b>TOTAL DUE</b></td>
            <td class="table-success"><b><?php echo number_format($basket->getBasketTotalPrice(), 2); ?></b> <i
                        class="fas fa-euro-sign"></i></td>
        </tr>
    </table>
    <br>


    <!-- Payment method choose -->
    <div class="row row-cols-2 offset-2">
        <div class="custom-control custom-radio">
            <input type="radio" id="cardRadio" name="paymentRadio" class="custom-control-input" checked
                   onclick="$('#ibanPayment').hide(); $('#cardPayment').show();">
            <label class="custom-control-label" for="cardRadio"><i class="fab fa-cc-visa"> Credit card</i></label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" id="ibanRadio" name="paymentRadio" class="custom-control-input"
                   onclick="$('#cardPayment').hide(); $('#ibanPayment').show();">
            <label class="custom-control-label" for="ibanRadio"><i class="fas fa-university"> IBAN</i></label>
        </div>
    </div>

    <!-- Checkout card form-->
    <form action="transaction.php" id="cardPayment" method="post" class="needs-validation" novalidate>

        <!-- Card type-->
        <div class="form-group">
            <label for="CheckoutCardType">Card type</label>
            <select name="cardType" class="custom-select form-control" id="CheckoutCardType" required>
                <option value="" selected hidden>Select card type</option>
                <option value="Visa">Visa</option>
                <option value="MasterCard">MasterCard</option>
                <option value="Maestro">Maestro</option>
                <option value="American Express">American Express</option>
            </select>
            <div class="invalid-tooltip">
                Please select card type
            </div>
        </div>

        <!-- Card holder-->
        <div class="form-group">
            <label for="checkoutCardName">Cardholder's name</label>
            <input name="nameOnCard" type="text" class="form-control" id="checkoutCardName" placeholder="Name surname"
                   minlength="5" maxlength="50" pattern="[A-Z a-z-]+" required>
            <div class="invalid-tooltip">
                Incorrect name
            </div>
        </div>

        <!-- Card number-->
        <div class="form-group">
            <label for="checkoutCardNum">Card number (without spaces)</label>
            <input name="cardNumber" type="text" class="form-control" id="checkoutCardNum" placeholder="Card number"
                   minlength="16" maxlength="16" pattern="[0-9]+" required>
            <div class="invalid-tooltip">
                Incorrect card number, it must contain 16 numbers
            </div>
        </div>

        <!-- Card expiry date-->
        <label>Expiry date</label>
        <div class="d-flex">
            <div class="form-group w-100">
                <label for="checkoutExpiryMonth" hidden>Expiry date</label>
                <input name="expiryMonth" type="text" pattern="[0-9]+" class="form-control" id="checkoutExpiryMonth"
                       placeholder="Month" minlength="2" maxlength="2" required>
                <div class="invalid-tooltip">
                    Incorrect month
                </div>
            </div>
            <span class="align-self-center">/</span>
            <div class="form-group w-100">
                <label for="checkoutExpiryYear" hidden></label>
                <input name="expiryYear" type="text" pattern="[0-9]+" class="form-control" id="checkoutExpiryYear"
                       placeholder="Year" minlength="2" maxlength="2" required>
                <div class="invalid-tooltip">
                    Incorrect year
                </div>
            </div>
        </div>

        <!-- Card CVV-->
        <div class="form-group">
            <label for="checkoutCVV">CVV/CVC</label>
            <input name="CVV" type="password" class="form-control" id="checkoutCVV" placeholder="CVV or CVC"
                   minlength="3" maxlength="3" pattern="[0-9]+" required>
            <div class="invalid-tooltip ">
                Incorrect CVV/CVC. The CVV/CVC is located on the back of your card and contains 3 numbers
            </div>
        </div>

        <!-- Customer phone number-->
        <div class="form-group">
            <label for="checkoutPhone">Phone number</label>
            <input name="phoneNum" type="tel" class="form-control" id="checkoutPhone" placeholder="Phone number"
                   minlength="6" maxlength="20" pattern="[\+]{0,1}[0-9]+" required>
            <div class="invalid-tooltip">
                Incorrect phone number format (it must contain only "+" sign and numbers)
            </div>
        </div>

        <!-- Customer e-mail-->
        <div class="form-group">
            <label for="checkoutEmail">E-mail</label>
            <input name="email" type="email" class="form-control" id="checkoutEmail" placeholder="E-mail" minlength="3"
                   maxlength="30" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
            <div class="invalid-tooltip">
                Incorrect e-mail entered
            </div>
        </div>

        <!-- Checkbox terms & conditions -->
        <div class="form-group custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="checkoutTerms" required>
            <label class="custom-control-label" for="checkoutTerms">I agree to the terms & conditions</label>
            <div class="invalid-tooltip">
                You must agree to the terms & conditions
            </div>
        </div>


        <button class="btn btn-dark" onclick="event.preventDefault(); location.href = 'index.php'">Back</button>
        <button class="btn btn-success" type="submit">Continue</button>
        <button class="btn btn-danger float-right" type="reset">Clear form</button>

        <input type="hidden" value="card" name="paymentMethod">
    </form>


    <!-- Checkout bank form-->
    <form id="ibanPayment" method="post" class="needs-validation" style="display: none" novalidate>
        <h4 class="text-center">IBAN payment</h4>
        <p class="text-center">Provide contact details and you will receive invoice by e-mail.</p>

        <!-- Customer phone number-->
        <div class="form-group">
            <label for="checkoutPhoneBank">Phone number</label>
            <input name="phoneNum" type="tel" class="form-control" id="checkoutPhoneBank" placeholder="Phone number"
                   minlength="6" maxlength="20" pattern="[\+]{0,1}[0-9]+" required>
            <div class="invalid-tooltip">
                Incorrect phone number format (it must contain only "+" sign and numbers)
            </div>
        </div>

        <!-- Customer e-mail-->
        <div class="form-group">
            <label for="checkoutEmailBank">E-mail</label>
            <input name="email" type="email" class="form-control" id="checkoutEmailBank" placeholder="E-mail"
                   minlength="3" maxlength="30" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
            <div class="invalid-tooltip">
                Incorrect e-mail entered
            </div>
        </div>

        <!-- Checkbox terms & conditions -->
        <div class="form-group custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="checkoutTermsBank" required>
            <label class="custom-control-label" for="checkoutTermsBank">I agree to the terms & conditions</label>
            <div class="invalid-tooltip">
                You must agree to the terms & conditions
            </div>
        </div>


        <button class="btn btn-dark" onclick="event.preventDefault(); location.href = 'index.php'">Back</button>
        <button class="btn btn-success" type="submit">Continue</button>
        <button class="btn btn-danger float-right" type="reset">Clear form</button>

        <input type="hidden" value="IBAN" name="paymentMethod">
    </form>

</div>


<?php include_once(__DIR__ . '/template/footer.php'); ?>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/default.js"></script>