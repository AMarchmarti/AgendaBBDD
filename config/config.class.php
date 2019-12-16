<?php
class DataBase {
        private $host = '127.0.0.1';
        private $db   = 'test';
        private $user = 'root';
        private $pass = '';
        private $charset = 'utf8mb4';
        private $connection = null;

    function getConnection(){
            try {
                $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db, $this->user, $this->pass);
            } catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }
            return $this->connection;
    }
}

?>