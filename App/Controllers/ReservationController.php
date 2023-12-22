<?php
namespace App\Controller;

require_once __DIR__ . '/../../vendor/autoload.php';

use  App\Dao\BookDao;
use  App\Dao\ReservationDao;
use  App\Models\Reservation;

class ReservationController 
{
    public function Add($description,$reservation_date,$return_date,$is_returned,$user_id,$book_id){
        $res = new Reservation(null,$description,$reservation_date,$return_date,$is_returned,$user_id,$book_id);
        $resDao = new ReservationDao();
        $resDao->addReservation($res);
    }

    public function update($res_id,$book_id){
        $resDao = new ReservationDao();
        $resDao->updateStatus($res_id,$book_id);
    }
}


if(isset($_POST['reserve'])){
    $resCon = new ReservationController();
    extract($_POST);
    $resCon->Add($description,$reservation_date,$return_date,false,$user_id,$book_id);
    header("location: ../../Views/user/ReadMore.php?showId=".$book_id);
}

if(isset($_POST['returnd'])){
    $resCon = new ReservationController();
    extract($_POST);
    $resCon->update($res_id,$book_id);
    header("location:../../Views/admin/reservation/reservations.php");
}

?>