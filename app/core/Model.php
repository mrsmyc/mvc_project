<?php

namespace app\core;

use app\lib\Db;


abstract class Model {

    public $db;

    public function __construct() {
        $this->db = new Db();
    }

    public function countTable($tableName, $pageSize) {
        $sql = "SELECT COUNT(*) FROM $tableName";
        $result = $this->db->row($sql);             
        $totalPages = ceil($result[0]['COUNT(*)'] / $pageSize);
        return $totalPages;
    }
}