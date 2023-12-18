<?php

namespace App\Dao;

use App\DataBase\connection;

class UserDao {
    private $conn;
    public function __construct($conn){
        $this->conn = connection::connect();
    }


    
}




?>