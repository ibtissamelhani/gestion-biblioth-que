<?php

namespace App\Models;

class Book 
{
    private $title;
    private $author;
    private $genre;
    private $description;
    private $publication_year;
    private $total_copies;
    private $available_copies;


    public function __construct($title,$author,$genre,$description,$publication_year,$total_copies){

    }
}


?>