<?php
namespace App\Dao;

require_once __DIR__ . '/../../vendor/autoload.php';
use App\Models\Reservation;
use App\DataBase\connection;


class ReservationDao 
{
    private $conn;
    public function  __construct(){
        $this->conn = connection::connect();
    }
    public function addResrvation(Reservation $res){
        $query = "INSERT INTO reservation (reservation_date,return_date,description,is_returned,user_id,book_id) VALUES (:reservation_date,:return_date,:description,:is_returned,:user_id,:book_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$res->getReservationDate(),$res->getReturnDate(),$res->getDescription(),$res->getIsReturned(),$res->getUserId(),$res->getBookId()]);
    }

    
}

?>