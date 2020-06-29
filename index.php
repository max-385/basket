<?php include_once(__DIR__.'/config/setup.php') ?>


<body>

<div class="container">
    <h1 style="text-align: center">Welcome to our shop!</h1>
    <br>
</div>


<?php
$products = new \classes\Product();
$allProducts = $products->getAllProducts();
?>
<div class="container">
    <?php include_once("template/basket.php") ?>
    <!-- Display all products -->
    <div class="row text-center">
        <?php foreach ($allProducts as $product) { ?>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-5">
                <div class="card h-100 shadow">
                    <h5 class="card-header d-flex justify-content-center align-items-center mb-2 title">
                        <b><?php echo $product['name'] ?></b></h5>
                    <div class="card-body mb-md-4">
                        <img class="card-img mb-3" src="<?php echo $product['picture'] ?>" alt="">
                        <p class="card-text"><?php echo $product['description'] ?></p>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-lg btn-add-to-basket" id="<?php echo $product['id'] ?>"
                                data-product-id="<?php echo $product['id'] ?>"><?php echo $product['price'] ?> €
                        </button>
                        <label for="product-qty">Quantity: <input class="product-qty" type="number" value="1" min="1"
                                                                  max="99"></label>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Sticky footer -->
<?php
include_once("template/footer.php"); ?>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/default.js"></script>
</body>
</html>