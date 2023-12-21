<?php
namespace App\Models;

class Reservation
{
    private $id; 
    private $description; 
    private $reservation_date; 
    private $return_date; 
    private $is_returned;
    private $user_id;
    private $book_id;
    
    public function __construct($id,$description,$reservation_date,$return_date,$is_returned,$user_id,$book_id){
        $this->id=$id;
        $this->description = $description;
        $this->reservation_date = $reservation_date;
        $this->return_date = $return_date;
        $this->is_returned = $is_returned;
        $this->user_id = $user_id;
        $this->book_id = $book_id;
    }
    

    // getters
    public function getId(){
        return $this->id;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getReservationDate(){
        return $this->reservation_date;
    }
    public function getReturnDate(){
        return $this->return_date;
    }
    public function getIsReturned(){
        return $this->is_returned;
    }
    public function getUserId(){
        return $this->user_id;
    }
    public function getBookId(){
        return $this->book_id;
    }



    // setters
    public function setId($id){
        $this->id=$id;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function setReservationDate($reservation_date){
        $this->reservation_date = $reservation_date;
    }
    public function setReturnDate($return_date){
        $this->return_date = $return_date;
    }
    public function setIsReturned($is_returned){
        $this->is_returned = $is_returned;
    }
    public function setUserId(){
        $this->user_id = $user_id;
    }
    public function setBookId(){
        $this->book_id = $book_id;
    }
}


?>