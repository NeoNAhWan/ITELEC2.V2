<?php
class Database
{
    private $host;
    private $db_name;
    private $username;
    private $password;
    public $connection;

    public function __construct()
    {
        // Set database connection parameters based on environment
        if ($_SERVER['SERVER_NAME'] === 'localhost' || $_SERVER['SERVER_ADDR'] === '127.0.0.1' || $_SERVER['SERVER_ADDR'] === '192.168.1.72') {
            $this->host = "localhost";
            $this->db_name = "itelec2"; 
            $this->username = "root";
            $this->password = "";
        } else {
            $this->host = "localhost";
            $this->db_name = ""; 
            $this->username = ""; 
            $this->password = "";
        }
    }

    public function dbconnection()
    {
        $this->connection = null;
        try {
            // Create a new PDO connection
            $this->connection = new PDO(
                "mysql:host=" . $this->host . ";itelec2=" . $this->db_name,
                $this->username,
                $this->password
            );
            // Set PDO attributes
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->connection;
    }
}
?>

