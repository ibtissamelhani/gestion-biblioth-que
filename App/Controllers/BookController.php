<?php
namespace App\Controller;

require_once __DIR__ . '/../../vendor/autoload.php';

use  App\Dao\BookDao;
use  App\Models\Book;

class BookController
{
    public function add($title,$author,$genre,$description,$year,$total_copies,$available_copies) {
        $book = new Book(null,$title,$author,$genre,$description,$year,$total_copies,$available_copies);
        $bookDao = new BookDao();
        $bookDao->addBook($book);
    }

    public function update($id,$title,$author,$genre,$description,$year,$total_copies,$available_copies) {
        $book = new Book($id,$title,$author,$genre,$description,$year,$total_copies,$available_copies);
        $bookDao = new BookDao();
        $bookDao->updateBook($book);
    }

    public function delete($id){
        $bookDao = new BookDao();
        $bookDao->deleteBook($id);
    }

    public function search($title,$genre){
        $bookDao = new BookDao();
        $result = $bookDao->searchByTitleAndGenre($title, $genre);
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
    $bookCon->redirect("../../Views/admin/book/book.php");
}

if(isset($_POST['update'])){
    $bookCon = new BookController();
    extract($_POST);
    $bookCon->update($id,$title,$author,$genre,$description,$year,$total_copies,$available_copies);
    $bookCon->redirect("../../Views/admin/book/book.php");
}

if(isset($_POST['delete'])){
    $bookCon = new BookController();
    extract($_POST);
    $bookCon->delete($id);
    $bookCon->redirect("../../Views/admin/book/book.php");
}


?>