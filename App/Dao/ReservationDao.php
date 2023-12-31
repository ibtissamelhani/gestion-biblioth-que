<?php
namespace App\Dao;

require_once __DIR__ . '/../../vendor/autoload.php';
use App\Models\Reservation;
use App\DataBase\connection;
use PDO;


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

    public function getUserReservation($user_id){
        $query = "SELECT r.id as id, r.description as description, r.reservation_date as reservation_date, r.return_date as return_date, r.is_returned as is_returned, r.user_id as user_id, b.title as book
         from reservation r join books b on r.book_id = b.id where user_id =?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$user_id]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function getAllReservation(){
        $query = $this->conn->query("SELECT r.id as id,r.description as description, r.reservation_date as reservation_date, r.return_date as return_date, r.is_returned as is_returned, r.book_id as book_id,r.user_id as user_id,u.first_name as first_name,u.last_name as last_name, b.title as book
        from reservation r join books b on r.book_id = b.id
        join users u on r.user_id = u.id");
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

        public function updateStatus($res_id, $book_id)
    {
        $query = "UPDATE reservation SET is_returned = true WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$res_id]);

        $sql = "UPDATE books SET available_copies = available_copies + 1 WHERE id = ?";
        $updateStmt = $this->conn->prepare($sql);
        $updateStmt->execute([$book_id]);
    }


}

?>