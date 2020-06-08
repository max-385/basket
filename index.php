<?php include_once("config/setup.php");
session_start()?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="assets/css/default.css">
    <link rel="stylesheet" type="text/css" href="assets/css/app.css">
    <title><?php echo $siteTitle?></title>
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
    <div class="row text-center">
    <?php foreach ($allProducts as $product) {?>
        <div class="col-md-3">
            <div class="card-body table-bordered">
                <h4 class="card-title"><b><?php echo $product['name'] ?></b></h4>
                <p class="card"><?php echo $product['picture'] ?></p>
                <p class="card-text"><?php echo $product['description'] ?></p>
                <a href="#" class="btn btn-primary"><?php echo $product['price']?> €</a>
            </div>
        </div>
    <?php } ?>
</div>
</div>


<?php
include_once("template/footer.php"); ?>
</body>
</html>