<?php include_once(__DIR__ . '/config/setup.php');

$basket = new \classes\Basket();
// If basket is empty, redirect to index
if ($basket->getBasketTotalPrice() == 0) {
    header('Location:index.php');
} ?>

<div class="container">
    <table class="table table-bordered table-striped">
    <tr class="thead-dark">
        <th>Name</th>
        <th>Quantity</th>
        <th>Price per unit</th>
        <th>Total cost</th>
    </tr>
    <?php foreach ($basket->getBasketProducts() as $product){?>
    <tr>
        <td><?php echo $product['name'];?></td>
        <td><?php echo $product['quantity'];?></td>
        <td><?php echo $product['price']. ' €';?></td>
        <td><?php echo number_format($product['quantity']*$product['price'], 2). ' €' ;?></td>
    </tr>
    <?php } ?>
        <tr>
            <td class="table-success" colspan="3" style="text-align: right"><b>TOTAL DUE</b></td>
            <td class="table-success"><b><?php echo number_format($basket->getBasketTotalPrice(), 2);?></b> <i class="fas fa-euro-sign"></i></td>
        </tr>
    </table>





    <div class="row row-cols-2 offset-2">
            <div class="custom-control custom-radio">
                <input type="radio" id="cardRadio" name="paymentRadio" class="custom-control-input">
                <label class="custom-control-label" for="cardRadio"><i class="fab fa-cc-visa"> Credit card</i></label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="ibanRadio" name="paymentRadio" class="custom-control-input">
                <label class="custom-control-label" for="ibanRadio"><i class="fas fa-university"> IBAN</i></label>
            </div>
    </div>


    </div>




<?php include_once(__DIR__ . '/template/footer.php'); ?>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/default.js"></script>