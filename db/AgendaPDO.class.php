<?php

require_once("../config/config.class.php");

class AgendaPDO{
    private $db = null;
    private $connection = null;

    function __constructor(){
        $this->db = new Database();
        $this->connection = $this->db->getConnection();
    }


    function lisar(){
        $stmt = $this->connection->query("SELECT * FROM agenda");
    }
}
?>