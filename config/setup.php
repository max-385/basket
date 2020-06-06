<?php

//autoloader
function autoload($className)
{
    $className = str_replace('_', '/', $className);

    require_once("$className.php");
}

spl_autoload_register('autoload');


// Site title
$siteTitle = 'Shopping basket';
