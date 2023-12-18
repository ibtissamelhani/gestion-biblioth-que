<?php
namespace App\DataBase;

require_once __DIR__ . '/../../vendor/autoload.php';
use Dotenv\Dotenv;
use PDO;
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();



 class connection {

    public static function connect(){
       
        try{
            $conn = new PDO("mysql:host=".$_ENV['DB_HOST']."; dbname=".$_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'] );
            echo "done";
            return $conn;
        }
        catch(PDOException $e){
            echo "connection failed : ".$e->getMessage();
        }

    }
 }



?>