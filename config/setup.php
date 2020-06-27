<?php
session_start();
//autoloader
function autoload($className)
{
    $className = str_replace('_', '/', $className);

    require_once(__DIR__ . "/../$className.php");
}

spl_autoload_register('autoload');


// Site title
$siteTitle = 'Shopping basket'; ?>

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
