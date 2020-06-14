<?php include_once("config/setup.php");
session_start() ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="assets/css/default.css">
    <link rel="stylesheet" type="text/css" href="assets/css/app.css">
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

<!-- Display all products -->
<div class="container">
    <div class="row text-center">
        <?php foreach ($allProducts as $product) { ?>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-5">
                <div class="card h-100 shadow">
                    <h5 class="card-header d-flex justify-content-center align-items-center mb-2 title">
                        <b><?php echo $product['name'] ?></b></h5>
                    <div class="card-body">
                        <img class="card-img mb-3" src="<?php echo $product['picture'] ?>" style=" height:60%" alt="">
                        <p class="card-text"><?php echo $product['description'] ?></p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary btn-lg"><?php echo $product['price'] ?> €</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


<?php
//unset($_SESSION['basket']);
$basket = new \classes\Basket();
$basket->addToBasket(1, 15);
var_export($_SESSION['basket']);

?>


<!-- Sticky footer -->
<?php
include_once("template/footer.php"); ?>
</body>
</html>