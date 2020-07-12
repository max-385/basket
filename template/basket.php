<?php $basket = new \classes\Basket();
$basketProducts = $basket->getBasketProducts();
?>

<nav class="navbar nav pl-0">
    <div>
        <ul class="navbar-nav">
            <li>
                <a tabindex="0" role="button" class="btn btn-lg" id="basket-popover" data-toggle="popover">
                    <i class="fas fa-shopping-basket"></i> Total:
                    <span class="total_price"> <?php echo number_format($basket->getBasketTotalPrice(), 2, ' . ', ' ') ?> €</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

<div id="popover-content-wrap" style="display: none">
    <div class="row popover-header">
        <div class="col-4">Name</div>
        <div class="col-2">Quantity</div>
        <div class="col-2">Price per unit</div>
        <div class="col-2">Total cost</div>
        <div class="col-2">Action</div>
    </div>
    <?php
    if (!empty($basketProducts)) {
        foreach ($basketProducts as $id => $product) {
            $totalCost = $product['quantity'] * $product['price']; ?>
            <div class="row popover-body">
                <div class="col-4"><?php echo $product['name'] ?></div>
                <div class="col-2"><?php echo $product['quantity'] ?></div>
                <div class="col-2"><?php echo number_format($product['price'], 2, ' . ', ' ') . ' €' ?></div>
                <div class="col-2"><?php echo number_format($totalCost, 2, ' . ', ' ') . ' €' ?></div>
                <div class="col-2"><a class="btn btn-danger btn-sm btn-remove-product"
                                      id="<?php echo $id ?>">
                        <i class="fa fa-minus-circle" aria-hidden="true"></i> Delete</a></div>
            </div>
        <?php } ?>
        <div class="row popover-header">
            <div class="col-2 offset-8"><?php echo number_format($basket->getBasketTotalPrice(), 2, ' . ', ' ') . ' €' ?></div>
        </div>
        <div class="container mt-2" id="popover-footer">
            <a id="btn-clear-all" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Clear basket</a>
            <a href="checkout.php" id="btn-proceed" class="btn btn-success"><i class="fas fa-money-bill-wave"></i> Proceed
                to checkout</a>
        </div>

    <?php } else echo "<br><H2>Basket is empty!</H2>" ?>


</div>

