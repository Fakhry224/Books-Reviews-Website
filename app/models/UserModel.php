<?php

class UserModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function login($data) {
        $sql = "
            SELECT * FROM users 
            WHERE email = ? AND password = ?
        ";

        $this->db->query($sql);

        $this->db->bind([
            ['value' => $data['email']],
            ['value' => $data['password']]
        ]);

        return $this->db->single();

    }

    public function register($data){
        $sql = "
            INSERT INTO users (name, email, password)
            VALUES (?, ?, ?)
        ";

        $this->db->query($sql);

        $this->db->bind([
            ['value' => $data['name']],
            ['value' => $data['email']],
            ['value' => $data['password']]
        ]);
        
        return $this->db->affectedRows();
       
    }

    public function findUserByEmail($email){
        $sql = "
            SELECT * FROM users WHERE email = ?
        ";

        $this->db->query($sql);
        $this->db->bind([
            ['value' => $email],
        ]);

        return $this->db->single();
    }
}