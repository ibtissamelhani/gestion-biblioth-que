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

    public function addReservation(Reservation $res) {
        $query = "INSERT INTO reservation (description, reservation_date, return_date, is_returned, user_id, book_id) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
                    $res->getDescription(),
                    $res->getReservationDate(),
                    $res->getReturnDate(),
                    $res->getIsReturned(),
                    $res->getUserId(),
                    $res->getBookId()
                ]);
        $sql = "UPDATE books set available_copies= available_copies-1 where id =?";
        $updateStmt = $this->conn->prepare($sql);
        $updateStmt->execute([$res->getBookId()]);

       
    }


}

?>