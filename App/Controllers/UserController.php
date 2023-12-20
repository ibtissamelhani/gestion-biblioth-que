<?php

namespace App\Controller;

require_once __DIR__ . '/../../vendor/autoload.php';

use  App\Dao\UserDao;
use  App\Models\User;

session_start();

class UserController 
{

    public function register($f_name,$email,$password,$r_password){

        $this->validation($f_name,$email,$password,$r_password);

        if(empty($_SESSION['nameErr']) && empty($_SESSION['emailErr']) && empty($_SESSION['passErr']) && empty($_SESSION['r_passErr'])  ){
            $password = password_hash($password, PASSWORD_BCRYPT);
            $userDao = new UserDao();
            $user = new User(null,$f_name,null,$email,$password,null);
            $userDao->creatUser($user); 
            $this->redirect("../../index.php");
        }
        else{
            $this->redirect("../../Views/register.php");
            exit();
        }

    }



    // validation des input
    public function validation($f_name,$email,$password,$r_password){

        if(empty($f_name)){
            $_SESSION['nameErr'] = "first name is required";
        }else{
            $_SESSION['nameErr'] = "";
        }
        if(empty($email)){
            $_SESSION['emailErr'] = "email is required";
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['emailErr'] = "invalid email";
        }else{
            $_SESSION['emailErr'] = "";
        }

        if(empty($password)){
            $_SESSION['passErr'] = "password is required";
        }elseif(strlen($password) < 9){
            $_SESSION['passErr'] = "at least 8 carac";
        }else{
            $_SESSION['passErr'] = "";
        }

        if(empty($r_password)){
            $_SESSION['r_passErr'] = "repeat password";
        }elseif($password != $r_password){
            $_SESSION['r_passErr'] = "password doesn't match";
        }else{
            $_SESSION['r_passErr'] = "";
        }
    }


    


    public function login($email,$password){

        // validation email et password
        if(empty($email)) {
            $_SESSION['emailEr'] = "email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['emailEr']="invalid email";
        }else{
            $_SESSION['emailEr']="";
        }

        if(empty($password)) {
            $_SESSION['passwordErr']= "password is required";
        }  elseif (strlen($password) < 9) {
             $_SESSION['passwordError']= "at least 8 caract";
         }else{
            $_SESSION['passwordErr']="";
        }

        if(empty($_SESSION['emailEr']) && empty($_SESSION['passwordErr'])){
            $userDao = new UserDao();
            $row = $userDao->getUserByEmail($email);
            if($row) {

                    if(password_verify($password, $row['password'])){
                            $_SESSION['userId'] = $row['id'];
                            $_SESSION['loggedIn'] = true;

                            if($row['role_id'] === 1){
                                $this->redirect("../../Views/admin/dashboard.php");
                            }else{
                                $this->redirect("../../Views/user/home.php");
                            } 
                    }
            }else {
                $_SESSION['message'] = "this email doesn't existe";
                $this->redirect("../../Views/login.php");
            }
        } else{
            $this->redirect("../../Views/login.php");
            exit();
        }
    }
    

    // redirection
    public function redirect($url) {
        header("Location: $url");
    }


    public function create($first_name,$last_name,$email,$password,$phone){
        $password = password_hash($password, PASSWORD_BCRYPT);
        $userDao = new UserDao();
        $user = new User(null,$first_name,$last_name,$email,$password,$phone);
        $userDao->creatUser($user);
    }

    public function update($id,$first_name,$last_name,$email,$password,$phone) {
        $user = new User($id,$first_name,$last_name,$email,$password,$phone);
        $userDao = new UserDao();
        $userDao->updateUser($user);
    }

    public function delete($id){
        $userDao = new UserDao();
        $userDao->deleteBook($id);
    }

}


if(isset($_POST['register'])){
    $userCon = new UserController();
    extract($_POST);
    $userCon->register($first_name,$email,$password,$repeat_pass);
}

if(isset($_POST['login'])){
    $userCon = new UserController();
    extract($_POST);
    $userCon->login($email,$password);
}

if(isset($_POST['add'])){
    $userCon = new UserController();
    extract($_POST);
    $userCon->create($first_name,$last_name,$email,$password,$phone);
    $userCon->redirect("../../Views/admin/user/users.php");
}

if(isset($_POST['update'])){
    $userCon = new UserController();
    extract($_POST);
    $userCon->update($id,$first_name,$last_name,$email,$password,$phone);
    $userCon->redirect("../../Views/admin/user/users.php");
}

if(isset($_POST['delete'])){
    $userCon = new userController();
    extract($_POST);
    $userCon->delete($id);
    $userCon->redirect("../../Views/admin/user/users.php");
}

?>