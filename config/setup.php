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
$siteTitle = 'Shopping basket';
