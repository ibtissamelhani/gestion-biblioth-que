<?php
namespace App\Models;

class Reservation
{
    private $id; 
    private $description; 
    private $reservation_date; 
    private $return_date; 
    private $is_returned;
    
    public function __construct($id,$description,$reservation_date,$return_date,$is_returned){
        $this->id=$id;
        $this->description = $description;
        $this->reservation_date = $reservation_date;
        $this->return_date = $return_date;
        $this->is_returned = $is_returned;
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
}


?>