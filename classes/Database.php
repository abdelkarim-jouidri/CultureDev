<?php

class Database {
    protected $db;

    public function __construct($dsn, $user, $password) {
        try {
            $this->db = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
            
        }
    }
}


   
?>