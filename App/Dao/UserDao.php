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
        $last_id = $this->conn->lastInsertId();
        $sql = "INSERT INTO user_role (user_id, role_id) VALUES($last_id,2)";
        $this->conn->exec($sql);
    }

    public function getUserByEmail($email) {
        $query = "SELECT u.id as id, u.first_name as first_name, u.last_name as last_name, u.email as email, u.password as password, u.phone as phone, ur.role_id as role_id
            FROM users u
            INNER JOIN user_role ur ON ur.user_id = u.id
            WHERE u.email = ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function getAllUsers(){
        $query = $this->conn->query("SELECT * from users");
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        $users = [];
        if(empty($rows)){
            return [];
        }else{
            foreach($rows as $row){
                $user = new User($row['id'],$row['first_name'],$row['last_name'],$row['email'],$row['password'],$row['phone']);
                $users[] = $user;
            }
            return $users;
        }
    }

    public function getUserById($id){
        $query ="SELECT * from users where id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function updateUser(User $user){
        $query = "UPDATE users 
        set first_name= :first_name, last_name = :last_name, email= :email, password= :password, phone= :phone
        where id= :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $user->getId());
        $stmt->bindValue(':first_name', $user->getFirstName());
        $stmt->bindValue(':last_name', $user->getLastName());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':password', $user->getPassword());
        $stmt->bindValue(':phone', $user->getphone());
        $stmt->execute();
    }

    public function deleteBook($id){
        $query = "DELETE from users where id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

}


?>