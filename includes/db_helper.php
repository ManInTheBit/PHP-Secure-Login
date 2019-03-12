<?php
/**
 * Created by burakisik at 02.03.2019.
 */

class SecureDatabase
{
    private $HOST = "localhost";
    private $DB_NAME = "secureDB";
    private $DB_USERNAME = "phpmyadmin";
    private $DB_PASSWORD = "z3y2x1";

    /** @var mysqli $conn */
    public $conn;

    public function __construct()
    {

    }

    public function setConnectionParameters($HOST, $DB_NAME, $DB_USERNAME, $DB_PASS) {
        $this->$HOST = $HOST;
        $this->$DB_NAME = $DB_NAME;
        $this->$DB_USERNAME = $DB_USERNAME;
        $this->$DB_PASS = $DB_PASS;
    }

    public function getMysqlConnection()
    {
        $this->conn = null;
        $this->conn = mysqli_connect($this->HOST, $this->DB_USERNAME,$this->DB_PASSWORD, $this->DB_NAME);

        if ($this->conn ->connect_error) {
            return $this->conn; # die("Connection failed: " . $this->conn ->connect_error);
        } else {
            return $this->conn;;
        }
    }

    public function closeMysqlConnection()
    {
        $this->conn->close();
    }
}


