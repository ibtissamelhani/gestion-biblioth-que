<?php

namespace App\Dao;

use App\DataBase\connection;
use App\Models\user;

class UserDao 
{
    private $conn;
    public function __construct($conn){
        $this->conn = connection::connect();
    }

    public function creatUser(User $user) {
        $query = "INSERT INTO users (first_name,last_name,email,password,phone) VALUES (?,?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":first_name", $user->getFirstName());
        $stmt->bindParam(":last_name", $user->getLastName());
        $stmt->bindParam(":email", $user->getEmail());
        $stmt->bindParam(":password", $user->getPassword());
        $stmt->bindParam(":phone", $user->getphone());
        $stmt->execute();
    }

    public function getUserByEmail($email){
        $query = "SELECT * from users where email=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);;
        return $row;
    }
}



?>