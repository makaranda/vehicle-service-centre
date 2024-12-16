<?php
if(!defined('DB_SERVER')){
    require_once("../initialize.php");
}
class DBConnection {

    private $host = DB_SERVER;
    private $username = DB_USERNAME;
    private $password = DB_PASSWORD;
    private $database = DB_NAME;

    public $conn;

    public function __construct() {
        if (!isset($this->conn)) {
            // Create a new connection
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

            // Check for connection errors
            if ($this->conn->connect_error) {
                echo 'Cannot connect to database server: ' . $this->conn->connect_error;
                exit;
            }
        }
    }

    public function __destruct() {
        // Check if the connection is open before closing
        //if ($this->conn instanceof mysqli && $this->conn->ping()) {
            // Close the connection only if it's still open
            //$this->conn->close();
        //}
    }
}

?>