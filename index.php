<?php include_once("config/setup.php") ?>
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
<h1>Hello, world!</h1>


<div class="container">

    <?php

    $products = new \classes\DBAL();


    // Test, need to delete later from here
    $result = $products->selectAll()->fetchAll();
    foreach ($result as $res)
    {
        echo $res['description']."  ".$res['picture']."<br>";
    }
    //to here!


    ?>

</div>




<?php
include_once("template/footer.php"); ?>
</body>
</html>