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

    protected function preSelectBy(array $conditions)
    {
        $query = $this->preSelectAll();
        $i = 0;
        $values = [];
        foreach ($conditions as $key => $value) {
            if ($i == 0) {
                $query .= ' WHERE ';
                $query .= $key . " = ?";
            } else {
                $query .= ' AND ';
                $query .= $key . " = ?";
            }
            $i++;
            array_push($values, $value);
        }
        $test = $this->prepare($query);
        $test->execute($values);
        return $test;
    }

    protected function preSelectAll()
    {
        return "SELECT id, name, price, picture, description FROM products";
    }


}