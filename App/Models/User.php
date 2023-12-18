<?php

namespace App\Models;

class user {

    private $first_name;
    private $last_name;
    private $email;
    private $password;
    private $phone;

    public function __construct($first_name,$last_name,$email,$password,$phone){
        $this->first_name= $first_name;
        $this->last_name= $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
    }

// getters
    public function getFirstName(){
        return $this->first_name;
    }

    public function getLastName(){
        return $this->last_name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getphone(){
        return $this->phone;
    }

// setters
    public function setFirstName($first_name){
        $this->first_name= $first_name;
    }

    public function setLastName($last_name){
        $this->last_name= $last_name;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setphone($phone){
        $this->phone = $phone;
    }
 
}
?>