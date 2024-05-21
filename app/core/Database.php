<?php

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $conn;
    private $stmt;
    
    public function __construct() {

        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db_name);

        if($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        } 
    }

    public function query($query) {
        $this->stmt = $this->conn->prepare($query);
        if (!$this->stmt) {
            die("Prepare failed: " . $this->conn->error);
        }
    }

    public function bind($params) {
        $types = '';
        $values = [];

        foreach ($params as $param) {
            $values[] = $param['value'];
            switch (true) {
                case is_int($param['value']):
                    $types .= 'i';
                    break;
                case is_bool($param['value']):
                    $types .= 'i';
                    break;
                case is_null($param['value']):
                    $types .= 's';
                    break;
                default:
                    $types .= 's';
            }
        }

        $this->stmt->bind_param($types, ...$values);
    }


    public function execute() {
        return $this->stmt->execute();
    }

    public function resultSet() {
        if ($this->execute()) {
            $result = $this->stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return null; 
        }
    }

    public function single() {
        if ($this->execute()) {
            $result = $this->stmt->get_result();
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function affectedRows() {
        if ($this->execute()) {
            return $this->stmt->affected_rows;
        } else {
            return null;
        }
    }
}