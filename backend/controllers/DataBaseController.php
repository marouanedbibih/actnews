<?php
class Database
{
    private $host;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->dbname = 'actnews_db';
    }

    public function open()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4";

        try {
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
    public function close()
    {
        // Closing the database connection
        $this->conn = null;
    }

    public function executeQuery($query, $params = [])
    {
        $this->open();

        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            $this->conn = null; // Close the connection
            return $stmt;
        } catch (PDOException $e) {
            die("Query execution failed: " . $e->getMessage());
        }
    }

    public function fetchQuery($query, $params = [])
    {
        $this->open();

        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->conn = null; // Close the connection
            return $result; // Return the fetched data as an array
        } catch (PDOException $e) {
            die("Query execution failed: " . $e->getMessage());
        }
    }

    public function executeMultiQueryWithSelect($insertQuery, $insertParams, $selectQuery)
    {
        $this->open();
        try {
            $this->conn->beginTransaction(); // Start a transaction
            $insertStmt = $this->conn->prepare($insertQuery);
            if ($insertStmt->execute($insertParams)) {
                $selectStmt = $this->conn->prepare($selectQuery);
                $selectStmt->execute();
                $data = $selectStmt->fetch(PDO::FETCH_ASSOC);
                $this->conn->commit(); // Commit the transaction
                $this->conn = null; // Close the connection
                return $data;
            }
        } catch (PDOException $e) {
            $this->conn->rollback(); // Rollback the transaction in case of failure
            $this->conn = null; // Close the connection
            die("Multi-query execution failed: " . $e->getMessage());
        }
    }
}
