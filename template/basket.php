<?php $basket = new \classes\Basket();
$basketProducts = $basket->getBasketProducts();
$basketSum = $basket->getBasketTotalPrice();
?>

<nav class="navbar nav pl-0">
    <div>
        <ul class="nav navbar-nav">
            <li>
                <a tabindex="0" role="button" class="btn btn-lg" id="basket-popover" data-toggle="popover">
                    <i class="fas fa-shopping-basket"></i> Total: <span
                            class="total_price"> <?php echo number_format($basketSum, 2, ' . ', ' ') ?> €</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

<div id="popover-content-wrap" style="display: none">
    <div class="row popover-header">
        <div class="col-4">NAME</div>
        <div class="col-2">Quantity</div>
        <div class="col-2">Price per unit</div>
        <div class="col-2">Total cost</div>
        <div class="col-2">Action</div>
    </div>
    <?php
    $totalPrice = 0;
    if (!empty($basketProducts)) {
        foreach ($basketProducts as $product) {
            $totalCost = $product['quantity'] * $product['price']; ?>
            <div class="row popover-body">
                <div class="col-4"><?php echo $product['name'] ?></div>
                <div class="col-2"><?php echo $product['quantity'] ?></div>
                <div class="col-2"><?php echo number_format($product['price'], 2, ' . ', ' ') . ' €' ?></div>
                <div class="col-2"><?php echo number_format($totalCost, 2, ' . ', ' ') . ' €' ?></div>
                <div class="col-2"><a class="btn btn-danger btn-sm" id="btn-remove-product"
                                      data-product-id="<?php echo $product['id'] ?>"><i class="fa fa-minus-circle"
                                                                                        aria-hidden="true"></i> Delete </a></div>
            </div>
        <?php }
    } else echo "<br><H2>Basket is empty!</H2>" ?>

    <div class="row popover-header">
        <div class="col-4"></div>
        <div class="col-2"></div>
        <div class="col-2"></div>
        <div class="col-2"><?php echo number_format($basketSum, 2, ' . ', ' ') . ' €' ?></div>
        <div class="col-2"></div>
    </div>
    <div class="container">
        <a id="btn-clear-all" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Clear basket</a>
    </div>
</div>

