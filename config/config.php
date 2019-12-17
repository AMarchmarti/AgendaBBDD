<?php
class DataBase {
    // My DB credentials.
    private $host = null;
    private $db_name = null;
    private $username = null;
    private $password = null;
    private $connectionValues = null;
    /**
     * CONSTRUCTOR
     */
    function __construct()
    {
        $this->host = "127.0.0.1";
        $this->db_name = "test";
        $this->username = "root";
        $this->password = "";
    }
    /**
     * MAIN BEHAVIOURS
     *
     */
    public function getConnection()
    {
        $this->connectionValues = array($this->host, $this->db_name, $this->username, $this->password);
        return $this->connectionValues;
    }
}

?>