<?php
/*
$dbName = "zugon";
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if (!$conn){
    die("Something went wrong");
}
*/



class Connect
{
    private static $instance = null;
    private $conn;
    private $dbHost = 'localhost'; 
    private $dbName = 'zugon';
    private $dbUser = 'root';
    private $dbPass = '';


    private function __construct()
    {
        $this->conn = new mysqli($this->dbHost, $this->dbUser, $this->dbPass, $this->dbName);
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Connect();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
    
?>
