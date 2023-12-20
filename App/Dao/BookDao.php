<?php
namespace App\Dao;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\DataBase\connection;
use App\Models\Book;
use PDO;


class BookDao 
{
    private $books = [];
    private $conn;
    public function __construct(){
        $this->conn = connection::connect();
    }

    public function addBook(Book $book){
        $query = "INSERT into books (title,	author,genre,description,publication_year,total_copies,available_copies)
        VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$book->getTitle(),$book->getAuthor(),$book->getGenre(),$book->getDescription(),$book->getPublicationYear(),$book->getTotalCopies(),$book->getAvailableCopies()]);
    }

    public function getALLBooks(){
        $query = $this->conn->query("SELECT * from books");
        $books = $query->fetchAll(PDO::FETCH_ASSOC);
        if(empty($books)){
            return [];
        }else{
            return $books;
        }
    }

}

?>