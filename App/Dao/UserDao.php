<?php

namespace App\Dao;

require_once __DIR__ . '/../../vendor/autoload.php';


use App\DataBase\connection;
use App\Models\user;
use PDO;

class UserDao 
{
    private $conn;
    public function __construct(){
        $this->conn = connection::connect();
    }

    public function creatUser(User $user) {
        $query = "INSERT INTO users (first_name,last_name,email,password,phone) VALUES (?,?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$user->getFirstName(),$user->getLastName(),$user->getEmail(),$user->getPassword(),$user->getphone()]);
    }

    public function getUserByEmail($email){
        $query = "SELECT * from users where email=?";
        $stmt = $this->conn->prepare($query);
        // $stmt->bindValue(':email', $email);
        $stmt->execute([$email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);;
        return $row;
    }
}

?>