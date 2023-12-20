<?php
namespace App\Controller;

require_once __DIR__ . '/../../vendor/autoload.php';

use  App\Dao\BookDao;
use  App\Models\Book;

class BookController
{
    public function add($title,$author,$genre,$description,$year,$total_copies,$available_copies){
        $book = new Book($title,$author,$genre,$description,$year,$total_copies,$available_copies);
        $bookDao = new BookDao();
        $bookDao->addBook($book);
        // $this->redirect("")
    }



      // redirection
      public function redirect($url) {
        header("Location: $url");
    }
}

if(isset($_POST['add'])){
    $bookCon = new BookController();
    extract($_POST);
    $bookCon->add($title,$author,$genre,$description,$year,$total_copies,$available_copies);
    $bookCon->redirect("../../Views/admin/book.php");
}


?>