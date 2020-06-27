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
        return $this->query($this->buildSelectAll());
    }

    public function selectById($id)
    {
        return $this->selectBy(['id' => $id]);
    }

    public function selectBy(array $conditions)
    {
        return $this->buildSelectBy($conditions);
    }
}