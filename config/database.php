<?php

require '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/..");
$dotenv->load();

class Database
{

    private string $host;
    private string $db_name;
    private string $username;
    private string $password;
    public function __construct()
    {
        $this->host = $_ENV["host"];
        $this->db_name = $_ENV["dbname"];
        $this->username = $_ENV["username"];
        $this->password = $_ENV["password"];
    }
    public ?PDO $conn = null;

    public function getConnection(): ?PDO
    {

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");

        }
        catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }

}