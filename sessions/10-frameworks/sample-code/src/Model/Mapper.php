<?php
namespace App\Model;

abstract class Mapper {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

}
