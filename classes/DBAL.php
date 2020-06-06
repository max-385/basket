<?php
//Database Abstraction Layer

namespace classes;


class DBAL extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectAll()
    {
    return $this->query($this->preSelectAll());
    }

}