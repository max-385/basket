<?php include_once("config/setup.php") ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="assets/css/default.css">
    <link rel="stylesheet" type="text/css" href="assets/css/app.css">
    <script src="https://kit.fontawesome.com/50cf322999.js" crossorigin="anonymous"></script>
    <title><?php echo $siteTitle ?></title>
</head>


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
                        <button class="btn btn-primary btn-lg btn-add-to-basket"
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

<div class="container">
    <button class="btn btn-lg btn-danger btn-clear-basket">Clear basket</button>
</div>

<?php
$basket = new \classes\Basket();
?>
<div class="container" id="test-basket"><?php var_export($basket->getBasketProducts()); ?></div>

<!-- Sticky footer -->
<?php
include_once("template/footer.php"); ?>
<script src="assets/js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
<script src="assets/js/default.js"></script>
</body>
</html>