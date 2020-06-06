<?php

namespace classes;

use config\DbConfig;

class Database extends \PDO
{

    public function __construct()
    {
        $dbConfig = new DbConfig();
        $dsn = 'mysql:dbname=' . $dbConfig->getDbName() . '; host=' . $dbConfig->getHost();
        parent::__construct($dsn, $dbConfig->getUserName(), $dbConfig->getDbPassword());
    }

    public function preSelectAll()
    {
        return "SELECT id, name, price, picture, description FROM products";
    }
}